CREATE TABLE favor
(
    picID int NOT NULL,
    userID int NOT NULL,
    PRIMARY KEY(picID,userID),
    FOREIGN KEY(userID) REFERENCES user(ID),
    FOREIGN KEY(picID) REFERENCES pictures(ID)
 );