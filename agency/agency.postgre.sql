-- File name: D:\Projects\BFU\6th Semestr\BD\agency\agency\agency.postgre.sql
-- Created by DBConvert http://www.dbconvert.com


--
-- Table structure for table `passport`
--

create user ivan with password 'password';

CREATE TABLE "passport" (  "passport_id" BIGSERIAL NOT NULL ,
  PRIMARY KEY ("passport_id")
); 


--
-- Table structure for table `personnel`
--

CREATE TABLE "personnel" (  "person_id" BIGSERIAL NOT NULL ,
  "person_name" VARCHAR(50) NOT NULL ,
  PRIMARY KEY ("person_id")
); 


--
-- Table structure for table `country`
--

CREATE TABLE "country" (  "country_id" BIGSERIAL NOT NULL ,
  "country_name" VARCHAR(50) NOT NULL ,
  PRIMARY KEY ("country_id")
); 


--
-- Table structure for table `trip`
--

CREATE TABLE "trip" (  "trip_id" BIGSERIAL NOT NULL ,
  "duration" BIGINT NOT NULL ,
  "cost" FLOAT NOT NULL ,
  PRIMARY KEY ("trip_id")
); 


--
-- Table structure for table `hotel`
--

CREATE TABLE "hotel" (  "hotel_id" BIGSERIAL NOT NULL ,
  "name" VARCHAR(30) NOT NULL ,
  "hotel_type_id" BIGINT NOT NULL ,
  "food_type_id" BIGINT NOT NULL ,
  PRIMARY KEY ("hotel_id")
); 
CREATE INDEX "hotel_HTID" ON "hotel" ("hotel_type_id");
CREATE INDEX "hotel_FTID" ON "hotel" ("food_type_id");


--
-- Table structure for table `client`
--

CREATE TABLE "client" (  "client_id" BIGSERIAL NOT NULL ,
  "group_id" BIGINT NOT NULL ,
  "passport_id" BIGINT unique NOT NULL ,
  "insurance_id" BIGINT NOT NULL ,
  PRIMARY KEY ("client_id"),
  UNIQUE ("passport_id"),FOREIGN KEY ("passport_id") REFERENCES "passport" ( "passport_id" ) ON UPDATE RESTRICT ON DELETE RESTRICT
); 
CREATE INDEX "client_GID" ON "client" ("group_id");
CREATE INDEX "client_IID" ON "client" ("insurance_id");
CREATE INDEX "client_PID" ON "client" ("passport_id");


--
-- Table structure for table `group_`
--

CREATE TABLE "group_" (  "group_id" BIGSERIAL NOT NULL ,
  "n_places" BIGINT NOT NULL ,
  "trip_id" BIGINT NOT NULL ,
  "departure_date" TIMESTAMP NOT NULL ,
  "arrival_date" TIMESTAMP NOT NULL ,
  "attendant_id" BIGINT NOT NULL ,
  PRIMARY KEY ("group_id"),FOREIGN KEY ("attendant_id") REFERENCES "personnel" ( "person_id" ) ON UPDATE RESTRICT ON DELETE RESTRICT,FOREIGN KEY ("trip_id") REFERENCES "trip" ( "trip_id" ) ON UPDATE RESTRICT ON DELETE RESTRICT
); 
CREATE INDEX "group__TID" ON "group_" ("trip_id");
CREATE INDEX "group__AID" ON "group_" ("attendant_id");


--
-- Table structure for table `client__group_`
--

CREATE TABLE "client__group_" (  "client_id" BIGINT NOT NULL ,
  "group_id" BIGINT NOT NULL ,FOREIGN KEY ("group_id") REFERENCES "group_" ( "group_id" ) ON UPDATE RESTRICT ON DELETE RESTRICT,FOREIGN KEY ("client_id") REFERENCES "client" ( "client_id" ) ON UPDATE RESTRICT ON DELETE RESTRICT
); 
CREATE INDEX "client__group__CID" ON "client__group_" ("client_id");
CREATE INDEX "client__group__GID" ON "client__group_" ("group_id");


--
-- Table structure for table `group__hotel`
--

CREATE TABLE "group__hotel" (  "group_id" BIGINT NOT NULL ,
  "hotel_id" BIGINT NOT NULL ,
  "check_in_date" DATE NOT NULL ,
  "check_out_date" DATE NOT NULL ,FOREIGN KEY ("group_id") REFERENCES "group_" ( "group_id" ) ON UPDATE RESTRICT ON DELETE RESTRICT,FOREIGN KEY ("hotel_id") REFERENCES "hotel" ( "hotel_id" ) ON UPDATE RESTRICT ON DELETE RESTRICT
); 
CREATE INDEX "group__hotel_GID" ON "group__hotel" ("group_id");
CREATE INDEX "group__hotel_HID" ON "group__hotel" ("hotel_id");


--
-- Table structure for table `transport_type`
--

CREATE TABLE "transport_type" (  "transport_type_id" BIGSERIAL NOT NULL ,
  "transport_type" VARCHAR(50) NOT NULL ,
  PRIMARY KEY ("transport_type_id")
); 


--
-- Table structure for table `transport_type__trip`
--

CREATE TABLE "transport_type__trip" (  "transport_type_id" BIGINT NOT NULL ,
  "trip_id" BIGINT NOT NULL ,FOREIGN KEY ("transport_type_id") REFERENCES "transport_type" ( "transport_type_id" ) ON UPDATE RESTRICT ON DELETE RESTRICT,FOREIGN KEY ("trip_id") REFERENCES "trip" ( "trip_id" ) ON UPDATE RESTRICT ON DELETE RESTRICT
); 
CREATE INDEX "transport_type__trip_transport_type_id" ON "transport_type__trip" ("transport_type_id");
CREATE INDEX "transport_type__trip_trip_id" ON "transport_type__trip" ("trip_id");


--
-- Table structure for table `trip__excursion`
--

CREATE TABLE "trip__excursion" (  "trip_id" BIGINT NOT NULL ,
  "excursion_id" BIGINT NOT NULL ,FOREIGN KEY ("trip_id") REFERENCES "trip" ( "trip_id" ) ON UPDATE RESTRICT ON DELETE RESTRICT
); 
CREATE INDEX "trip__excursion_TID" ON "trip__excursion" ("trip_id");
CREATE INDEX "trip__excursion_EID" ON "trip__excursion" ("excursion_id");


--
-- Table structure for table `country__trip`
--

CREATE TABLE "country__trip" (  "country_id" BIGINT NOT NULL ,
  "trip_id" BIGINT NOT NULL ,FOREIGN KEY ("country_id") REFERENCES "country" ( "country_id" ) ON UPDATE RESTRICT ON DELETE RESTRICT,FOREIGN KEY ("trip_id") REFERENCES "trip" ( "trip_id" ) ON UPDATE RESTRICT ON DELETE RESTRICT
); 
CREATE INDEX "country__trip_CID" ON "country__trip" ("country_id");
CREATE INDEX "country__trip_TID" ON "country__trip" ("trip_id");


--
-- Table structure for table `users`
--

CREATE TABLE "users" (
  "id" serial primary key ,
  "login" VARCHAR(10) unique NOT NULL ,
  "password" CHAR(32) NOT NULL ,
  "name" VARCHAR(50) NOT NULL
); 


--
-- Dumping data for table `country`
--





--
-- Dumping data for table `users`
--

INSERT INTO "users" ("id","login","password","name") VALUES (0,'root','63a9f0ea7bb98050796b649e85481845','Admin Root');


grant select, insert, update, delete on all tables in schema public to ivan;
grant usage on all sequences in schema public to ivan;