CREATE TABLE CUSTOMER (
    custometID INT PRIMARY KEY,
    lastName VARCHAR(15),
    firstName VARCHAR(15),
    streetAddress1 VARCHAR(50),
    streetAddress2 VARCHAR(50),
    city VARCHAR(15),
    state VARCHAR(15),
    postalCode INT,
    country VARCHAR(15),
    emailAddress VARCHAR(50),
    homePhone VARCHAR(15),
    facebookPageUrl VARCHAR(100),
    cellPhone VARCHAR(15),
    userid VARCHAR(15),
    password VARCHAR(15),
    salespersonID VARCHAR(15)
);

CREATE TABLE SALESPERSON (
    salespersonID INT PRIMARY KEY,
    lastName VARCHAR(15), 
    firstName VARCHAR(15),
    streetAddress1 VARCHAR(50),
    streetAddress2 VARCHAR(50),
    city VARCHAR(15),
    state VARCHAR(15),
    postalCode INT,
    country VARCHAR(15),
    emailAddress VARCHAR(50),
    homePhone VARCHAR(15),
    facebookPageUrl VARCHAR(100),
    cellPhone VARCHAR(15)
);