CREATE TABLE pictures
(
    ID int NOT NULL AUTO_INCREMENT,
    pic_path varchar(255) NOT NULL,
    title varchar(255) NOT NULL,
    description varchar(255),
    format varchar(20) NOT NULL,
    size float NOT NULL, 
    uploadingDate TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    userID int NOT NULL,
    favor int NOT NULL DEFAULT 0,
    UNIQUE(ID,pic_path),
    PRIMARY KEY(ID), 
    FOREIGN KEY(userID) REFERENCES user(ID)
 );