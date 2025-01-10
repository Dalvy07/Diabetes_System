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


Создание контроллера
    docker-compose exec app php artisan make:controller имя_контроллера

Создание посредника
    docker-compose exec app php artisan make:middleware имя_посредника

    Вот пример кода для работы с кастомным посредником, также читай доку, там все есть.
            Route::prefix('doctor')->middleware(CheckRole::class.':doctor')->group(function () {
            // Главная страница (Dashboard)
            Route::get('/dashboard', [DoctorController::class, 'dashboard'])
                ->name('doctor.dashboard');
        });

Работа с несколькими командами подряд
docker-compose exec app bash
php artisan migrate
php artisan serve
composer install
npm install
...


---------------------------------------------------------------
TEMPORARY TEXT

use App\Http\Controllers\Patient\PatientController;
use App\Http\Controllers\Patient\ProfileController;
use App\Http\Controllers\Patient\GlucoseController;
use App\Http\Controllers\Patient\DietController;
use App\Http\Controllers\Patient\ActivityController;
use App\Http\Controllers\Patient\MedicationController;
use App\Http\Controllers\Patient\TreatmentPlanController;

// Группа маршрутов для пациента
Route::prefix('patient')
    ->middleware(['auth', 'checkRole:patient']) // checkRole:patient - ваша кастомная проверка, что пользователь пациент
    ->group(function() {
        
        // Главная страница (Dashboard)
        Route::get('/dashboard', [PatientController::class, 'dashboard'])
             ->name('patient.dashboard');

        // Профиль
        Route::get('/profile', [ProfileController::class, 'show'])
             ->name('patient.profile');
        Route::get('/profile/edit', [ProfileController::class, 'edit'])
             ->name('patient.profile.edit');
        Route::post('/profile/update', [ProfileController::class, 'update'])
             ->name('patient.profile.update');

        // Глюкоза (можно сделать resource, если хочется CRUD)
        Route::get('/glucose', [GlucoseController::class, 'index'])
             ->name('patient.glucose.index');
        Route::get('/glucose/create', [GlucoseController::class, 'create'])
             ->name('patient.glucose.create');
        Route::post('/glucose', [GlucoseController::class, 'store'])
             ->name('patient.glucose.store');
        // Можно добавить show/edit/update/delete по желанию

        // Диета
        Route::get('/diet', [DietController::class, 'index'])
             ->name('patient.diet.index');
        Route::get('/diet/create', [DietController::class, 'create'])
             ->name('patient.diet.create');
        Route::post('/diet', [DietController::class, 'store'])
             ->name('patient.diet.store');
        // и т.д.

        // Физическая активность
        Route::get('/activity', [ActivityController::class, 'index'])
             ->name('patient.activity.index');
        Route::get('/activity/create', [ActivityController::class, 'create'])
             ->name('patient.activity.create');
        Route::post('/activity', [ActivityController::class, 'store'])
             ->name('patient.activity.store');

        // Медикаменты
        Route::get('/medications', [MedicationController::class, 'index'])
             ->name('patient.medications.index');
        // ...

        // План лечения
        Route::get('/treatment-plan', [TreatmentPlanController::class, 'index'])
             ->name('patient.treatment-plan.index');
        // ...
    });

