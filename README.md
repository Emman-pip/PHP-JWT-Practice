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

## API Request Routes
### /
- The index route of the api. The request a GET request with no body. 
- response
```json
{
    "message": "Welcome to php-sample-api!!!",
    "url": "/"
}
```

### /user-log
- the route where users can get authentication tokens
- requires the following:
    1. POST method
    2. username
    3. password
- it has a null response
### /user-new
- where users can sign up 
- request the following:
    1. POST request
    2. body with unique username and password
- it has a null response
### /tasks
- where users can get tasks related to their accounts
- request the following:
    1. POST request
    2. authentication token on the header (bearer)
- sample response
```json
[
    {
        "taskId": 4,
        "0": 4,
        "taskName": "new2",
        "1": "new2",
        "description": "new task",
        "2": "new task",
        "lastUpdated": "2024-12-24 23:20:50",
        "3": "2024-12-24 23:20:50",
        "owner": "",
        "4": ""
    },
    {
        "taskId": 5,
        "0": 5,
        "taskName": "new2",
        "1": "new2",
        "description": "new task",
        "2": "new task",
        "lastUpdated": "2024-12-24 23:21:59",
        "3": "2024-12-24 23:21:59",
        "owner": "",
        "4": ""
    },
    {
        "taskId": 6,
        "0": 6,
        "taskName": "new2",
        "1": "new2",
        "description": "new task",
        "2": "new task",
        "lastUpdated": "2024-12-24 23:23:00",
        "3": "2024-12-24 23:23:00",
        "owner": "",
        "4": ""
    },
    {
        "taskId": 7,
        "0": 7,
        "taskName": "new2",
        "1": "new2",
        "description": "new task",
        "2": "new task",
        "lastUpdated": "2024-12-24 23:23:13",
        "3": "2024-12-24 23:23:13",
        "owner": "",
        "4": ""
    },
    {
        "taskId": 8,
        "0": 8,
        "taskName": "new2",
        "1": "new2",
        "description": "new task",
        "2": "new task",
        "lastUpdated": "2024-12-24 23:25:34",
        "3": "2024-12-24 23:25:34",
        "owner": "",
        "4": ""
    },
    {
        "taskId": 9,
        "0": 9,
        "taskName": "new2",
        "1": "new2",
        "description": "new task",
        "2": "new task",
        "lastUpdated": "2024-12-24 23:27:22",
        "3": "2024-12-24 23:27:22",
        "owner": "",
        "4": ""
    }
]
```

### /task-new
- where users can create new tasks
- request the following:
    1. POST request
    2. authentication token on the header (bearer)
    3. body with variables of taskName and description
- it has a null response
### /task-update
- where users can update existing tasks
- request the following:
    1. POST request
    2. authentication token on the header (bearer)
    3. body with variables of taskId, taskName, and description
- it has a null response
### /task-delete
- where users can delete tasks
- request the following:
    1. POST request
    2. authentication token on the header (bearer)
    3. body with variables of taskId
- it has a null response


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
- [x] task operations
  - [x] read tasks
  - [x] create tasks
  - [x] update tasks
  - [x] delete tasks 
  - [ ] update and delete task operations as PUT
