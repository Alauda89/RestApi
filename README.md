Slim Rest Api used for generating random number and retriveing by id.

Requirements: Docker-compose.

Index.php and config.php location Nginx/www/slim/public

Clone repository and run docker-compose up -d
 
- curl -XPOST http://localhost/generate (Generate random number and return id of request)

- localhost/retrieve/id (Return random number by request id from generate request)
