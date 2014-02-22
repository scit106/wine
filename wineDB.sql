create database wine;

create table reds (
	wineid char(36)
	, style varchar(256)
	, winery varchar(256)
	, year int
	, price decimal(5,2)
	, purchaser varchar(60)
	, tastingnumber int
	, winename varchar(256)
	, externalid varchar(64)
	, externalsource varchar(36)
	);

create table whites (
	wineid char(36)
	, style varchar(256)
	, winery varchar(256)
	, year int
	, price decimal(5,2)
	, purchaser varchar(60)
	, tastingnumber int
	, winename varchar(256)
	, externalid varchar(64)
	, externalsource varchar(36)
	);

create table sparkling (
	wineid char(36)
	, style varchar(256)
	, winery varchar(256)
	, year int
	, price decimal(5,2)
	, purchaser varchar(60)
	, tastingnumber int
	, winename varchar(256)
	, externalid varchar(64)
	, externalsource varchar(36)
	);

create user 'wino'@'localhost' identified by 'SuperSecretPassword';

grant insert, select ON wine.*  to 'wino'@'localhost';

create table votes (tastingnumber int, winetype varchar(10), wineid char(36));

