CREATE DATABASE IF NOT EXISTS laravel_master;

USE laravel_master;
create table users (
    id  int(255) auto_increment not null,
    role   varchar(20),
    surname varchar(200),
    nick varchar(100),
    email varchar(255),
    password varchar(255),
    image varchar(255),
    create_at datetime,
    update_at datetime,
    remember_token varchar(255),

    constraint pk_users primary key (id)

)ENGINE=InnoDb;

USE laravel_master;
create table images (
    id int(255) auto_increment not null,
    user_id int (255),
    image_path varchar(255),
    description text,
    create_at datetime,
    update_at datetime,

    constraint pk_images primary key (id),
    constraint fk_images_users foreign key (user_id) references users(id)

)ENGINE=InnoDB;

USE laravel_master;
create table comments (
    id int(255) auto_increment not null,
    user_id int (255),
    image_id int(255),
    content text,
    create_at datetime,
    update_at datetime,

    constraint pk_comments primary key (id),
    constraint fk_comments_users foreign key (user_id) references users(id),
    constraint fk_comments_images foreign key (image_id) references images(id)

)ENGINE=InnoDB;

USE laravel_master;
create table likes (
    id int(255) auto_increment not null,
    user_id int (255),
    image_id int(255),
    created_at datetime,
    updated_at datetime,

    constraint pk_likes primary key (id),
    constraint fk_likes_users foreign key (user_id) references users(id),
    constraint fk_likes_images foreign key (image_id) references images(id)

)ENGINE=InnoDB;


USE laravel_master;
INSERT INTO users VALUES (NULL,'user','Raul','Sanchez','raulsr','raul@mail.com','123456',null,curtime(),curtime(),null);
INSERT INTO users VALUES (NULL,'user','Juan','Lopez','juanl','juan@mail.com','123456',null,curtime(),curtime(),null);
INSERT INTO users VALUES (NULL,'user','Pepe','Pepino','pepepe','pepe@mail.com','123456',null,curtime(),curtime(),null);


USE laravel_master;
INSERT INTO images VALUES (NULL,1,'test1.jpg','descripcion prueba 1 ',curtime(),curtime());
INSERT INTO images VALUES (NULL,3,'playa.jpg','descripcion playa  ',curtime(),curtime());
INSERT INTO images VALUES (NULL,4,'montain.jpg','descripcion montaña  ',curtime(),curtime());

USE laravel_master;
INSERT INTO comments VALUES (NULL,1,1,'Buena prueba 1',curtime(),curtime());
INSERT INTO comments VALUES (NULL,1,3,'Nice!!! ',curtime(),curtime());
INSERT INTO comments VALUES (NULL,3,4,'Look great!',curtime(),curtime());


USE laravel_master;
INSERT INTO likes VALUES (NULL,1,1,curtime(),curtime());
INSERT INTO likes VALUES (NULL,1,3,curtime(),curtime());
INSERT INTO likes VALUES (NULL,3,4,curtime(),curtime());
