@extends('layouts.app')
@section('content')

<div class="w-full max-w-[2000px] lg:pt-[15vh] pt-[140px] mx-auto">
    <div class=" w-full flex">
        <div class="animate-left lg:w-[800px] lg:h-[600px] h-max lg:py-0 py-5 bg-[var(--accent-color)]  flex flex-col lg:flex-row lg:items-center px-10 2xl:px-[100px] lg:px-[60px] w-full">
            <div class=" lg:hidden block text-[var(--white-color)] mb-10">
                <p class="title mb-5">{{ __('messages.contact_title') }}</p>
                <p>{{ __('messages.city') }}</p>
                <p>{{ __('messages.location_contact') }}</p>
                <p>{{ __('messages.phone') }}</p>
                <p>{{ __('messages.gmail') }}</p>
            </div>
            <form class="w-full" action="{{ route('contact.submit') }}" method="POST">
                @csrf <!-- Защита от CSRF -->
                <p class="title-2 text-white mb-5 lg:block hidden">{{ __('messages.contact_title') }}</p>
                
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="username" id="username"
                        class="base-text block py-2.5 px-0 w-full text-[var(--white-color)] bg-transparent border-0 border-b-2 border-[var(--white-color)] appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-[var(--white-color)] peer"
                        placeholder=" " required />
                    <label for="username"
                        class="peer-focus:font-medium absolute text-[var(--white-color)] duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-[var(--white-color)] peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Username
                    </label>
                </div>
            
                <div class="relative z-0 w-full mb-5 group">
                    <input type="tel" name="phone_number" id="phone_number"
                        class="base-text block py-2.5 px-0 w-full text-[var(--white-color)] bg-transparent border-0 border-b-2 border-[var(--white-color)] appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-[var(--white-color)] peer"
                        placeholder=" " required />
                    <label for="phone_number"
                        class="peer-focus:font-medium absolute text-[var(--white-color)] duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-[var(--white-color)] peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Phone Number
                    </label>
                </div>
            
                <div class="relative z-0 w-full mb-5 group">
                    <input type="email" name="email" id="email"
                        class="base-text block py-2.5 px-0 w-full text-[var(--white-color)] bg-transparent border-0 border-b-2 border-[var(--white-color)] appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-[var(--white-color)] peer"
                        placeholder=" " required />
                    <label for="email"
                        class="peer-focus:font-medium absolute text-[var(--white-color)] duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-[var(--white-color)] peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Email
                    </label>
                </div>
            
                <div class="relative z-0 w-full mb-5 group">
                    <textarea name="message" id="message" rows="4"
                        class="block py-2.5 px-0 w-full text-[var(--white-color)] bg-transparent border-0 border-b-2 border-[var(--support-color)] appearance-none dark:text-white dark:focus:border-[var(--white-color)] focus:outline-none focus:ring-0 focus:border-[var(--white-color)] peer resize-none overflow-y-auto max-h-[150px]"
                        placeholder=" " required></textarea>
                    <label for="message"
                        class="peer-focus:font-medium absolute text-[var(--white-color)] dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:left-auto peer-focus:text-[var(--white-color)] peer-focus:dark:text-[var(--white-color)] peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Message
                    </label>
                </div>
                
                <button type="submit" class="contact-submit">
                    <p>Отправить сообщение</p>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="13" height="13" fill="white" class="ml-[10px]">
                        <path d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l370.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128z"/>
                    </svg>
                </button>
            </form>
            
            
        </div>
        <div class="animate-bottom lg:flex w-[1120px] h-[560px] px-[50px] 2xl:px-[100px] lg:px-[60px] justify-center items-center hidden">
            <div>
                <p>{{ __('messages.city') }}</p>
                <p>{{ __('messages.location_contact') }}</p>
                <p>{{ __('messages.phone') }}</p>
                <p>{{ __('messages.gmail') }}</p>
            </div>
        </div>
    </div>
</div>
{{-- ---------------------------------карта------------------------------------- --}}
<div class="w-full max-w-[2000px] h-[800px] lg:mt-[-100px] mx-auto">
    <div class=" w-full h-full absolute z-[-10]">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1302.01354487142!2d58.42698194938376!3d37.95618010190913!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3f6fffeed40f0997%3A0xd82d39277fba113f!2z0JrQvtC80L_QsNC90LjRjyAiTG90dGEgRGlzdHJpYnV0aW9uIg!5e0!3m2!1sru!2sru!4v1733823517726!5m2!1sru!2sru" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</div>

@endsection