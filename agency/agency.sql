-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2018 at 12:25 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

-- SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
-- SET AUTOCOMMIT = 0;
-- START TRANSACTION;
-- SET time_zone = "+00:00";

--
-- Database: agency
--

-- --------------------------------------------------------

--
-- Table structure for table client
--

CREATE TABLE client (
  client_id int  NOT NULL,
  group_id int  NOT NULL,
  passport_id int  NOT NULL,
  insurance_id int  NOT NULL
);

--
-- RELATIONSHIPS FOR TABLE client:
--   passport_id
--       passport -> passport_id
--

-- --------------------------------------------------------

--
-- Table structure for table client__group_
--

CREATE TABLE client__group_ (
  client_id int  NOT NULL,
  group_id int  NOT NULL
);

--
-- RELATIONSHIPS FOR TABLE client__group_:
--   group_id
--       group_ -> group_id
--   client_id
--       client -> client_id
--

-- --------------------------------------------------------

--
-- Table structure for table country
--

CREATE TABLE country (
  country_id int  NOT NULL,
  country_name varchar(25) COLLATE cp1251_bin NOT NULL
) ;

--
-- RELATIONSHIPS FOR TABLE country:
--

--
-- Dumping data for table country
--



-- --------------------------------------------------------

--
-- Table structure for table country__trip
--

CREATE TABLE country__trip (
  country_id int  NOT NULL,
  trip_id int  NOT NULL
);

--
-- RELATIONSHIPS FOR TABLE country__trip:
--   country_id
--       country -> country_id
--   trip_id
--       trip -> trip_id
--

-- --------------------------------------------------------

--
-- Table structure for table group_
--

CREATE TABLE group_ (
  group_id int  NOT NULL,
  n_places int  NOT NULL,
  trip_id int  NOT NULL,
  departure_date datetime NOT NULL,
  arrival_date datetime NOT NULL,
  attendant_id int  NOT NULL
);

--
-- RELATIONSHIPS FOR TABLE group_:
--   attendant_id
--       personnel -> person_id
--   trip_id
--       trip -> trip_id
--

-- --------------------------------------------------------

--
-- Table structure for table group__hotel
--

CREATE TABLE group__hotel (
  group_id int  NOT NULL,
  hotel_id int  NOT NULL,
  check_in_date date NOT NULL,
  check_out_date date NOT NULL
);

--
-- RELATIONSHIPS FOR TABLE group__hotel:
--   group_id
--       group_ -> group_id
--   hotel_id
--       hotel -> hotel_id
--

-- --------------------------------------------------------

--
-- Table structure for table hotel
--

CREATE TABLE hotel (
  hotel_id int  NOT NULL,
  name varchar(100) NOT NULL,
  hotel_type_id int  NOT NULL,
  food_type_id int  NOT NULL
);

--
-- RELATIONSHIPS FOR TABLE hotel:
--

-- --------------------------------------------------------

--
-- Table structure for table passport
--

CREATE TABLE passport (
  passport_id int  NOT NULL
);

--
-- RELATIONSHIPS FOR TABLE passport:
--

-- --------------------------------------------------------

--
-- Table structure for table personnel
--

CREATE TABLE personnel (
  person_id int  NOT NULL,
  person_name varchar(100) NOT NULL
);

--
-- RELATIONSHIPS FOR TABLE personnel:
--

-- --------------------------------------------------------

--
-- Table structure for table transport_type
--

CREATE TABLE transport_type (
  transport_type_id int  NOT NULL,
  transport_type varchar(10) NOT NULL
);

--
-- RELATIONSHIPS FOR TABLE transport_type:
--

-- --------------------------------------------------------

--
-- Table structure for table transport_type__trip
--

CREATE TABLE transport_type__trip (
  transport_type_id int  NOT NULL,
  trip_id int  NOT NULL
);

--
-- RELATIONSHIPS FOR TABLE transport_type__trip:
--   transport_type_id
--       transport_type -> transport_type_id
--   trip_id
--       trip -> trip_id
--

-- --------------------------------------------------------

--
-- Table structure for table trip
--

CREATE TABLE trip (
  trip_id int  NOT NULL,
--   duration int  NOT NULL COMMENT in days,
--   cost float  NOT NULL COMMENT in rubles,
  duration int  NOT NULL,
  cost float  NOT NULL
);

COMMENT ON COLUMN trip.duration IS 'in days';

COMMENT ON COLUMN trip.cost IS 'in rubles';

--
-- RELATIONSHIPS FOR TABLE trip:
--

-- --------------------------------------------------------

--
-- Table structure for table trip__excursion
--

CREATE TABLE trip__excursion (
  trip_id int  NOT NULL,
  excursion_id int  NOT NULL
);

--
-- RELATIONSHIPS FOR TABLE trip__excursion:
--   trip_id
--       trip -> trip_id
--

-- --------------------------------------------------------

--
-- Table structure for table users
--

CREATE TABLE users (
  id int NOT NULL,
  login varchar(10) NOT NULL,
  password char(32) NOT NULL,
  name varchar(50) NOT NULL
);

--
-- RELATIONSHIPS FOR TABLE users:
--

--
-- Dumping data for table users
--

INSERT INTO users (id, login, password, name) VALUES
(0, root, "63a9f0ea7bb98050796b649e85481845", "Admin Root");

--
-- Indexes for dumped tables
--

