## How To Install

**Using Docker**\
 - `cp .env.example .env`\
 - `docker-compose build app`\
 - `docker-compose up -d`\
 - `docker-compose exec app composer install`\
 - `docker-compose exec app php artisan migrate`\
 - `docker-compose exec app php artisan db:seed`\
 - Then Access: server_domain_or_IP:8000
  
**Without Docker**\
 - `cp .env.example .env`\
 - `composer install`\
 - `php artisan migrate`\
 - `php artisan db:seed`\
 - `php artisan serve`\
 - Then Access: server_domain_or_IP:8000
