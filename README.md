# paste the following commands into your terminal in order
* `git clone https://github.com/CianOToole/medCenter.git`
* `copy .env.example .env`
* `vagrant reload --provision`
## Do the next parts inside the Homestead environment in the code directory
* `composer install`
* `npm install`
* `php artisan key:generate`
* `php artisan passport:install`
## Now you need to migrate and seed the database
* `php artisan migrate --seed`
# Done!


