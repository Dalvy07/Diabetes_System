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


Пример работы с Factories на примере GlucoseMeasurementFactory
class GlucoseMeasurementFactory extends Factory
{
    protected $model = GlucoseMeasurement::class;

    public function definition()
    {
        return [
            'health_data_id'       => null, // Этот ключ нужно задать отдельно или через состояние фабрики
            'glucose_level'        => $this->faker->randomFloat(1, 3.0, 15.0),  // уровень глюкозы от 3.0 до 15.0
            'measurement_datetime' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'is_before_meal'       => $this->faker->boolean,
            'note'                 => $this->faker->sentence,
        ];
    }
}



Для создания фабрики
     docker-compose exec app php artisan make:factory GlucoseMeasurementFactory --model=GlucoseMeasurement
Работа с tinker для использования фабрики (перекидывает в терминал tinkera, потому стоит юзать docker-compose exec app bash)
     php artisan tinker
Создание записей
     // Предположим, что у вас уже есть экземпляр HealthData, например $healthData
     // И вы хотите создать 50 измерений для него:
     Сначала получаем первого пациента с помощию:
     $patient = \App\Models\Patient::first();
     // 2. Проверяем, есть ли у пациента связанный HealthData
    if (!$patient->healthData) {
        // Если HealthData отсутствует, создаём его
        $healthData = $patient->healthData()->create([
            'creation_datetime' => now(),
            'diagnosis_date'    => null, // или укажите реальную дату, если нужно
        ]);
    } else {
        // Если существует, просто получаем его
        $healthData = $patient->healthData;
    }
     А потом генерируем данные с помощью фабрики
     \App\Models\GlucoseMeasurement::factory()->count(50)->create([
     'health_data_id' => $healthData->id,
     ]);

