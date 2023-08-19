create database form;
use form;
create table contact_form(
    Name varchar(100) not null,
    phone_number varchar(15) not null,
    Email varchar(100) not null,
    subject varchar(100) not null,
    Message varchar(100) not null
);