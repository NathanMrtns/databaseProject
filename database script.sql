use martinsb;

CREATE TABLE if not exists building_room (
    room_number VARCHAR(6),
    capacity INT,
    hasMail BOOLEAN,
    occupied BOOLEAN,
    floor_number int,
	FOREIGN KEY (floor_number)
        REFERENCES building_floor (floor_number),
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
    isRA boolean,
    raFloor int,
	FOREIGN KEY (raFloor)
		REFERENCES building_floor (floor_number),
    FOREIGN KEY (room_number)
        REFERENCES building_room (room_number),
    PRIMARY KEY (studentID)
);

CREATE TABLE if not exists building (
    buildingID INT AUTO_INCREMENT,
    building_name VARCHAR(30),
    building_address VARCHAR(200),
    number_of_floors INT,
    PRIMARY KEY (buildingID)
);

CREATE TABLE if not exists staff (
    staffID INT,
    first_name VARCHAR(30),
    last_name VARCHAR(30),
    address VARCHAR(200),
    PRIMARY KEY (staffID)
);

insert into building_room
value("201A",2,false,false,2);

insert into building_room
value("201B",2,false,true,2);

insert into building_room
value("201C",2,false,true,2);

insert into building_room
value("201D",2,false,true,2);

insert into building_room
value("301A",2,false,true,3);

insert into building_room
value("301B",2,false,false,3);

insert into building_room
value("301C",2,false,false,3);

insert into building_room
value("301D",2,false,false,3);


INSERT INTO resident
VALUES(1111111, 'Billy', 'Jenkins', 'billy.jenkins@ndsu.edu', '201B', NULL);
INSERT INTO resident
VALUES(1111112, 'Ryan', 'Remke', 'ryan.remkey@ndsu.edu', '201C', NULL);
INSERT INTO resident
VALUES(1111113, 'Randy', 'Daniels', 'randy.daniels@ndsu.edu', '201D', NULL);
INSERT INTO resident
VALUES(1111114, 'Matt', 'Oen', 'matt.oen@ndsu.edu', '301A', NULL);

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
