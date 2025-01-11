@extends('layouts.app')
@section('content')

<div class="w-full max-w-[2000px] lg:pt-[15vh] pt-[140px] mx-auto">
    <div class=" w-full flex">
        <div class="animate-left lg:w-[800px] lg:h-[600px] h-max lg:py-0 py-5 bg-[var(--accent-color)]  flex flex-col lg:flex-row lg:items-center px-10 2xl:px-[100px] lg:px-[60px] w-full">
            <div class=" lg:hidden block text-[var(--white-color)] mb-10">
                <p class="title mb-5">Свяжитесь с нами:</p>
                <p>Ашхабад</p>
                <p>Бизнес-центр Arzuw, ул. Г. Кулиева (Объездная),Ашхабад, Туркменистан</p>
                <p>Тел: +99312754480 / +99361648605</p>
                <p>info@arassanusga.com</p>
            </div>
            <form class="w-full">
                <p class="title-2 text-white mb-5">Свяжитесь с нами:</p>
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
                    <input type="phone_number" name="username" id="username"
                        class="base-text block py-2.5 px-0 w-full text-[var(--white-color)] bg-transparent border-0 border-b-2 border-[var(--white-color)] appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-[var(--white-color)] peer"
                        placeholder=" " required />
                    <label for="phone_number"
                        class="peer-focus:font-medium absolute text-[var(--white-color)] duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-[var(--white-color)] peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Phone Number
                    </label>
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <input type="email" name="username" id="username"
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
                
                <button class=" py-3 px-10 mt-5 bg-[var(--white-color)] border-[1px] border-[var(--accent-color)] hover:bg-[var(--hover)] hover:text-[var(--white-color)] hover:border-[1px] hover:border-[var(--white-color)] duration-300 small-text">Submit</button>
            </form>
            
        </div>
        <div class="animate-bottom lg:flex w-[1120px] h-[560px] px-[50px] 2xl:px-[100px] lg:px-[60px] justify-center items-center hidden">
            <div>
                <p>Ашхабад</p>
                <p>Бизнес-центр Arzuw, ул. Г. Кулиева (Объездная),Ашхабад, Туркменистан</p>
                <p>Тел: +99312754480 / +99361648605</p>
                <p>info@arassanusga.com</p>
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