DROP DATABASE count;
CREATE DATABASE count;

create table users (
    id INT NOT NULL AUTO_INCREMENT, 
    username VARCHAR(20) NOT NULL, 
    word VARCHAR(10) NOT NULL, 
    countword INT NOT NULL, 
    PRIMARY KEY(id)
) ENGINE InnoDB;

INSERT INTO users (username,word,countword) VALUES('pontus','skräp',5);
