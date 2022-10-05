
alter session set NLS_DATE_FORMAT = 'YYYY/MM/DD';

set transaction name 'insert_examples';

insert all
into semester values (1, 'Winter')
into semester values (2, 'Summer')
into semester values (3, 'Fall')
select * from dual;

insert all
into gender values (1, 'Male')
into gender values (2, 'Female')
into gender values (3, 'Non-Binary')
select * from dual;

insert all
into nationality values (1, 'Canadian')
into nationality values (2, 'Algongquin')
into nationality values (3, 'Ojibwe')
into nationality values (4, 'Indian')
into nationality values (5, 'German')
select * from dual;

insert all
into category values (1, 'First Year Undergraduate')
into category values (2, 'Second Year Undergraduate')
into category values (3, 'Third Year Undergraduate')
into category values (4, 'Fourth Year Undergraduate')
into category values (5, 'Fifth Year Undergraduate')
into category values (6, 'Postgraduate')
select * from dual;

insert all
into degree values (1, 'BCS Computer Science')
into degree values (2, 'BCS Computer Science (Applied Computing)')
into degree values (3, 'BCS Computer Science (Computer Information Systems)')
into degree values (4, 'Criminology')
into degree values (5, 'Chemistry')
into degree values (6, 'General Science')
into degree values (7, 'Behaviour, Cognition, & Neuroscience')
into degree values (8, 'Civil Engineering')
select * from dual;

insert all
into paytype values (1, 'E-Transfer')
into paytype values (2, 'Cash')
into paytype values (3, 'Cheque')
into paytype values (4, 'Visa')
into paytype values (5, 'Mastercard')
select * from dual;

insert all
into staff values (10000, 'Sarah', 'Conner',    '42 Riverside Ln. E, M4D 5F3, Windsor, Ontario',  '1997/02/14', 'Receptionist', 'Hostel Office', 2)
into staff values (10001, 'Timothy', 'McLaren', '19 Tecumseh Rd. N, J2E 4C4, Windsor, Ontario',   '1992/04/22', 'General Supervisor', 'Hostel Office', 1)
into staff values (10002, 'Julia', 'Ceaser',    '4 Northview St. S, M3H 6S1, Windsor, Ontario',   '1989/08/02', 'Cleaner', 'Janitorial', 2)
into staff values (10003, 'Jason', 'Moore',     '96 Ridgefield Rd. W, J5F 6K6, Windsor, Ontario', '1976/11/09', 'Cleaner', 'Janitorial', 1)
into staff values (10004, 'Jannet', 'Laine',    '213 Ridgefield Rd. W, J5F 6K7, Windsor, Ontario','1979/10/12', 'Technician', 'Repairs', 3)
into staff values (10005, 'Owen', 'Wilson',     '25 Richmond Rd. W, K3F 2O2, Windsor, Ontario',   '1972/01/26', 'Manager', 'Hostel Office', 1)
into staff values (10006, 'Kain', 'Lowe',       '2 Riverside Ln. E, M4D 5F2, Windsor, Ontario',   '1983/03/14', 'Manager', 'Hostel Office', 1)
into staff values (10007, 'Julliet', 'Moore',   '38 Wyandotte Rd. W, K4J P9E, Windsor, Ontario',  '1981/04/12', 'Advisor', 'Residence', 2)
into staff values (10008, 'Amanda', 'Lowney',   '105 Undertow Ln. W, L4E U8R, Windsor, Ontario',  '1991/01/06', 'Advisor', 'Residence', 2)
select * from dual;

insert all
into advisor values (10007, 'General Science', 8881234567, 3)
into advisor values (10006, 'Engineering', 8886664444, 8)
into advisor values (10008, 'Social Studdies', 8881113333, 12)
select * from dual;

insert all
into studentflat values (101, 4)
into studentflat values (103, 3)
select * from dual;

insert all
into flatinspection values (101, '2022/09/01', 10004, 'Y', 'All fixed up from before')
into flatinspection values (103, '2022/09/01', 10001, 'Y', null)
select * from dual;

