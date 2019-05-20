grant all privileges on restapi.* to 'restapi'@'%' identified by 'pass';
USE restapi


CREATE TABLE numbers 
(
id INTEGER AUTO_INCREMENT,
number INTEGER,
PRIMARY KEY (id)
)
