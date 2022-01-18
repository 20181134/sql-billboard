drop database if exists sqlbillboard;
create database sqlbillboard character set utf8 collate utf8_general_ci;
grant all on sqlbillboard.* to 'admin'@'localhost' identified by 'password';
use sqlbillboard;

create table contents (
    uploader varchar(30) not null,
    avatar varchar(30) not null,
    tweets varchar(140) not null
);
create table userdata (
    username varchar(30) not null,
    password varchar(30) not null,
    avatar varchar(30) not null
);