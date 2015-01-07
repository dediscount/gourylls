CREATE TABLE user
(
    ID int NOT NULL AUTO_INCREMENT,
    name varchar(20) NOT NULL,
    account varchar(30) NOT NULL,
    password varchar(20) NOT NULL DEFAULT 'password',
    numOfPhotos int NOT NULL DEFAULT 0,
    register_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    icon_path varchar(255),
    UNIQUE(ID,name,account),
    PRIMARY KEY(ID) 
 );