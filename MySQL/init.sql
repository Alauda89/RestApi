grant all privileges on restapi.* to 'restapi'@'%' identified by 'pass';
USE restapi


CREATE TABLE numbers 
(
id INTEGER AUTO_INCREMENT,
numbers INTEGER,
PRIMARY KEY (id)
)
