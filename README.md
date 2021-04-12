This is demo app
Follow following steps to setup in your system:

Step-1
======
- Take project clone :
git clone https://github.com/jayoo7/demoapp.git 

Step-2
======
- Get all the project dependencies :
composer install

Step-3
======
- Change your database configuration in config/datbase.php file
- Run migration to set all the table in database
php artisan migrate

Step-4
======
- Add all the xml file products in database
- unique products will be added
php artisan db:seed

Step-5
======
- Please visit to check edit/list of products
http://localhost/demoapp