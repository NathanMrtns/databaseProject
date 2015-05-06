use martinsb;

CREATE TABLE if not exists building_room (
    room_number VARCHAR(6),
    capacity INT,
    hasMail BOOLEAN,
    occupied BOOLEAN,
    PRIMARY KEY (room_number)
);

CREATE TABLE if not exists building_floor (
    floor_number INT,
    number_of_rooms INT,
    primary key (floor_number)
);

CREATE TABLE if not exists resident (
    studentID INT,
    first_name VARCHAR(30),
    last_name VARCHAR(30),
    email VARCHAR(30),
    room_number VARCHAR(6),
    hallgov_position VARCHAR(40),
    FOREIGN KEY (room_number)
        REFERENCES building_room (room_number),
    PRIMARY KEY (studentID)
);


CREATE TABLE if not exists residentAssistant (
    studentID INT,
    first_name VARCHAR(30),
    last_name VARCHAR(30),
    email VARCHAR(30),
    room_number VARCHAR(6),
    hallgov_position VARCHAR(40),
    floor_number INT,
	PRIMARY KEY (studentID),
    FOREIGN KEY (floor_number)
		REFERENCES building_floor (floor_number),
    FOREIGN KEY (room_number)
        REFERENCES building_room (room_number)
);

CREATE TABLE if not exists building (
    buildingID INT AUTO_INCREMENT,
    building_name VARCHAR(30),
    building_adress VARCHAR(200),
    number_of_floors INT,
    PRIMARY KEY (buildingID)
);

CREATE TABLE if not exists staff (
    staffID INT,
    first_name VARCHAR(30),
    last_name VARCHAR(30),
    adress VARCHAR(200),
    PRIMARY KEY (staffID)
);

INSERT INTO BUILDING (building_name,building_adress,number_of_floors)
VALUES ('Pavek', '1420 Bolley Drive, Fargo, North Dakota, 58102', 9);

insert into building_room
value("201A",2,false,true);

insert into building_room
value("201B",2,false,true);

insert into building_room
value("201C",2,false,true);

insert into building_room
value("201D",2,false,true);

insert into building_room
value("301A",2,false,true);

insert into building_room
value("301B",2,false,false);

insert into building_room
value("301C",2,false,false);

insert into building_room
value("301D",2,false,true);

INSERT INTO building_floor
VALUES(1, 8);

insert into building_floor
values (2,8);

insert into building_floor
values (3,8);

INSERT INTO building_floor
VALUES(4, 8);

INSERT INTO building_floor
VALUES(5, 8);

INSERT INTO building_floor
VALUES(6, 8);

INSERT INTO building_floor
VALUES(7, 8);

INSERT INTO building_floor
VALUES(8, 8);

INSERT INTO building_floor
VALUES(9, 8);


INSERT INTO staff
VALUES (1, 'Linda', 'Hensworth', 'Plataform 9 3/4');


INSERT INTO resident
VALUES(1111111, 'Billy', 'Jenkins', 'billy.jenkins@ndsu.edu', '201B', NULL);
INSERT INTO resident
VALUES(1111112, 'Ryan', 'Remke', 'ryan.remkey@ndsu.edu', '201C', NULL);
INSERT INTO resident
VALUES(1111113, 'Randy', 'Daniels', 'randy.daniels@ndsu.edu', '201D', NULL);
INSERT INTO resident
VALUES(1111114, 'Matt', 'Oen', 'matt.oen@ndsu.edu', '301A', NULL);
