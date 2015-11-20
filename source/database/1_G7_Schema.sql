/* 
	Run SQLs accordingly
	1) 1_G7_Schema.sql
	2) 2_G7_Data.sql (only one time)
	3) 3_G7_SP.sql
*/

/* G7_Schema */
drop database if exists g7;
create database g7;
use g7;	

/*G7_Users table, stores users info*/
drop table if exists G7_Users;
create table G7_Users ( 
	UserId		int auto_increment primary key,
	UserName	varchar(30) not null,
	RealName 	varchar(30),
	Passwd 		varchar(32) not null,
	Gender 		char(1),
	Age 		tinyint default '18',
	Email 		varchar(50) not null,
	Phone 		varchar(30),
	City		varchar(30),
	Occupation  varchar(30),
	Hobbies		varchar(100),
	GroupId 	tinyint default '3',
	AvatarId 	tinyint default '1',
	RegIp 		varchar(15),
	JoinDate 	datetime,
	LastIp 		varchar(15),
	LastVisit 	datetime,	
	IsOnline	char(1),
	IsValid     char(1) default '1'
);

/*G7_Contact table, stores users contact info*/
drop table if exists G7_Contact;
create table G7_Contact (
	ContactId int auto_increment primary key, 
	YourName varchar(30) not null, 
	Email varchar(50) not null, 
	Subject varchar(50) not null, 
	Message text not null, 
	ContactDate timestamp default current_timestamp, 
	IsReplied char(1) default '0'
);
