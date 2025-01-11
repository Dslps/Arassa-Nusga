<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Mail\ContactReplyMail;
use Illuminate\Support\Facades\Mail;

class ContactDashController extends Controller
{
    /**
     * Отображение списка контактов в панели управления.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Извлечение всех записей из таблицы contacts с пагинацией (по 10 записей на страницу)
        $contacts = Contact::orderBy('created_at', 'desc')->paginate(10);

        // Передача данных в представление
        return view('dashboard.contact', compact('contacts'));
    }

    /**
     * Отображение полного сообщения контакта.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\View\View
     */
    public function show(Contact $contact)
    {
        return view('dashboard.contact_show', compact('contact'));
    }

    /**
     * Удаление сообщения контакта.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('dashboard.contacts')->with('success', 'Сообщение успешно удалено.');
    }

    /**
     * Обработка ответа на сообщение контакта.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reply(Request $request)
    {
        // Валидация данных
        $validated = $request->validate([
            'contact_id' => 'required|exists:contacts,id',
            'reply_message' => 'required|string',
        ]);

        // Получение контакта
        $contact = Contact::findOrFail($validated['contact_id']);

        // Отправка письма пользователю
        Mail::to($contact->email)->send(new ContactReplyMail($contact, $validated['reply_message']));

        // Перенаправление назад с сообщением об успехе
        return redirect()->route('dashboard.contacts')->with('success', 'Ответ успешно отправлен.');
    }
}
