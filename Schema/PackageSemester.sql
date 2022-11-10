
-- Here is the interface, the things available to you
create or replace package p_semester as

    -- Returns the semester id for the given date
    function from_date (d in date) return semester.mid%type;

    -- Returns the English word for the given semester ID
    function to_str (sem in smallint) return semester.name%type;
    
    -- Sets startDate and endDate to the earliest date and latest date of the given year and semester
    procedure get_range (year in smallint, semester in smallint, startDate out date, endDate out date);
    
end p_semester;
/



-- The actual code
create or replace package body p_semester as

    function from_date (d in date) return semester.mid%type as
        m number;
    begin
        select extract(month from d) into m from dual;
        if m < 5 then
            return 1; -- [Jan, Apr]
        elsif m < 9 then
            return 2; -- [May, Aug]
        else
            return 3; -- [Sep, Dec]
        end if;
    end;

    function to_str (sem in smallint) return semester.name%type as
        semName semester.name%type;
    begin
        select name into semName from semester where mid=sem;
        return semName;
    end;

    procedure get_range (year in smallint, semester in smallint, startDate out date, endDate out date) is
    begin
        if semester = 1 then -- Winter
            startDate := to_date(year || '/01/01', 'yyyy/mm/dd');
            endDate := to_date(year || '/04/30', 'yyyy/mm/dd');
        elsif semester = 2 then -- Summer
            startDate := to_date(year || '/05/01', 'yyyy/mm/dd');
            endDate := to_date(year || '/08/31', 'yyyy/mm/dd');
        elsif semester = 3 then -- Fall
            startDate := to_date(year || '/09/01', 'yyyy/mm/dd');
            endDate := to_date(year || '/12/31', 'yyyy/mm/dd');
        else
            startDate := null;
            endDate := null;
        end if;
    end;

end p_semester;
