CREATE TABLE Users (
    ID                  INTEGER PRIMARY KEY,
    Username            TEXT    NOT NULL        UNIQUE, 
    Password            TEXT    NOT NULL,
    Name                TEXT    NOT NULL,
    Email               TEXT    NOT NULL        UNIQUE,
    Address             TEXT,
    LanguagesSpoken     TEXT,
    Profession          TEXT,
    Biography           TEXT,
    PhoneNumber         TEXT,
    Title               VARCHAR         REFERENCES Images
);

CREATE TABLE Houses ( 
    ID              INTEGER PRIMARY KEY,
    OwnerID         INTEGER NOT NULL    REFERENCES Users,
    Title           TEXT    NOT NULL,
    Country         TEXT    NOT NULL,
    City            TEXT    NOT NULL,
    Street          TEXT    NOT NULL,
    ZIPCode         TEXT    NOT NULL,
    Thumbnail       TEXT    NOT NULL,
    DailyCost       DECIMAL NOT NULL,
    Picture1        TEXT,
    Picture2        TEXT,
    Picture3        TEXT,
    Picture4        TEXT,
    Picture5        TEXT,
    Picture6        TEXT,
    Picture7        TEXT,
    Picture8        TEXT,
    Picture9        TEXT,
    Bathrooms       INTEGER,
    SingleBeds      INTEGER,
    DoubleBeds      INTEGER,
    Description     TEXT,
    HouseType       TEXT
);

CREATE TABLE Reservation (
    ID          INTEGER PRIMARY KEY,
    GuestID     INTEGER NOT NULL    REFERENCES  Users,
    HouseID     INTEGER NOT NULL    REFERENCES  Houses,
    StartDate   DATE    NOT NULL,
    EndDate     DATE    NOT NULL,
    PricePaid   DECIMAL NOT NULL,
    Comment     TEXT,
    CommentDate DATETIME,
    Reply       TEXT,
    ReplyDate   DATETIME,
    HouseRating INTEGER,
    GuestRating INTEGER
);

CREATE TABLE Chat (
  ID            INTEGER     PRIMARY KEY,
  SenderID      INTEGER     NOT NULL    REFERENCES Users,
  ReceiverID    INTEGER     NOT NULL    REFERENCES Users,
  Date          DATETIME    NOT NULL,
  Text          TEXT        NOT NULL
);


CREATE TABLE Images (
    ID INTEGER PRIMARY KEY,
    Title VARCHAR NOT NULL
);
