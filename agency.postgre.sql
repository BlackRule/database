--------------ReferenceBooks---------------
drop table if exists passports_russ cascade;
create table passports_russ (
	id serial primary key ,
	data varchar(100) not null
);

drop table if exists passports_foreign cascade;
create table passports_foreign (
	id serial primary key ,
	data varchar(100) not null
);

drop table if exists insurances cascade;
create table insurances (
	id serial primary key ,
	date_of_issue date not null
);

drop table if exists hotel_types cascade;
create table hotel_types (
	id serial primary key ,
	name varchar(100) not null
);

drop table if exists meal_plans cascade;
create table meal_plans (
	id serial primary key ,
	name varchar(100) not null
);

drop table if exists hotels cascade;
--see accommodations
create table hotels (
	id serial primary key ,
	name varchar(100) not null
	hotel_type_id int not null references hotel_types(id)
	meal_plan_id int not null references meal_plans(id)
);

drop table if exists personnel cascade;
create table personnel (
	id serial primary key ,
	fullname varchar(100) not null
);

drop table if exists transport_types cascade;
--see trips__transport_types
create table transport_types (
	id serial primary key ,
	name varchar(100) not null
);

drop table if exists countries cascade;
--see trips__countries
create table countries (
	id serial primary key ,
	name varchar(100) not null
);
------------------------------------------------
drop table if exists trips cascade;
--see trips__countries
--see trips__transport_types
create table trips (
  id serial primary key ,
	duration int  not null CHECK (duration > 0) ,
	cost money  not null CHECK (cost > 0),
	n_excursions int  not null CHECK (n_excursions > 0),
);
COMMENT ON COLUMN public.trips.cost
    IS 'in US dollars';

drop table if exists groups cascade;
--TODO needs trigger arrival_date - departure_date >= trips.duration
--see accommodations
--see clients__groups
create table groups (
  id serial primary key ,
  n_places int  not null CHECK (n_places > 0),
	trip_id int not null references trips(id),
	hotel_id int not null references hotels(id),
  departure_date date not null,
  arrival_date date not null,
  CHECK (arrival_date > departure_date),
  attendant_id int not null references personnel(id)
);

drop table if exists clients cascade;
--see clients__groups
create table clients (
  id serial primary key ,
  fullname varchar(100) not null,
);
-----------
--https://stackoverflow.com/questions/1743439/how-to-write-a-constraint-concerning-a-max-number-of-rows-in-postgresql
--https://stackoverflow.com/questions/27107034/constraint-to-check-values-from-a-remotely-related-table-via-join-etc/27107221#27107221
drop table if exists accommodations cascade;
create table accommodations (
  id serial primary key ,
  checkin_date date not null,
  checkout_date date not null,
  CHECK (checkout_date > checkin_date),
  group_id int not null references groups(id),
  hotel_id int not null references hotels(id)
);

drop table if exists clients__groups cascade;
--TODO needs trigger group.n_places
create table clients__groups (
  id serial primary key ,
  group_id int not null references groups(id),
  client_id int not null references clients(id)
);

drop table if exists trips__transport_types cascade;
create table trips__transport_types (
  id serial primary key ,
  trip_id int not null references trips(id),
  transport_type_id int not null references transport_types(id)
);

drop table if exists trips__countries cascade;
create table trips__countries (
  id serial primary key ,
  trip_id int not null references trips(id),
  country_id int not null references countries(id)
);

------------------------------------
drop table if exists users cascade;
create table users (
	id serial primary key,
	name varchar(50) not null,
	login varchar(10) unique not null,
	password char(32) not null
);
insert into users(name, login, password) values('root', 'root', md5('Root Admin'));
----------------------------------

create user ivan with password 'password';

grant select, insert, update, delete on all tables in schema public to ivan;
grant usage on all sequences in schema public to ivan;