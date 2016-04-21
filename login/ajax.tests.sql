DROP DATABASE IF EXISTS ajaxtests;
CREATE DATABASE IF NOT EXISTS ajaxtests;
use ajaxtests;
create table ajaxusers(
	id int unsigned not null primary key auto_increment,
	user varchar(50) unique not null,
	passwd varchar(32) not null,
	email varchar(100) not null
);

insert into ajaxusers VALUES(
	NULL,
	'arkos',
	'61f7206bff04ebaa30e0ec9e38d08f02',
	'arkos.noem.arenom@gmail.com'
)