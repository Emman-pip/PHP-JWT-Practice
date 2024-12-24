# JSON Web Token Usage Practice
This repository is made to mainly to practice using JWT for API usage and development. 

## TLDR;
- this is an API that uses JWT for authentcation
- written using PHP
- will be using an sqlite database

## Database Schema
```sql
CREATE TABLE sqlite_sequence(name,seq);
CREATE TABLE Users(userId INTEGER PRIMARY KEY AUTOINCREMENT, username text not null unique, password varchar(64) not null);
CREATE TABLE Tasks(taskId INTEGER PRIMARY KEY, taskName text not null, description text not null, lastUpdated DATETIME not null, owner text not null, FOREIGN KEY (owner) REFERENCES Users(username));
```
## TODO 
- [x] create jwt keys
    - [x] create secret key in a .env file
    - [x] read the .env and access secret key
    - [x] place the credentials on the payload
- [x] create decoders
- [x] create classes for verification
  - [x] recreate token and compare
  - [x] throw error for invalid credentials
- [x] send data with JWT as element in the header
- [x] connect to database
  - [x] create database (sqlite)
- [ ] task operations
  - [x] read tasks
  - [ ] create tasks
  - [ ] update tasks
  - [ ] delete tasks 
