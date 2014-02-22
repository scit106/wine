create table reds (wineid char(36), style varchar(36), manufacturer varchar(36), year int, price decimal(5,2), purchaser varchar(60), tastingnumber int);

create table whites (wineid char(36), style varchar(36), manufacturer varchar(36), year int, price decimal(5,2), purchaser varchar(60), tastingnumber int);

create table sparkling (wineid char(36), style varchar(36), manufacturer varchar(36), year int, price decimal(5,2), purchaser varchar(60), tastingnumber int);

create user 'wino'@'localhost' identified by '';

grant insert, select ON wine.*  to 'wino'@'localhost';

create table votes (tastingnumber int, winetype varchar(10), wineid char(36));

alter table reds add column winename varchar(36);

alter table whites 
add column externalid varchar(64)
, add column externalsource varchar(36)
;


alter table reds
add column externalid varchar(64)
, add column externalsource varchar(36)
;


alter table sparkling
add column externalid varchar(64)
, add column externalsource varchar(36)
;