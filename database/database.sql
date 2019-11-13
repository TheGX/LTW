CREATE TABLE Users (
    ID              INTEGER PRIMARY KEY,
    Username        TEXT    NOT NULL    UNIQUE, 
    Password        TEXT    NOT NULL,
    Name            TEXT    NOT NULL,
    Email           TEXT    NOT NULL    UNIQUE,
    UserType        INTEGER REFERENCES  UserTypes,
    Accomodation    INTEGER REFERENCES  Reservation,
    Biography       TEXT,
    PhoneNumber     TEXT,
    Avatar          TEXT
);

CREATE TABLE Houses ( 
    ID              INTEGER PRIMARY KEY,
    Name            TEXT    NOT NULL,
    Address         TEXT    NOT NULL,
    Title           TEXT    NOT NULL,
    Description     TEXT,
    DailyCost       DECIMAL,
    OwnerID         INTEGER NOT NULL    REFERENCES Users
);

CREATE TABLE Reservation (
    ID          INTEGER PRIMARY KEY,
    StartDate   DATE    NOT NULL,
    EndDate     DATE    NOT NULL,
    Guest       INTEGER NOT NULL    REFERENCES  Users
);

CREATE TABLE UserTypes (
    ID      INTEGER PRIMARY KEY,
    Name    TEXT    NOT NULL    UNIQUE
);

INSERT INTO UserTypes VALUES (NULL, 'ADMIN');
INSERT INTO UserTypes VALUES (NULL, 'TOURIST');
INSERT INTO UserTypes VALUES (NULL, 'OWNER');

INSERT INTO Users VALUES (
    NULL, --ID
    'systemadmin', --username
    'q46r&@NwvJ&yC2$^$A3d=9+F9MR!bL7ebt!?Jxdzm=Gy@AwGFpzH?CZ-g_6NL$X=b!*A$=+xK$=k+&Pu!+vuB6BJz5k8yCn6jd=RsCQtJuJj3g72q5uBA-KKc#ZaYgMx', --Password
    'System Admin', --Name
    'sadmin@rentals.com', --email
    'ADMIN', --User Type
    NULL, --Accomodation
    NULL, --Biography
    NULL, --Phone
    NULL  --Picture
);