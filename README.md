__REQUIREMENTS__

1. Apache server - XAMPP OR WAMP
2. MySQL database
3. PHP version 7 or higher

__STEPS TO INSTALL__

1. create the database schema called mechanic by executing - CREATE DATABASE mechanic;
2. open your command line - command prompt or powershell on windows, terminal on Macintosh or Shell on Linux
3. migrate the database tables by typing the following command on your command line - php artisan migrate
4. seed the tags table by typing the following command on your command line - php artisan db:seed
5. run the application by typing the following command from your command line - php artisan serve
6. the application will be served on localhost:8000
7. open your browser and go to localhost:8000
