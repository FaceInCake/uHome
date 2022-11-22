
-- -- == == Functions == == -- --

create function get_semester (d date) returns tinyint deterministic
    comment "Returns the semester id for the given date. Pass null to default to curdate()."
    return (month(d)-1) div 4 + 1
;

create function semester_str (semester tinyint(1)) returns tinytext deterministic
    comment "Returns the semester name for the given semester ID. Returns null if the given semester ID is invalid"
    return (case semester
        when 1 then "Winter"
        when 2 then "Summer"
        when 3 then "Fall"
    end)
;

-- -- == == Procedures == == -- --

create procedure generate_invoices (in d date)
comment "Creates and inserts new invoices for the appropriate leases for the NEXT semester, using the given date."
    insert into invoice (lease_id, i_index, paydue)
    select n.lid, n.newi, n.rent from (
        select l.lid, l.semester+0 as sem, l.l_year, l.duration as dur, count(i.iid) as newi, r.rent*4 as rent
        from lease l left join invoice i on l.lid=i.lease_id left join room r on l.room_id=r.pid
        group by i.lease_id -- Fetches all lease,room,invoiceCount info
    ) as n
    where -- The invoice count acts as our next index to use, which we can then test
        dur > newi -- There is a new invoice to be made
        and mod(sem+newi-1,3)+1 = (mod(get_semester(d),3)+1) -- semesters match
        and l_year + (sem+newi) div 4 = (year(d) + get_semester(d) div 3) -- years match
;

-- Remember to always include the delimiter specifier
delimiter //

create procedure semester_range (in y year, in semester tinyint, out startDate date, out endDate date)
deterministic comment "Sets startDate and endDate to the earliest date and latest date of the given year and semester. startDate and endDate are null if the given semester ID is invalid"
begin
    case semester
        when 1 then
            set startDate = date(concat(y, "-01-01"));
            set endDate = date(concat(y, "-04-30"));
        when 2 then
            set startDate = date(concat(y, "-05-01"));
            set endDate = date(concat(y, "-08-31"));
        when 3 then
            set startDate = date(concat(y, "-09-01"));
            set endDate = date(concat(y, "-12-31"));
        else
            set startDate = null;
            set endDate = null;
    end case;
end//

-- End Procedures --
delimiter ;
