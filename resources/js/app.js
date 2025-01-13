import 'flowbite';
import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

// ---------------------------------------------------------------------
// слайдер на главной странице хедер части
$(document).ready(function () {
    // Инициализация Slick
    $('.carousel-wrapper').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 4000,
        speed: 1000,
        infinite: true,
        // dots: true,
    });
    $('.carousel-prev').click(function () {
        $('.carousel-wrapper').slick('slickPrev');
    });
    $('.carousel-next').click(function () {
        $('.carousel-wrapper').slick('slickNext');
    });
});
// ---------------------------------------------------------------------
// слайдер на главной странице
$(document).ready(function () {
    // Инициализация Slick
    $('.carousel-project').slick({
        dots: false,          
        infinite: true,      
        speed: 1000,          
        slidesToShow: 1,      
        variableWidth: true, 
        arrows: false,        
        startMode: true,   
    });
    $('.prev').click(function () {
        $('.carousel-project').slick('slickPrev');
    });
    $('.next').click(function () {
        $('.carousel-project').slick('slickNext');
    });
});

// ---------------------------------------------------------------------
$(document).ready(function () {
    // Инициализация Slick для сертификатов
    $('.carousel-certificates').slick({
        dots: false,
        infinite: true,
        speed: 1000,
        slidesToShow: 4,
        slidesToScroll: 1,
        arrows: false,
        responsive: [
            {
                breakpoint: 1280,
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                }
            },
        ]
    });

    // Кнопки управления
    $('.carousel-prev-certificates').click(function(){
        $('.carousel-certificates').slick('slickPrev');
    });

    $('.carousel-next-certificates').click(function(){
        $('.carousel-certificates').slick('slickNext');
    });
});

// ---------------------------------------------------------------------
// слайдер на наших партнеров
$(document).ready(function () {
    $('.partners').slick({
        dots: false,          
        infinite: true,
        speed: 500,     
        slidesToShow: 6,      
        slidesToScroll: 1,    
        variableWidth: false, 
        arrows: true,        
        prevArrow: $('.partners-prev'), 
        nextArrow: $('.partners-next'), 
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 4
                }
            },
            {
                breakpoint: 768, 
                settings: {
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 480, 
                settings: {
                    slidesToShow: 1
                }
            }
        ]
    });
});

// ---------------------------------------------------------------------
// появление хедера в начале прогрузки страницы
document.addEventListener("DOMContentLoaded", function () {
    gsap.registerPlugin(ScrollTrigger);
    gsap.from("header", {
        y: "-100%",            
        opacity: 0,            
        duration: 1.2,       
        ease: "power2.out",   
        scrollTrigger: {
            trigger: "header", 
            start: "top 100%",  
            toggleActions: "play none none none", 
        }
    });
});
// ---------------------------------------------------------------------
// появление слайдера на домашней странице
// document.addEventListener("DOMContentLoaded", function () {
//     gsap.registerPlugin(ScrollTrigger);
//     gsap.from(".carousel-item", {
//         x: "-100%",           
//         opacity: 0,           
//         duration: 1.5,        
//         ease: "power2.out",    
//         scrollTrigger: {
//             trigger: ".carousel-item", 
//             start: "top 80%",        
//             toggleActions: "play none none none",
//         }
//     });
// });

// ---------------------------------------------------------------------
// нижний блок управления слайдером на домашней странице
document.addEventListener("DOMContentLoaded", function () {
    gsap.registerPlugin(ScrollTrigger);
    gsap.from(".carousel-controller", {
        y: "100%",           
        opacity: 0,         
        duration: 1.5,         
        ease: "power2.out",    
        scrollTrigger: {
            trigger: ".carousel-controller", 
            start: "top 120%",              
            toggleActions: "play none none none",
        }
    });
});
// ---------------------------------------------------------------------
// позволяет отслеживать все перечисленные классы для использования анимаций на всех странницах и запускает их если они существуют
document.addEventListener("DOMContentLoaded", () => {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add("active");
                observer.unobserve(entry.target); 
            }
        });
    }, { threshold: 0.3 });

    const blocks = document.querySelectorAll(".header, .carousel-controller, .animate-block, .animate-image, .animate-text, .animate-left, animate-bottom, animate-block-partners");
    blocks.forEach((block) => {
        observer.observe(block);
    });
});
// ---------------------------------------------------------------------
// Анимация появления блоков списка услуг или оплаты
document.addEventListener("DOMContentLoaded", function () {
    gsap.registerPlugin(ScrollTrigger);
    gsap.from(".animate-block", {
        opacity: 0,           
        duration: 1,          
        stagger: 0.2,          
        ease: "power2.out",    
        delay: 0.8,           
        scrollTrigger: {
        trigger: ".animate-block",
        start: "top 80%",        
        toggleActions: "play none none none", 
        }
    });
});
// ---------------------------------------------------------------------
// эффект штор на главной странице
document.addEventListener("DOMContentLoaded", () => {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add("active");
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.5
    });
    const overlays = document.querySelectorAll(".overlay1, .overlay2, .overlay3");
    overlays.forEach((overlay) => {
        observer.observe(overlay);
    });
});
// позволяет работать эффекту при уменьшений экрана
document.addEventListener("DOMContentLoaded", () => {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            console.log(entry.target, entry.isIntersecting); 
            if (entry.isIntersecting) {
                entry.target.classList.add("active");
                observer.unobserve(entry.target); 
            }
        });
    }, {
        threshold: 0.1 
    });

    const overlays = document.querySelectorAll(".overlay1, .overlay2, .overlay3");
    overlays.forEach((overlay) => {
        observer.observe(overlay);
    });
});

