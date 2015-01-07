CREATE TABLE food
(
    ID int NOT NULL AUTO_INCREMENT,
    name varchar(30) NOT NULL,
    recipe_availability boolean NOT NULL,
    recipe_link varchar(255),
    UNIQUE(ID),
    PRIMARY KEY(ID)
 );