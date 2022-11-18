
/* Queries all students and their related attributes */
create or replace view v_student as
    select *
    from student
    left join category on category_id = cid
    left join degree on degree_id = did
    left join nationality on nationality_id = nid
    left join advisor on advisor_id = aid
;

/* Queries all rooms and their related buildings */
create or replace view v_room as
    select pid, room.bid, address, type, room, rent from room
    join building on room.bid = building.bid
;

/* Queries all residence halls and their related building and manager */
create or replace view v_residencehall as
    select rid, bid, hid, residencehall.name, telenum, building.address,
        fname as m_fname, lname as m_lname, staff.address as m_address,
        birthday as m_birthday, position as m_position, location as m_location,
        gender.name as m_gender
    from residencehall
    join building on res_id = rid
    join staff on manager_id = hid
    join gender on gender_id = gid
;

/* Queries all student falts and their related building */
create or replace view v_studentflat as
    select fid, bid, bedrooms, address from studentflat
    left join building on flat_id = fid
;

/* Queries all invoices that are not payed yet */
create or replace view unpaid_invoice as
    select *
    from invoice where paid_date is null
;
