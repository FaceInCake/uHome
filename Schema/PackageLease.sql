-- Requires: p_semester from PackageSemester


-- Public interface, this is what you can use
create or replace package p_lease as

    -- Creates and inserts new invoices for the appropriate leases for the next semester,
    -- using the given date, (or sysdate by default)
    procedure generate_invoices (d in date default sysdate);

    -- Calculates the total rent owed for a particular lease
    function calc_total_owed (lease_id lease.lid%type) return room.rent%type;

    -- Calculates the start and end date of a lease based on semester and duration
    procedure get_date_range (lease_id in lease.lid%type, startDate out date, endDate out date);

end p_lease;
/



-- The actual code
create or replace package body p_lease as

    procedure generate_invoices (d in date default sysdate) as
        curYear number := extract(year from d);
        curSem number := p_semester.from_date(d);
        nextSem number := mod(curSem, 3) + 1;
        nextYear number;
        cursor allLeases is
            select l.lid, l.semester_id as sem, r.rent, l.year, l.duration as dur
            from lease l left join room r
            on l.room_id = r.pid
            -- A year is equivalent to 3 semesters.
            -- A semester is [1,3] so we minus 1 to bring it to [0,2]. 
            -- We add 1 to curSem to get the next sem, so the -1+1 cancels.
            where (l.year*3+l.semester_id-1) <= (curYear*3+curSem) -- Lease is not too new
            and (curYear*3+curSem) <= (l.year*3+l.semester_id-1) + l.duration-1 -- Lease is not too old
            and not exists( select * from invoice i where i.lease_id=l.lid and i.semester_id=nextSem) -- Doesnt already exist
        ;
    begin
        nextYear := curYear;
        if nextSem < curSem then nextYear := nextYear + 1; end if;
        for row in allLeases loop
            insert into invoice values
            (default, row.lid, nextSem, row.rent*4, null, null, null, null); -- Rent is monthly, 4 months in a semester
        end loop;
    end;

    FUNCTION CALC_TOTAL_OWED(LEASE_ID LEASE.LID%TYPE) RETURN ROOM.RENT%TYPE
    AS 
        LEASE_DURATION LEASE.DURATION%TYPE;
        ROOM_RENT ROOM.RENT%TYPE;
        TOTAL_RENT ROOM.RENT%TYPE;
    BEGIN
        SELECT DURATION, RENT INTO LEASE_DURATION, ROOM_RENT FROM LEASE JOIN ROOM ON LEASE.ROOM_ID = ROOM.PID WHERE LID = LEASE_ID;
        TOTAL_RENT := ROOM_RENT * LEASE_DURATION * 4;
        RETURN TOTAL_RENT;
    END;

    procedure get_date_range (lease_id in lease.lid%type, startDate out date, endDate out date) as
        LEASE_DURATION NUMBER;
        LEASE_SEMESTER NUMBER;
        LEASE_YEAR NUMBER;
    BEGIN
        SELECT DURATION, SEMESTER_ID, YEAR
        INTO LEASE_DURATION, LEASE_SEMESTER, LEASE_YEAR
        FROM LEASE WHERE lease_id = 1;
        p_semester.get_range(lease_year, lease_semester, startDate, endDate);
        endDate := add_months(startDate, 4*lease_duration);
    END;


end p_lease;
