@extends('layouts.dashboard')
@section('content')

<div class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
        <h1 class="text-2xl font-bold mb-6">Контактные Сообщения</h1>

        <!-- Отображение сообщения об успехе -->
        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        <!-- Таблица с контактными сообщениями -->
        <table class="table-auto w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-40">
                    <th class="border border-gray-300 px-4 py-2">#</th>
                    <th class="border border-gray-300 px-4 py-2">Имя</th>
                    <th class="border border-gray-300 px-4 py-2">Телефон</th>
                    <th class="border border-gray-300 px-4 py-2">Email</th>
                    <th class="border border-gray-300 px-4 py-2">Сообщение</th>
                    <th class="border border-gray-300 px-4 py-2">Написать</th>
                    <th class="border border-gray-300 px-4 py-2">Удалить</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $index => $message)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2 text-center">{{ $contacts->firstItem() + $index }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $message->username }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $message->phone_number }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $message->email }}</td>
                        <td class="border border-gray-300 px-4 py-2 max-w-[600px] overflow-x-auto">
                            {{ Str::limit($message->message, 50) }}
                        </td>
                        <td class="border border-gray-300 px-4 py-2 text-center">
                            <button class="text-orange-500 reply-button" 
                                    data-id="{{ $message->id }}" 
                                    data-username="{{ $message->username }}" 
                                    data-phone="{{ $message->phone_number }}" 
                                    data-email="{{ $message->email }}" 
                                    data-message="{{ $message->message }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="20" height="20" fill="orange">
                                        <!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                        <path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1 0 32c0 8.8 7.2 16 16 16l32 0zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"/>
                                      </svg>
                                      
                            </button>
                        </td>
                        <td class="border border-gray-300 px-4 py-2 text-center">
                            <form action="{{ route('dashboard.contacts.destroy', $message->id) }}" method="POST"
                                onsubmit="return confirm('Вы уверены, что хотите удалить эту запись?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="20" height="20" fill="red">
                                        <!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                        <path d="M135.2 17.7L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-7.2-14.3C307.4 6.8 296.3 0 284.2 0L163.8 0c-12.1 0-23.2 6.8-28.6 17.7zM416 128L32 128 53.2 467c1.6 25.3 22.6 45 47.9 45l245.8 0c25.3 0 46.3-19.7 47.9-45L416 128z"/>
                                      </svg>                                      
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                @if($contacts->isEmpty())
                    <tr>
                        <td colspan="7" class="py-4 px-4 text-center">Нет сообщений.</td>
                    </tr>
                @endif
            </tbody>
        </table>

        <!-- Пагинация -->
        <div class="mt-4">
            {{ $contacts->links() }}
        </div>
    </div>
</div>

<!-- Модальное окно для ответа -->
<div id="replyModal" class="fixed inset-0 bg-opacity-50 flex items-center justify-center hidden">
    <div class=" bg-slate-600 text-white p-6 rounded-lg shadow-lg w-1/2">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold">Ответить на сообщение</h2>
            <button id="closeModal" class="text-gray-500 hover:text-gray-700">
                <i class="fa-solid fa-times"></i>
            </button>
        </div>
        <div id="modalContent">
            <!-- Данные сообщения будут загружены сюда через JavaScript -->
            <p><strong>Имя пользователя:</strong> <span id="modalUsername"></span></p>
            <p><strong>Телефон:</strong> <span id="modalPhone"></span></p>
            <p><strong>Email:</strong> <span id="modalEmail"></span></p>
            <p><strong>Сообщение:</strong></p>
            <p id="modalMessage" class="mb-4"></p>

            <!-- Форма ответа -->
            <form id="replyForm" action="{{ route('dashboard.contacts.reply') }}" method="POST">
                @csrf
                <input type="hidden" name="contact_id" id="replyContactId">
                <div class="mb-4">
                    <label for="replyMessage" class="block">Ваш ответ:</label>
                    <textarea name="reply_message" id="replyMessage" rows="4" class="w-full p-2 border border-gray-300 rounded" required></textarea>
                </div>
                <div class="flex justify-end">
                    <button type="button" id="cancelReply" class="px-4 py-2 bg-gray-500 text-white rounded mr-2 hover:bg-gray-600">Закрыть</button>
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Отправить</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Подключение Font Awesome для иконок -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

<!-- Скрипт для управления модальным окном -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const replyButtons = document.querySelectorAll('.reply-button');
        const replyModal = document.getElementById('replyModal');
        const closeModal = document.getElementById('closeModal');
        const cancelReply = document.getElementById('cancelReply');
        const modalUsername = document.getElementById('modalUsername');
        const modalPhone = document.getElementById('modalPhone');
        const modalEmail = document.getElementById('modalEmail');
        const modalMessage = document.getElementById('modalMessage');
        const replyContactId = document.getElementById('replyContactId');

        // Открытие модального окна с данными сообщения
        replyButtons.forEach(button => {
            button.addEventListener('click', () => {
                const id = button.getAttribute('data-id');
                const username = button.getAttribute('data-username');
                const phone = button.getAttribute('data-phone');
                const email = button.getAttribute('data-email');
                const message = button.getAttribute('data-message');

                // Заполнение модального окна данными
                modalUsername.textContent = username;
                modalPhone.textContent = phone;
                modalEmail.textContent = email;
                modalMessage.textContent = message;
                replyContactId.value = id;

                // Показать модальное окно
                replyModal.classList.remove('hidden');
            });
        });

        // Закрытие модального окна
        const hideModal = () => {
            replyModal.classList.add('hidden');
            // Очистить форму ответа
            document.getElementById('replyForm').reset();
        };

        closeModal.addEventListener('click', hideModal);
        cancelReply.addEventListener('click', hideModal);

        // Закрытие модального окна при клике вне его
        window.addEventListener('click', (e) => {
            if (e.target == replyModal) {
                hideModal();
            }
        });
    });
</script>
@endsection