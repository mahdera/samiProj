create database db_sami_proj;

use db_sami_proj;

create table tbl_team(
    id bigint auto_increment,
    team_name varchar(100) not null,
    title varchar(100) not null,
    organization varchar(70) not null,
    email varchar(70) not null,
    phone varchar(70) not null,
    primary key(id)
);

create table tbl_team_interest(
    id bigint auto_increment,
    team_id bigint not null,
    interest_name varchar(70) not null,
    primary key(id),
    foreign key(team_id) references tbl_team(id)
);

create table tbl_responsibility(
    id bigint auto_increment,
    team_id bigint not null,
    role text,
    responsibility text,
    primary key(id),
    foreign key(team_id) references tbl_team(id)
);

create table tbl_assessment(
    id bigint auto_increment,
    assessment_type varchar(50) not null,
    assessment_date date not null,
    summary text,
    primary key(id)
);

create table tbl_th(
    id bigint auto_increment,
    th_name varchar(70) not null,
    primary key(id)
);

create table tbl_fn(
    id bigint auto_increment,
    fn_name varchar(70) not null,   
    primary key(id)
);

create table tbl_assessment_th(
    id bigint auto_increment,
    assessment_id bigint not null,
    th_id bigint not null,
    primary key(id),
    foreign key(assessment_id) references tbl_assessment(id),
    foreign key(th_id) references tbl_th(id)
);

create table tbl_risk(
    id bigint auto_increment,
    th_id bigint not null,
    mg varchar(50) not null,
    dr varchar(50) not null,
    pr varchar(50) not null,
    wa varchar(50) not null,
    rs varchar(50) not null,
    primary key(id),
    foreign key(th_id) references tbl_th(id)
);

create table tbl_goal_first(
    id bigint auto_increment,
    th_id bigint not null,    
    primary key(id),
    foreign key(th_id) references tbl_th(id)
);

create table tbl_goal_first_g1(
    id bigint auto_increment,
    goal_first_id bigint not null,
    g1 varchar(50) not null,
    fn varchar(50) not null,
    primary key(id),
    foreign key(goal_first_id) references tbl_goal_first(id)
);

create table tbl_goal_first_g2(
    id bigint auto_increment,
    goal_first_id bigint not null,
    g2 varchar(50) not null,
    fn varchar(50) not null,
    primary key(id),
    foreign key(goal_first_id) references tbl_goal_first(id)
);

create table tbl_goal_first_g3(
    id bigint auto_increment,
    goal_first_id bigint not null,
    g3 varchar(50) not null,
    fn varchar(50) not null,
    primary key(id),
    foreign key(goal_first_id) references tbl_goal_first(id)
);

create table tbl_goal_first_g1_obj_fn(
    id bigint auto_increment,
    goal_first_g1_id bigint not null,
    obj varchar(50) not null,
    fn varchar(50) not null,
    primary key(id),
    foreign key(goal_first_g1_id) references tbl_goal_first_g1(id)
);

create table tbl_goal_first_g2_obj_fn(
    id bigint auto_increment,
    goal_first_g2_id bigint not null,
    obj varchar(50) not null,
    fn varchar(50) not null,
    primary key(id),
    foreign key(goal_first_g2_id) references tbl_goal_first_g2(id)
);

create table tbl_goal_first_g3_obj_fn(
    id bigint auto_increment,
    goal_first_g3_id bigint not null,
    obj varchar(50) not null,
    fn varchar(50) not null,
    primary key(id),
    foreign key(goal_first_g3_id) references tbl_goal_first_g3(id)
);

create table tbl_goal_second(
    id bigint auto_increment,
    fn_id bigint not null,    
    primary key(id),
    foreign key(fn_id) references tbl_fn(id)
);

create table tbl_goal_second_g1(
    id bigint auto_increment,
    goal_second_id bigint not null,
    g1 varchar(50) not null,    
    primary key(id),
    foreign key(goal_second_id) references tbl_goal_second(id)
);

create table tbl_goal_second_g2(
    id bigint auto_increment,
    goal_second_id bigint not null,
    g2 varchar(50) not null,    
    primary key(id),
    foreign key(goal_second_id) references tbl_goal_second(id)
);

create table tbl_goal_second_g3(
    id bigint auto_increment,
    goal_second_id bigint not null,
    g3 varchar(50) not null,    
    primary key(id),
    foreign key(goal_second_id) references tbl_goal_second(id)
);

create table tbl_goal_second_g1_obj(
    id bigint auto_increment,
    goal_second_g1_id bigint not null,
    obj varchar(50) not null,
    primary key(id),
    foreign key(goal_second_g1_id) references tbl_goal_second_g1(id)
);

create table tbl_goal_second_g2_obj(
    id bigint auto_increment,
    goal_second_g2_id bigint not null,
    obj varchar(50) not null,
    primary key(id),
    foreign key(goal_second_g2_id) references tbl_goal_second_g2(id)
);

create table tbl_goal_second_g3_obj(
    id bigint auto_increment,
    goal_second_g3_id bigint not null,
    obj varchar(50) not null,
    primary key(id),
    foreign key(goal_second_g3_id) references tbl_goal_second_g3(id)
);