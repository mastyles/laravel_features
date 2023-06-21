Instructions:

1. Create a MySQL DB with the name laravel_features which I defined in the .env file. However, you can change the name of whatever it suits
you.
2. Run the migrations afterwards: php artisan migrate, so that challenge no. 2 articles entity gets created.
3. Run npm install bootstrap if you want to view the project's css in the Bootstrap format.
4. I created login and register using ui auth. Here are it's commands:
composer require laravel/ui
php artisan ui bootstrap
php artisan ui bootstrap --auth
(5). If still something is not working, try npm install and then npm run dev.

Further info:
> According to the requirement, I created a constant UPLOAD_DIR inside app/config directory named `constants.php`.
> I also created a form in the home.blade.php view where you can either manually upload a file using input file field or you can also use
tool like POSTMAN, etc to upload the file (which is the actual requirement).

Thank you.