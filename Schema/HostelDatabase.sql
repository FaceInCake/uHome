

create table if not exists category (
    cid     smallint primary key auto_increment comment 'Generic ID',
    name    varchar(64) not null unique
) comment 'Example: 1st year undergrad, or postgrad';

create table if not exists nationality (
    nid     smallint primary key auto_increment comment 'Generic ID',
    name    varchar(64) not null unique
) comment 'Self identification attribute';

create table if not exists degree (
    did     smallint primary key auto_increment comment 'Generic ID',
    name    varchar(64) not null unique
) comment 'All possible degrees a student can aim for';

create table if not exists paytype (
    tid     smallint primary key auto_increment comment 'Generic ID',
    name    varchar(64) not null unique
) comment 'All possible payment types the office can or could accept';

create table if not exists staff (
    hid         smallint primary key auto_increment comment 'Assigned staff number',
    fname       varchar(24) not null comment 'First name',
    lname       varchar(32) not null comment 'Legal Last/Family name',
    address     varchar(100) not null comment 'Local,City,Prov',
    birthday    date not null,
    position    varchar(24) not null,
    location    varchar(24) not null comment 'Department location (ex. front office)',
    gender      enum('Male','Female','Other')
);

create table if not exists advisor (
    aid         smallint primary key comment 'Staff number',
    department  varchar(32) not null comment 'Name',
    telenum     bigint(15) not null comment 'For contacting',
    room        int(9) unique comment 'Room number, for contacting',
    foreign key (aid) references staff (hid)
    on delete cascade -- Advisor must be a staff member
);

create table if not exists building (
    bid     smallint primary key auto_increment comment 'Generic ID',
    address varchar(100) not null
) comment 'A building can either be a `studentflat` or a `residencehall`';

create table if not exists studentflat (
    fid         smallint primary key auto_increment comment 'Assigned flat number',
    bid         smallint not null unique comment 'Building ID',
    bedrooms    smallint not null comment 'Number of bedrooms the flat contains',
    check (bedrooms >= 3 and bedrooms <= 5),
    foreign key (bid) references building (bid)
    on delete cascade
);

create table if not exists flatinspection (
    fid             smallint comment 'Flat number',
    i_date          datetime comment 'Date and time of inspection',
    primary key (fid, i_date),
    inspector_id    smallint not null comment 'Staff number',
    satisfactory    boolean not null comment 'Did it pass inspection?',
    ad_comment      varchar(250) comment 'Additional comment',
    foreign key (fid) references studentflat (fid),
    foreign key (inspector_id) references staff (hid)
);

create table if not exists residencehall (
    rid         smallint primary key auto_increment comment 'Generic ID',
    bid         smallint not null unique comment 'Building ID',
    name        varchar(64) not null unique comment 'Unique assigned name of residence hall',
    telenum     bigint(15) not null comment 'For contacting',
    manager_id  smallint not null comment 'Staff number',
    foreign key (manager_id) references staff (hid),
    foreign key (bid) references building (bid)
    on delete cascade
);

create table if not exists room (
    pid     smallint primary key auto_increment comment 'Unique Place Number',
    bid     smallint not null comment 'Building ID',
    room    smallint not null comment 'Assigned human room number',
    rent    decimal(7,2) not null comment 'Monthly rate',
    foreign key (bid) references building (bid)
    on delete cascade
);

create table if not exists student (
    sid         int(9) primary key comment 'Assigned Student Number',
    advisor_id  smallint not null comment 'Staff number for advisor',
    fname       varchar(24) not null comment 'First Name',
    lname       varchar(32) not null comment 'Legal Last/Family Name',
    address     varchar(100) not null,
    birthday    date not null,
    category_id smallint not null comment 'Category ID',
    is_placed   boolean comment 'Has the student been placed into a room?',
    gender      enum('Male','Female','Other'),
    nationality_id smallint comment 'Nationality ID',
    degree_id   smallint comment 'Degree ID',
    needs       varchar(250) comment 'Any additional needs that should be commented',
    ad_comment  varchar(250) comment 'Any other miscellaneous comments worth noting',
    foreign key (advisor_id) references advisor (aid),
    foreign key (category_id) references category (cid),
    foreign key (nationality_id) references nationality (nid),
    foreign key (degree_id) references degree (did)
);

create table if not exists lease (
    lid         int primary key auto_increment comment 'Generic ID',
    student_id  int(9) not null comment 'Student Number this lease is for',
    room_id     smallint not null comment 'ID for the Room this lease is for',
    l_year      year not null comment 'The Starting year the lease is active for',
    semester    enum('Winter','Summer','Fall') not null comment 'The starting semester of this lease',
    duration    smallint not null comment 'The number of semesters this lease lasts for',
    check (duration >= 1 and duration <= 3),
    movein      datetime comment 'Day and time student plans to move in if known',
    moveout     datetime comment 'Day and time student plans to move out if known',
    foreign key (student_id) references student (sid),
    foreign key (room_id) references room (pid)
);

create table if not exists invoice (
    iid         int primary key auto_increment comment 'Generic ID',
    lease_id    int not null comment 'Lease ID this invoice belongs to',
    i_index     tinyint not null comment 'Index of this invoice relative to the starting date of the lease. 0=first invoice',
    check (i_index >= 0 and i_index < (select duration from lease where lid=lease_id)),
    paydue      decimal(7,2) not null comment 'Payment due for this invoice',
    paid_date   datetime comment 'Null if hasnt been paid yet',
    paytype_id  smallint comment 'Null if hasnt been paid yet',
    reminder1   datetime comment 'Null if not given out yet',
    reminder2   datetime comment 'Null if not given out yet'
);
