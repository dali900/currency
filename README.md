# Currency dashboard


## Installation
Copy '.env.example' to '.env'

```bash
composer install
```
Create database 'currencies'
Run migration

```bash
php artisan migrate
```

Add cron job
```bash
* * * * * cd /[path to project] && php artisan CronDaily:run >> /dev/null 2>&1
```

Run server 
```bash
php artisan serve
```