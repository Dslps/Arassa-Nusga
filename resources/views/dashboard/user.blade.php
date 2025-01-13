@extends('layouts.dashboard')

@section('content')

<div class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
       
        <!-- Сообщения об успехе или ошибке -->
        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="table-auto w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-40">
                    <th class="border border-gray-300 px-4 py-2">#</th>
                    <th class="border border-gray-300 px-4 py-2">Имя</th>
                    <th class="border border-gray-300 px-4 py-2">Email</th>
                    <th class="border border-gray-300 px-4 py-2">Пароль</th>
                    <th class="border border-gray-300 px-4 py-2">Удалить</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $user->name }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $user->email }}</td>
                        <td class="border border-gray-300 px-4 py-2">********</td>
                        <td class="border border-gray-300 px-4 py-2">
                            <div class="flex justify-center">
                                <form action="{{ route('users.destroy', $user) }}" method="POST" onsubmit="return confirm('Вы уверены, что хотите удалить этого пользователя?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600">
                                        <i class="text-[20px] fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4">Нет пользователей для отображения.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="flex justify-center mt-4">
            <button id="openModalButton" class="bg-blue-500 text-white px-6 py-2 rounded shadow hover:bg-blue-600">
                + Добавить Пользователя
            </button>
        </div>

    </div>
 </div>

<!-- Модальное окно для добавления пользователя -->
<div id="userModal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden">
    <div class="bg-white p-8 rounded shadow-lg w-1/2 max-w-md">
        <h2 class="text-xl mb-4">Добавить Пользователя</h2>
        <form method="POST" action="{{ route('users.store') }}">
            @csrf
            <!-- Имя -->
            <div class="mb-4">
                <label for="name" class="block mb-1 font-semibold">Имя:</label>
                <input type="text" id="name" name="name" placeholder="Введите имя" class="border p-2 w-full" required value="{{ old('name') }}">
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block mb-1 font-semibold">Email:</label>
                <input type="email" id="email" name="email" placeholder="Введите email" class="border p-2 w-full" required value="{{ old('email') }}">
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Пароль -->
            <div class="mb-4">
                <label for="password" class="block mb-1 font-semibold">Пароль:</label>
                <input type="password" id="password" name="password" placeholder="Введите пароль" class="border p-2 w-full" required>
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Кнопки -->
            <div class="flex justify-end">
                <button type="button" id="closeModalButton" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">
                    Отмена
                </button>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                    Сохранить
                </button>
            </div>
        </form>
    </div>
</div>

<!-- JavaScript для управления модальным окном -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const openModalButton = document.getElementById('openModalButton');
        const closeModalButton = document.getElementById('closeModalButton');
        const userModal = document.getElementById('userModal');

        openModalButton.addEventListener('click', function () {
            userModal.classList.remove('hidden');
        });

        closeModalButton.addEventListener('click', function () {
            userModal.classList.add('hidden');
        });

        // Закрытие модального окна при клике вне его
        window.addEventListener('click', function (e) {
            if (e.target === userModal) {
                userModal.classList.add('hidden');
            }
        });
    });
</script>

@endsection
