Examples how to use commands in the contaigner
Создание файла миграции
    docker-compose exec app php artisan make:migration имя_миграции
Создание и настройка миграции
    docker-compose exec app php artisan migrate
Если нужно откатить последнюю миграцию:
    docker-compose exec app php artisan migrate:rollback
Для отката всех миграций
    docker-compose exec app php artisan migrate:reset

Создание модели
    docker-compose exec app php artisan make:model имя_модели




docker-compose exec app bash
php artisan migrate
php artisan serve
composer install
npm install
...

