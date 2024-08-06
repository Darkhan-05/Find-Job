<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use App\Models\VacancyResume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VacancyController extends Controller
{

    public function apply(Request $request, $vacancyId)
    {
        $user = Auth::user();

        // Проверяем, есть ли у пользователя активные резюме
        if ($user->resumes->isEmpty()) {
            return redirect()->back()->with('error', 'У вас нет резюме.');
        }

        // Проверяем, что пользователь выбрал одно резюме
        $resumeId = $request->input('resume_id');
        if (!$resumeId) {
            return redirect()->back()->with('error', 'Пожалуйста, выберите резюме.');
        }

        // Проверяем, отправлял ли пользователь резюме на эту вакансию ранее
        $existingApplication = VacancyResume::where('resume_id', $resumeId)
            ->where('vacancy_id', $vacancyId)
            ->first();

        if ($existingApplication) {
            return redirect()->back()->with('error', 'Вы уже отправили резюме на эту вакансию.');
        }

        // Создаем новую запись о подаче резюме
        $application = new VacancyResume();
        $application->vacancy_id = $vacancyId;
        $application->resume_id = $resumeId;
        $application->status = 'sented'; // Устанавливаем статус sented
        $application->save();

        return redirect()->back()->with('success', 'Ваше резюме было успешно отправлено.');
    }

    public function index()
    {
        return view('vacancies');
    }
}