// ---------------------------------------------------------------------
// появление блока о нас на главной странице
document.addEventListener("DOMContentLoaded", function () {
    gsap.registerPlugin(ScrollTrigger);

    const mm = gsap.matchMedia();
    mm.add("(min-width: 1024px)", () => {
        // Анимация изображения для больших экранов (1024px и выше)
        gsap.from(".animate-image", {
            opacity: 0,   
            duration: 1,      
            duration: 1.5,
            ease: "power2.out",
            scrollTrigger: {
                trigger: ".image-container",
                start: "top 80%",
                toggleActions: "play none none none"
            }
        });
    });

    mm.add("(max-width: 1023px)", () => {
        gsap.from(".animate-image", {
            opacity: 0,   
            duration: 1,
            ease: "power2.out",
            scrollTrigger: {
                trigger: ".image-container",
                start: "top 80%",
                toggleActions: "play none none none"
            }
        });
    });
    gsap.from(".animate-text", {
        opacity: 0,
        y: 50,
        duration: 1,
        stagger: 0.1,
        ease: "power2.out",
        scrollTrigger: {
        trigger: ".text-container",
        start: "top 80%",
        toggleActions: "play none none none"
        }
    });
});
// ---------------------------------------------------------------------
// блок реализованных проектов на главной
document.addEventListener("DOMContentLoaded", function () {
    gsap.registerPlugin(ScrollTrigger);
    gsap.from(".animate-left", {
        x: "-100%",            
        opacity: 0,            
        duration: 1,          
        ease: "power2.out",  
        scrollTrigger: {
            trigger: ".animate-left", 
            start: "top 80%",    
            toggleActions: "play none none none"
        }
    });
    gsap.from(".animate-bottom", {
        y: "100%",           
        opacity: 0,         
        duration: 1,       
        ease: "power2.out",    
        scrollTrigger: {
            trigger: ".animate-bottom", 
            start: "top 140%",         
            toggleActions: "play none none none"
        }
    });
});
// ---------------------------------------------------------------------
// Появление блоков с партнерами
document.addEventListener("DOMContentLoaded", function () {
    gsap.registerPlugin(ScrollTrigger);
    gsap.from(".animate-block-partners", {
        opacity: 0,                    
        stagger: 0.2,          
        ease: "power2.out",    
        delay: 0.2,           
        scrollTrigger: {
        trigger: ".animate-block-partners",
        start: "top 80%",        
        toggleActions: "play none none none", 
        }
    });
});
// ---------------------------------------------------------------------
// футер
document.addEventListener("DOMContentLoaded", () => {
    gsap.registerPlugin(ScrollTrigger);
    gsap.from(".footer-nav", {
        y: "50%",             
        opacity: 0,           
        duration: 1.2,         
        ease: "power2.out",   
        delay: 0.5,             
        stagger: 0.2,          
        scrollTrigger: {
            trigger: ".footer-nav", 
            start: "top 150%",      
            toggleActions: "play none none none"
        }
    });
});

// ---------------------------------------------------------------------
// Анимация появления хедера при нажатий на кнопку
const toggleButton = document.getElementById('toggle-header');
const fullHeader = document.getElementById('full-header');
const closeButton = document.getElementById('close-header');
toggleButton.addEventListener('click', () => {
    fullHeader.classList.remove('hidden');
    fullHeader.classList.add('open');       
    console.log('Header opened');
});
closeButton.addEventListener('click', () => {
    fullHeader.classList.remove('open'); 
    setTimeout(() => {
        fullHeader.classList.add('hidden');
    }, 1000);
    console.log('Header closed');
});
// ---------------------------------------------------------------------
// Кнопка показа дополнительных проектов
    document.addEventListener('DOMContentLoaded', function() {
        const loadMoreButton = document.getElementById('loadMoreButton');
        const projectItems = document.querySelectorAll('.project-item');
        let displayedItems = 6; 

        for (let i = displayedItems; i < projectItems.length; i++) {
            projectItems[i].classList.add('hidden');
        }

        loadMoreButton.addEventListener('click', function() {
            for (let i = displayedItems; i < displayedItems + 3 && i < projectItems.length; i++) {
                projectItems[i].classList.remove('hidden');
            }

            displayedItems += 3;
            if (displayedItems >= projectItems.length) {
                loadMoreButton.classList.add('hidden');
            }

            if (displayedItems < projectItems.length) {
                loadMoreButton.textContent = `Показать еще`;
            }
        });
    });
// ------------------------------открытие элементов на странице блога--------------------------------------------------
const items = document.querySelectorAll('.item');
const loadMoreBtn = document.getElementById('loadMoreBtn');

let visibleCount = 4; 
function updateItemsDisplay() {
    items.forEach((item, index) => {
        if (index < visibleCount) {
            item.style.display = 'flex';
        } else {
            item.style.display = 'none'; 
        }
    });
}
loadMoreBtn.addEventListener('click', () => {
    visibleCount += 4; 
    updateItemsDisplay();

 
    if (visibleCount >= items.length) {
        loadMoreBtn.style.display = 'none';
    }
});
updateItemsDisplay();
// ------------------------

    document.addEventListener('DOMContentLoaded', function () {
        const toggleButton = document.querySelector('[data-dropdown-toggle="dropdown-user"]');
        const dropdownMenu = document.getElementById('dropdown-user');

        toggleButton.addEventListener('click', function () {
            dropdownMenu.classList.toggle('hidden');
        });
    });