--
-- Indexes for table client

-- ALTER TABLE client
--   ADD PRIMARY KEY (client_id),
--   ADD UNIQUE KEY passport_id (passport_id),
--   ADD KEY GID (group_id),
--   ADD KEY IID (insurance_id),
--   ADD KEY PID (passport_id);
--
ALTER TABLE client
  ADD PRIMARY KEY (client_id),
  ADD KEY passport_id (passport_id),
  ADD KEY GID (group_id),
  ADD KEY IID (insurance_id),
  ADD KEY PID (passport_id),
  ADD CONSTRAINT PID_constraint UNIQUE (passport_id);
--
-- Indexes for table client__group_
--
ALTER TABLE client__group_
  ADD KEY CID (client_id),
  ADD KEY GID (group_id);

--
-- Indexes for table country
--
ALTER TABLE country
  ADD PRIMARY KEY (country_id);

--
-- Indexes for table country__trip
--
ALTER TABLE country__trip
  ADD KEY CID (country_id),
  ADD KEY TID (trip_id);

--
-- Indexes for table group_
--
ALTER TABLE group_
  ADD PRIMARY KEY (group_id),
  ADD KEY TID (trip_id),
  ADD KEY AID (attendant_id);

--
-- Indexes for table group__hotel
--
ALTER TABLE group__hotel
  ADD KEY GID (group_id),
  ADD KEY HID (hotel_id);

--
-- Indexes for table hotel
--
ALTER TABLE hotel
  ADD PRIMARY KEY (hotel_id),
  ADD KEY HTID (hotel_type_id),
  ADD KEY FTID (food_type_id);

--
-- Indexes for table passport
--
ALTER TABLE passport
  ADD PRIMARY KEY (passport_id);

--
-- Indexes for table personnel
--
ALTER TABLE personnel
  ADD PRIMARY KEY (person_id);

--
-- Indexes for table transport_type
--
ALTER TABLE transport_type
  ADD PRIMARY KEY (transport_type_id);

--
-- Indexes for table transport_type__trip
--
ALTER TABLE transport_type__trip
  ADD KEY transport_type_id (transport_type_id),
  ADD KEY trip_id (trip_id);

--
-- Indexes for table trip
--
ALTER TABLE trip
  ADD PRIMARY KEY (trip_id);

--
-- Indexes for table trip__excursion
--
ALTER TABLE trip__excursion
  ADD KEY TID (trip_id),
  ADD KEY EID (excursion_id);

--
-- Indexes for table users
--
ALTER TABLE users
  ADD PRIMARY KEY (id);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table client
--
ALTER TABLE client
  MODIFY client_id int  NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table country
--
ALTER TABLE country
  MODIFY country_id int  NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table group_
--
ALTER TABLE group_
  MODIFY group_id int  NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table hotel
--
ALTER TABLE hotel
  MODIFY hotel_id int  NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table passport
--
ALTER TABLE passport
  MODIFY passport_id int  NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table personnel
--
ALTER TABLE personnel
  MODIFY person_id int  NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table transport_type
--
ALTER TABLE transport_type
  MODIFY transport_type_id int  NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table trip
--
ALTER TABLE trip
  MODIFY trip_id int  NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table client
--
ALTER TABLE client
  ADD CONSTRAINT FK_client_passport_passport_id FOREIGN KEY (passport_id) REFERENCES passport (passport_id);

--
-- Constraints for table client__group_
--
ALTER TABLE client__group_
  ADD CONSTRAINT client__group__ibfk_1 FOREIGN KEY (group_id) REFERENCES group_ (group_id),
  ADD CONSTRAINT client__group__ibfk_2 FOREIGN KEY (client_id) REFERENCES client (client_id);

--
-- Constraints for table country__trip
--
ALTER TABLE country__trip
  ADD CONSTRAINT country__trip_ibfk_1 FOREIGN KEY (country_id) REFERENCES country (country_id),
  ADD CONSTRAINT country__trip_ibfk_2 FOREIGN KEY (trip_id) REFERENCES trip (trip_id);

--
-- Constraints for table group_
--
ALTER TABLE group_
  ADD CONSTRAINT group__ibfk_1 FOREIGN KEY (attendant_id) REFERENCES personnel (person_id),
  ADD CONSTRAINT group__ibfk_2 FOREIGN KEY (trip_id) REFERENCES trip (trip_id);

--
-- Constraints for table group__hotel
--
ALTER TABLE group__hotel
  ADD CONSTRAINT group__hotel_ibfk_1 FOREIGN KEY (group_id) REFERENCES group_ (group_id),
  ADD CONSTRAINT group__hotel_ibfk_2 FOREIGN KEY (hotel_id) REFERENCES hotel (hotel_id);

--
-- Constraints for table transport_type__trip
--
ALTER TABLE transport_type__trip
  ADD CONSTRAINT transport_type__trip_ibfk_1 FOREIGN KEY (transport_type_id) REFERENCES transport_type (transport_type_id),
  ADD CONSTRAINT transport_type__trip_ibfk_2 FOREIGN KEY (trip_id) REFERENCES trip (trip_id);

--
-- Constraints for table trip__excursion
--
ALTER TABLE trip__excursion
  ADD CONSTRAINT trip__excursion_ibfk_1 FOREIGN KEY (trip_id) REFERENCES trip (trip_id);
COMMIT;