insert all
into residencehall values (1, 'Northside', 2063334444, 10005)
into residencehall values (2, 'Leamens', 2063335454, 10006)
select * from dual;

insert all
into building values (1, '400 Sunset Ave. W Suit 1, A1B 2C1, Windsor, Ontario', 'F', null, 101)
into building values (2, '402 Sunset Ave. W, A1B 2C3, Windsor, Ontario', 'R',        1, null)
into building values (3, '403 Sunset Ave. W, A1B 2C3, Windsor, Ontario', 'R',        2, null)
into building values (4, '400 Sunset Ave. W Suit 3, A1B 2C1, Windsor, Ontario', 'F', null, 103)
select * from dual;

insert all    /* pid-bid-room-rent */
into room values ( 1, 1, 101, 1850.49)
into room values ( 2, 1, 102, 1850.49)
into room values ( 3, 1, 103, 1850.49)
into room values ( 4, 1, 104, 1850.49)
into room values ( 5, 4, 201, 1920.00)
into room values ( 6, 4, 202, 1920.00)
into room values ( 7, 2, 101, 1749.99)
into room values ( 8, 2, 102, 1749.99)
into room values ( 9, 2, 103, 1749.99)
into room values (10, 2, 104, 1749.99)
into room values (11, 2, 105, 1749.99)
into room values (12, 2, 106, 1749.99)
into room values (13, 2, 107, 1749.99)
into room values (14, 2, 108, 1749.99)
into room values (15, 3, 101, 1829.99)
into room values (16, 3, 102, 1829.99)
into room values (17, 3, 103, 1829.99)
into room values (18, 3, 104, 1829.99)
into room values (19, 3, 105, 1829.99)
into room values (20, 3, 106, 1829.99)
into room values (21, 3, 107, 1829.99)
into room values (22, 3, 108, 1829.99)
select * from dual;

insert all                                                                                                    /*  category, status, gender, nation, degree */
into student values (123456789, 10008, 'Erik', 'Balton',    '9 Tecumseh Rd. N, N6C 2R4, London, Ontario',     '1999/03/17', 2, 'W', 1, 1, 2, null, null)
into student values (101020304, 10007, 'Murray', 'Schmidt', '10 Richmond Rd. E, N6C 1H8, London, Ontario',    '2000/03/12', 1, 'P', 1, 5, 4, null, null)
into student values (100000001, 10008, 'Mary', 'Sawyer',    '41 Edward Rd. S, H3E 1R3, Windsor, Ontario',     '1998/07/15', 3, 'W', 2, 2, 7, 'colour blind', null)
into student values (111111119, 10007, 'Venessa', 'White',  '123 Highroad Ln. W, J3E 4F0, Brampton, Ontario', '1997/12/17', 4, 'P', 2, 1, 8, null, null)
into student values (100200300, 10006, 'Lucy', 'Lebsack',   '465 Highland Rd. W, N2M 3C6, Kitchener, Ontario','1992/09/24', 6, 'P', 2, 1, 5, null, 'additional comment')
select * from dual;

insert all             /* SID-room-year-semester-duration-enter-exit */
into lease values (1, 101020304, 7, 2022, 1, 3, '2022/01/07', null)
into lease values (2, 111111119, 8, 2022, 3, 1, '2022/09/03', '2022/12/21')
into lease values (3, 111111119, 3, 2022, 1, 1, '2022/01/06', '2022/04/19')
into lease values (4, 100200300, 5, 2022, 3, 2,  null, null)
select * from dual;

insert all       /* id-Lid-sem-payment-paid_date-type-rem1-rem2 */
into invoice values (1, 1, 1, 1699.99, '2022/01/29', 1, '2022/01/8', null)
into invoice values (2, 1, 2, 1699.99, '2022/05/02', 1, null, null)
into invoice values (3, 1, 3, 1699.99, null, null, null, null)
into invoice values (4, 2, 3, 1920.00, '2022/09/11', 3, '2022/09/04', null)
into invoice values (5, 3, 1, 1850.49, '2022/01/24', 1, '2022/01/04', '2022/01/17')
into invoice values (6, 4, 3, 1920.00, null, null, '2022/09/7', null)
select * from dual;

commit;