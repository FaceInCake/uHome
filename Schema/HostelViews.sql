
/* Queries all advisors and their related staff record */
create or replace view v_advisor as
    select a.*, s.fname, s.lname, s.address, s.birthday, s.position, s.location, s.gender
    from advisor a, staff s
    where a.aid = s.hid
;

/* Queries all student falts and their related building */
create or replace view v_studentflat as
    select f.*, b.address
    from studentflat f, building b
    where f.bid = b.bid
;

/* Queries all flat inspections, the flat its for, and the staff member that did it */
create or replace view v_flatinspection as
    select i.*,
        f.bid as flat_bid, f.bedrooms as flat_bedrooms, f.address as flat_address,
        s.fname as staff_fname, s.lname as staff_lname, s.address as staff_address,
        s.birthday as staff_birthday, s.position as staff_position, s.location as staff_location,
        s.gender as staff_gender
    from flatinspection i, v_studentflat f, staff s
    where i.fid = f.fid and i.inspector_id = s.hid
;

/* Queries all residence halls and their related building and manager */
create or replace view v_residencehall as
    select r.*,
        b.address, m.fname as staff_fname, m.lname as staff_lname, m.address as staff_address,
        m.birthday as staff_birthday, m.position as staff_position, m.location as staff_location,
        m.gender as staff_gender
    from residencehall r, building b, staff m
    where r.bid = b.bid and r.manager_id = m.hid
;

/* Queries all rooms and their related buildings */
create or replace view v_room as
    select r.*, b.address as building_address
    from room r, building b
    where r.bid = b.bid
;

/* Queries all invoices that are not payed yet */
create or replace view unpaid_invoice as
    select * from invoice where paid_date is null
;
