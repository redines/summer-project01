DROP DATABASE count;
CREATE DATABASE count;

create table users (
    id INT NOT NULL AUTO_INCREMENT, 
    name VARCHAR(20) NOT NULL, 
    word VARCHAR(10) NOT NULL, 
    count INT NOT NULL, PRIMARY KEY(id)
) ENGINE InnoDB;

