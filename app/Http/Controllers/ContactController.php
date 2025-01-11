<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{

    public function index()
    {
        return view('contact');
    }

    public function submit(Request $request)
    {
        // Валидация данных
        $validated = $request->validate([
            'username' => 'required|string|max:100',
            'phone_number' => 'required|string|max:20',
            'email' => 'required|email|max:100',
            'message' => 'required|string',
        ]);

        // Сохранение данных в базе
        Contact::create($validated);

        // Перенаправление назад с сообщением об успехе
        return redirect()->back()->with('success', 'Ваше сообщение успешно отправлено!');
    }
}
