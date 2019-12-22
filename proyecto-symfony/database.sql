CREATE DATABASE IF NOT EXISTS symfony_master;
USE symfony_master;


CREATE TABLE IF NOT EXISTS users(
    id int(255) auto_increment not null,
    role varchar(50),
    name varchar(100),
    surname varchar(200),
    email varchar(255),
    password varchar(255),
    created_at datetime,

    CONSTRAINT pk_users PRIMARY KEY (id)

)ENGINE = InnoDb;

USE symfony_master;
CREATE TABLE IF NOT EXISTS tasks(
    id int(255) auto_increment not null,
    user_id int(255) not null,
    title varchar(255),
    content text,
    priority varchar(20),
    hours int(100),
    created_at datetime,

    CONSTRAINT pk_task PRIMARY KEY (id),
    CONSTRAINT fk_task_user FOREIGN KEY (user_id) REFERENCES users(id)
)ENGINE = InnoDb;

USE symfony_master;
INSERT INTO users VALUES(NULL,'ROLE_USER','Raul','Sanchez','raul@mail.com','password',CURTIME());
INSERT INTO users VALUES(NULL,'ROLE_USER','Pepe','Perez','pepe@mail.com','password',CURTIME());
INSERT INTO users VALUES(NULL,'ROLE_USER','Ana','Gonzalez','ana@mail.com','password',CURTIME());

USE symfony_master;
INSERT INTO tasks VALUES(NULL,2,'Titulo 1','Tarea para hacer 1','high',12,CURTIME());
INSERT INTO tasks VALUES(NULL,1,'Titulo 2','Tarea para hacer 2','low',10,CURTIME());
USE symfony_master;
INSERT INTO tasks VALUES(NULL,3,'Titulo 3','Tarea para hacer 3','medium',5,CURTIME());