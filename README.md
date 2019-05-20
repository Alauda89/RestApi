Slim Rest Api used for generating random number and retrieving id.

Index.php and config.php location Nginx/www/slim/public

Run App - download zip from git, create new folder and unpack zip into, install docker, after this write in terminal docker-compose up ( your location must be in folder that you created), write in terminal curl -XPOST http://localhost/generate, then run favourite browser and write localhost/retrieve/id

Each time you write curl -XPOST http://localhost/generate in terminal, you will generate number of operation, then in browser after localhost/retrieve/1-for example you will see id and number.
