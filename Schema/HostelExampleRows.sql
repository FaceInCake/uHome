
--  alter session set NLS_DATE_FORMAT = 'YYYY/MM/DD';

insert into nationality (name) values
('Canadian'),
('Algongquin'),
('Ojibwe'),
('Indian'),
('German');

insert into category (name) values
('First Year Undergraduate'),
('Second Year Undergraduate'),
('Third Year Undergraduate'),
('Fourth Year Undergraduate'),
('Fifth Year Undergraduate'),
('Postgraduate');

insert into degree (name) values
('BCS Computer Science'),
('BCS Computer Science (Applied Computing)'),
('BCS Computer Science (Computer Information Systems)'),
('Criminology'),
('Chemistry'),
('General Science'),
('Behaviour, Cognition, & Neuroscience'),
('Civil Engineering');

insert into paytype (name) values
('E-Transfer'),
('Cash'),
('Cheque'),
('Visa'),
('Mastercard');

insert into staff values
(10000, 'Sarah', 'Conner',    '42 Riverside Ln. E, M4D 5F3, Windsor, Ontario',  '1997/02/14', 'Receptionist', 'Hostel Office', 2),
(10001, 'Timothy', 'McLaren', '19 Tecumseh Rd. N, J2E 4C4, Windsor, Ontario',   '1992/04/22', 'General Supervisor', 'Hostel Office', 1),
(10002, 'Julia', 'Ceaser',    '4 Northview St. S, M3H 6S1, Windsor, Ontario',   '1989/08/02', 'Cleaner', 'Janitorial', 2),
(10003, 'Jason', 'Moore',     '96 Ridgefield Rd. W, J5F 6K6, Windsor, Ontario', '1976/11/09', 'Cleaner', 'Janitorial', 1),
(10004, 'Jannet', 'Laine',    '213 Ridgefield Rd. W, J5F 6K7, Windsor, Ontario','1979/10/12', 'Technician', 'Repairs', 3),
(10005, 'Owen', 'Wilson',     '25 Richmond Rd. W, K3F 2O2, Windsor, Ontario',   '1972/01/26', 'Manager', 'Hostel Office', 1),
(10006, 'Kain', 'Lowe',       '2 Riverside Ln. E, M4D 5F2, Windsor, Ontario',   '1983/03/14', 'Manager', 'Hostel Office', 1),
(10007, 'Julliet', 'Moore',   '38 Wyandotte Rd. W, K4J P9E, Windsor, Ontario',  '1981/04/12', 'Advisor', 'Residence', 2),
(10008, 'Amanda', 'Lowney',   '105 Undertow Ln. W, L4E U8R, Windsor, Ontario',  '1991/01/06', 'Advisor', 'Residence', 2);

insert into advisor values
(10007, 'General Science', 8881234567, 3),
(10006, 'Engineering', 8886664444, 8),
(10008, 'Social Studdies', 8881113333, 12);

insert into building (address) values
('400 Sunset Ave. W Suit 1, A1B 2C1, Windsor, Ontario'),
('402 Sunset Ave. W, A1B 2C3, Windsor, Ontario'),
('403 Sunset Ave. W, A1B 2C3, Windsor, Ontario'),
('400 Sunset Ave. W Suit 3, A1B 2C1, Windsor, Ontario');

insert into studentflat values
(101, 1, 4),
(103, 2, 3);

insert into flatinspection values
(101, '2022/09/01 15:30:00', 10004, true, 'All fixed up from before'),
(103, '2022/09/01 18:20:00', 10001, true, null);

insert into residencehall values
(null, 3, 'Northside', 2063334444, 10005),
(null, 4, 'Leamens', 2063335454, 10006);

insert into room values
(null, 1, 101, 1550.49),
(null, 1, 102, 1550.49),
(null, 1, 103, 1550.49),
(null, 1, 104, 1550.49),
(null, 4, 201, 1620.00),
(null, 4, 202, 1620.00),
(null, 2, 101, 1449.99),
(null, 2, 102, 1449.99),
(null, 2, 103, 1449.99),
(null, 2, 104, 1449.99),
(null, 2, 105, 1449.99),
(null, 2, 106, 1449.99),
(null, 2, 107, 1449.99),
(null, 2, 108, 1449.99),
(null, 3, 101, 1529.99),
(null, 3, 102, 1529.99),
(null, 3, 103, 1529.99),
(null, 3, 104, 1529.99),
(null, 3, 105, 1529.99),
(null, 3, 106, 1529.99),
(null, 3, 107, 1529.99),
(null, 3, 108, 1529.99);

insert into student values
(123456789, 10008, 'Erik', 'Balton',    '9 Tecumseh Rd. N, N6C 2R4, London, Ontario',     '1999/03/17', 2, false, 'Male', 1, 2, null, null),
(101020304, 10007, 'Murray', 'Schmidt', '10 Richmond Rd. E, N6C 1H8, London, Ontario',    '2000/03/12', 1, true, 'Male', 5, 4, null, null),
(100000001, 10008, 'Mary', 'Sawyer',    '41 Edward Rd. S, H3E 1R3, Windsor, Ontario',     '1998/07/15', 3, false, 'Female', 2, 7, 'colour blind', null),
(111111119, 10007, 'Venessa', 'White',  '123 Highroad Ln. W, J3E 4F0, Brampton, Ontario', '1997/12/17', 4, true, 'Female', 1, 8, null, null),
(100200300, 10006, 'Lucy', 'Lebsack',   '465 Highland Rd. W, N2M 3C6, Kitchener, Ontario','1992/09/24', 6, true, 'Female', 1, 5, null, 'additional comment'),
(132143215, 10006, 'New', 'Kid',        '123 Fakeroad Ln. S, A1B 2C3, City, Province',    '1999/01/01', 6, false, 'Other', null, null, null, 'Testing');

insert into lease values
(null, 101020304, 7, 2022, 'Winter', 3, '2022/01/07 13:30:00', null),
(null, 111111119, 8, 2022, 'Fall', 1, '2022/09/03 14:15:00', '2022/12/21 16:30:00'),
(null, 111111119, 3, 2022, 'Winter', 1, '2022/01/06 15:00:00', '2022/04/19 18:00:00'),
(null, 100200300, 5, 2022, 'Fall', 2,  null, null);

insert into invoice values
(null, 1, 0, 5699.96, '2022/01/29 21:35:15', 1, '2022/01/8 12:00:00', null),
(null, 1, 1, 5799.96, '2022/05/02 22:14:23', 1, null, null),
(null, 1, 2, 5799.96, null, null, null, null),
(null, 2, 0, 5799.96, '2022/09/11 14:23:44', 3, '2022/09/04 12:00:00', null),
(null, 3, 0, 6201.96, '2022/01/24 22:54:08', 1, '2022/01/04 12:00:00', '2022/01/17 12:00:00'),
(null, 4, 0, 6480.00, null, null, '2022/09/7 12:00:00', null);
