# JSON Web Token Usage Practice
This repository is mainly to practice using JWT for API usage and development. 

## TLDR;
- this is an API that uses JWT for authentcation
- written using PHP
- will be using an sqlite database

## Database Schema
```sql
CREATE TABLE Users(userId int primary key not null, username text not null, password varchar(64) not null);
CREATE TABLE Tasks(taskId int primary key not null, taskName text not null, description text not null, lastUpdated DATETIME not null, ownerId int not null, FOREIGN KEY (ownerId) REFERENCES Users(userId));
```
## TODO 
- [x] create jwt keys
    - [ ] create secret key in a .env file
    - [ ] read the .env and access secret key
- [x] create decoders
- [ ] create classes for verification
  - [ ]recreate token and compare
  - [ ] throw error for invalid credentials
- [ ] send data with JWT as element in the header
- [ ] connect to database
  - [ ] create database (sqlite)
