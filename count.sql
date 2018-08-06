CREATE DATABASE count;
USE count;

create table users (
    id INT NOT NULL AUTO_INCREMENT, 
    username VARCHAR(20) NOT NULL, 
    word VARCHAR(10) NOT NULL, 
    countword INT NOT NULL, 
    PRIMARY KEY(id)
) ENGINE InnoDB;
