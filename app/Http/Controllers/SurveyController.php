<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SurveyController extends Controller
{
    public function saveSurvey(Request $request)
    {
//        dd($request->all()) ;
        // Получение выбранной опции из тела запроса
        $selectedOption = $request->input('option');

        // Проверка и сохранение опции в базе данных или другом хранилище
        // Вам необходимо настроить соответствующую модель и механизм сохранения данных

        // Пример сохранения в базу данных
        // $survey = new Survey();
        // $survey->option = $selectedOption;
        // $survey->save();

        // Возврат успешного ответа
        return redirect('/');
    }
}
