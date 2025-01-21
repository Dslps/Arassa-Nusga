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
        $contacts = Contact::orderBy('created_at', 'desc')->paginate(10);

        return view('dashboard.contact', compact('contacts'));
    }

    public function show(Contact $contact)
    {
        return view('dashboard.contact_show', compact('contact'));
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('dashboard.contacts')->with('success', 'Сообщение успешно удалено.');
    }

    public function reply(Request $request)
    {
    
        $validated = $request->validate([
            'contact_id' => 'required|exists:contacts,id',
            'reply_message' => 'required|string',
        ]);

       
        $contact = Contact::findOrFail($validated['contact_id']);

     
        Mail::to($contact->email)->send(new ContactReplyMail($contact, $validated['reply_message']));

        return redirect()->route('dashboard.contacts')->with('success', 'Ответ успешно отправлен.');
    }
}
