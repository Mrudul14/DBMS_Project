create table registration(
    id integer primary key auto_increment,
    name varchar(40) not null,
    user varchar(20) not null,
    email varchar(40) not null,
    password varchar(40) not null,
    approval varchar(10) 
);

create table stadium(
    s_id integer primary key auto_increment, 
    s_name varchar(50) not null, 
    s_address varchar(50),
    o_id integer not null references registration(id)
);

create table teams(
    t_id integer primary key auto_increment,
    t_name varchar2(50) not null, 
    t_address varchar(50) not null, 
    owner varchar(20),
    o_id integer not null references registration(id)
);

create table tournament(
    tournament_id integer primary key,
    tournament_name varchar(20) not null,
    s_id integer not null references stadium(s_id),
    o_id integer not null references registration(id)
);

create table matches(
    m_id integer primary key auto_increment,
    t1_id integer references teams(t_id),
    t2_id integer references teams(t_id), 
    m_date date, 
    s_id integer references stadium(s_id),
    m_time varchar(10), 
    t1_goal integer ,
    t2_goal integer,
    active varchar(10),
    o_id integer not null references registration(id)
);