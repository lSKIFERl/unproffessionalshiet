CREATE TABLE cappapride (
    id int(10) unsigned NOT NULL AUTO_INCREMENT,
    name varchar(128) ,
    login varchar(128) ,
    password varchar(128) ,
    email varchar(32) ,
    birth int(4) ,
    sex varchar(4) ,
    limbs int(2) ,
    sverh text(128) ,
    bio text(128) ,
    consent varchar(8) ,
    PRIMARY KEY (id)
);