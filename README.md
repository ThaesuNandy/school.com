 email - admin@gmail.com
password - admin123

fist step - > composer install
            php artisan key:generate
            php aritsan migrate:fresh
            php artisan db:seed  //to insert admin username and password into user table
            php artisan serve (http://localhost/school.com/)