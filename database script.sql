use martinsb;

CREATE TABLE if not exists building_floor (
    floor_number INT,
    number_of_rooms INT,
    primary key (floor_number)
);

CREATE TABLE if not exists building_room (
    room_number VARCHAR(6),
    hasMail BOOLEAN,
    occupied BOOLEAN,
    floor_number int,
    studentID int,
	FOREIGN KEY (floor_number)
        REFERENCES building_floor (floor_number),
    PRIMARY KEY (room_number)
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

CREATE TABLE if not exists staff (
    staffID INT,
    first_name VARCHAR(30),
    last_name VARCHAR(30),
    address VARCHAR(200),
    PRIMARY KEY (staffID)
);

