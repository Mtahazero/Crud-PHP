1. Create a Database Table for Products
Write an SQL query to create a table named products that includes columns for
id (primary key, auto-increment), name (string), description (text), price (decimal), stock (integer),
and timestamps for created_at and updated_at.

create TABLE products(
id int AUTO_INCREMENT primary KEY,
name  varchar(100),
description text ,
price decimal(5,2),
stock int (10),
create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
ipdated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);