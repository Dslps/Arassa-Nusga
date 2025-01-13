<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Отображает список пользователей.
     */
    public function index()
    {
        // Получаем всех пользователей из базы данных
        $users = User::all();
        return view('dashboard.user', compact('users'));
    }

    /**
     * Сохраняет нового пользователя в базе данных.
     */
    public function store(Request $request)
    {
        // Валидация входящих данных
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        // Создание нового пользователя
        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        // Перенаправление обратно с сообщением об успехе
        return redirect()->back()->with('success', 'Пользователь успешно добавлен.');
    }

    /**
     * Удаляет пользователя из базы данных.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('success', 'Пользователь успешно удален.');
    }
}
