<?php

namespace App\Http\Controllers;

use App\Models\GlucoseMeasurement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GlucoseController extends Controller
{
//    public function index() {
//        // Получаем текущего пациента
//        $patient = Auth::user()->patient;
//        $healthData = $patient->healthData; // если hasOne
//
//        $measurements = $healthData->glucoseMeasurements()->orderByDesc('measurement_datetime')->get();
//
//        return view('patient.glucose.index', compact('measurements'));
//    }

//    public function index(Request $request) {
//        // Получаем текущего пациента и его HealthData
//        $patient = Auth::user()->patient;
//        $healthData = $patient->healthData;
//
//        if (!$healthData) {
//            return view('patient.glucose.index', ['measurements' => collect([])]);
//        }
//
//        // Начинаем построение запроса
//        $query = $healthData->glucoseMeasurements()->orderByDesc('measurement_datetime');
//
//        // Получаем параметры фильтрации из запроса
//        $startDate = $request->input('start_date');
//        $endDate   = $request->input('end_date');
//
//        // Применяем условия фильтрации при наличии дат
//        if ($startDate) {
//            $query->whereDate('measurement_datetime', '>=', $startDate);
//        }
//        if ($endDate) {
//            $query->whereDate('measurement_datetime', '<=', $endDate);
//        }
//
//        // Используем пагинацию с 8 записями на страницу
//        $measurements = $query->paginate(8)->appends($request->all());
//
//        // Передаем результаты в представление
//        return view('patient.glucose.index', compact('measurements'));
//    }

    public function index(Request $request) {
        $patient = Auth::user()->patient;
        $healthData = $patient->healthData;

        if (!$healthData) {
            return view('patient.glucose.index', ['measurements' => collect([])]);
        }

        $query = $healthData->glucoseMeasurements()->orderByDesc('measurement_datetime');

        // Получаем параметры и тип действия из запроса
        $action    = $request->input('action');
        $startDate = $request->input('start_date');
        $endDate   = $request->input('end_date');

        // Если действие "range", то применяем фильтрацию по датам
        if ($action === 'range') {
            if ($startDate) {
                $query->whereDate('measurement_datetime', '>=', $startDate);
            }
            if ($endDate) {
                $query->whereDate('measurement_datetime', '<=', $endDate);
            }
        }

        // Для действия "latest" или отсутствие фильтрации — ограничиваем до 10 записей
        if ($action === 'latest' || !$action) {
            $query->limit(8);
        }

        // Поскольку пагинация зависит от количества записей и неуместна
        // при одновременном ограничении и фильтрации, используем paginate только для диапазона.
        if ($action === 'range') {
            $measurements = $query->paginate(8)->appends($request->all());
        } else {
            $measurements = $query->get();
        }

        return view('patient.glucose.index', compact('measurements'));
    }


    public function create() {
        return view('patient.glucose.create');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'glucose_level' => 'required|numeric',
            'measurement_datetime' => 'required|date',
            'is_before_meal' => 'boolean',
            'note' => 'nullable|string|max:255',
        ]);

        $patient = Auth::user()->patient;
        $healthData = $patient->healthData;

        $data['health_data_id'] = $healthData->id;
        GlucoseMeasurement::create($data);

//        return redirect()->route('patient.glucose.index')
//            ->with('status', 'Новое измерение уровня глюкозы успешно добавлено!');
        return redirect()->route('patient.glucose.index')
            ->with('status', 'New glucose measurement successfully added!');
    }

    public function edit($id)
    {
        $patient = Auth::user()->patient;
        $healthData = $patient->healthData;
        $measurement = $healthData->glucoseMeasurements()->findOrFail($id);

        return view('patient.glucose.edit', compact('measurement'));
    }

    public function update(Request $request, $id)
    {
        $patient = Auth::user()->patient;
        $healthData = $patient->healthData;
        $measurement = $healthData->glucoseMeasurements()->findOrFail($id);

        $validatedData = $request->validate([
            'glucose_level'         => 'required|numeric|min:0',
            'measurement_datetime'  => 'required|date',
            'is_before_meal'        => 'boolean',
            'note'                  => 'nullable|string|max:255',
        ]);

        $measurement->update($validatedData);

//        return redirect()->route('patient.glucose.index')
//            ->with('status', 'Изменения успешно сохранены!');
        return redirect()->route('patient.glucose.index')
            ->with('status', 'The changes have been successfully saved!');
    }

    public function destroy($id)
    {
        // Получаем текущего пациента и его HealthData
        $patient = Auth::user()->patient;
        $healthData = $patient->healthData;

        // Находим запись по ID, убедившись, что она принадлежит текущему пациенту
        $measurement = $healthData->glucoseMeasurements()->findOrFail($id);

        // Удаляем запись
        $measurement->delete();

        // Перенаправляем обратно на страницу с измерениями и показываем сообщение об успешном удалении
//        return redirect()->route('patient.glucose.index')
//            ->with('status', 'Измерение успешно удалено!');
        return redirect()->route('patient.glucose.index')
            ->with('status', 'Measurement successfully deleted!');
    }

}
