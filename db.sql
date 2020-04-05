CREATE TABLE application (
    id int(10) unsigned NOT NULL AUTO_INCREMENT,
    name varchar(16) ,
    email varchar(16) ,
    birth int(4)  ,
    sex varchar(4) ,
    limbs int(2)  ,
    sverh text(32),
    bio text(128),
    consent varchar(8),
    PRIMARY KEY (id)
);
