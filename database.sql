##create database and tables 
drop database if exists registration;

#create a database, name it registation_process
create database registration_process;
use registration_process;

#create the six tabls: login_in, registration, trouble_shooting, user, vehicle_registration

create table user (
userid int not null,
userfirstname varchar(30) not null,
userlastname varchar(30) not null,
userphonenumber char(12) not null,
useremailaddress varchar(100) not null,
useraddressid int not null, 
primary key (userid)); 

create table user_address(
useraddressid int not null,
street char(20) null,
city char(20) null,
state char(2) null,
zipcode char(10) null,
country char(20) null,
primary key (useraddressid),
constraint user_address_user foreign key (useraddressid)
references user(useraddressid))
;

create table login_in (
userid int not null,
username char(30) not null,
userpassword char(30) not null,
primary key (userid),
constraint login_in_user foreign key (userid)
		references user(userid));
		

create table vehicle_registration
vin char(17) not null,
make varchar(15) not null,
model varchar(15) not null,
modelyear char(4) not null,
color char(10) not null,
trim char(10) not null,
license plate int null,
vehicle classification char(10) not null,
primary key (vin));

create table registration 
regid int not null,
userid int not null,
employeeid int not null,
vin char(17) not null, 
primary key (regid),
constraints registration_user_fk foreign key(userid)
references user(userid)
constraints registration_employee_fk foreign key (employeeid)
references employee(employeeid)
constrints registration_vin_fk foreign key(vin)
references vehicle_registration(vin));

create table trouble_shooting
forgetusername char(30) not null,
forgetpassword char(30) not null,
securityquestion varchar(50) not null,
primary key(
