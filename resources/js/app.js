// ---------------------------------------------------------------------
// Показ якорной кнопки при скроле
document.addEventListener("DOMContentLoaded", function () {
    const scrollButton = document.getElementById("scrollButton");
    function toggleScrollButton() {
        if (window.scrollY > 400) {
            scrollButton.classList.remove("opacity-0", "invisible");
            scrollButton.classList.add("opacity-80");
        } else {
            scrollButton.classList.add("opacity-0", "invisible");
            scrollButton.classList.remove("opacity-80");
        }
    }
    window.addEventListener("scroll", toggleScrollButton);
    toggleScrollButton();
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
document.addEventListener("DOMContentLoaded", function () {
    gsap.registerPlugin(ScrollTrigger);
    gsap.from(".carousel-item", {
        x: "-100%",           
        opacity: 0,           
        duration: 1.5,        
        ease: "power2.out",    
        scrollTrigger: {
            trigger: ".carousel-item", 
            start: "top 80%",        
            toggleActions: "play none none none",
        }
    });
});

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

    const blocks = document.querySelectorAll(".header, .carousel-item, .carousel-controller, .animate-block, .animate-image, .animate-text, .animate-left, animate-bottom, animate-block-partners");
    blocks.forEach((block) => {
        observer.observe(block);
    });
});
// ---------------------------------------------------------------------
// Анимация появления блоков 
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
// скрипт для создания эффекта штор
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
// Слайдер для блока с партнерами 
document.addEventListener('DOMContentLoaded', function () {
    const customPrevButton = document.getElementById('carousel-prev-certificates');
    const customNextButton = document.getElementById('carousel-next-certificates');
    const customCarouselContent = document.getElementById('carousel-content-certificates');
    const customItems = Array.from(customCarouselContent.children);
    
    let customItemWidth = customItems[0].offsetWidth; 
    let customGap = parseInt(getComputedStyle(customCarouselContent).gap) || 0;
    let customVisibleItems = 1; 
    let customCurrentIndex = 0;

    function updateCustomCarouselPosition() {
        const customContainerWidth = customCarouselContent.parentElement.offsetWidth;
        customItemWidth = customItems[0].offsetWidth + customGap; 
        customVisibleItems = Math.floor(customContainerWidth / customItemWidth); 

        const customMaxIndex = customItems.length - customVisibleItems;
        customCurrentIndex = Math.min(customCurrentIndex, customMaxIndex);

        const customOffset = customCurrentIndex * customItemWidth; 
        customCarouselContent.style.transform = `translateX(-${customOffset}px)`; 
    }

    function updateCustomButtons() {
        customPrevButton.disabled = customCurrentIndex <= 0; 
        customNextButton.disabled = customCurrentIndex >= customItems.length - customVisibleItems; 
    }

    customNextButton.addEventListener('click', function () {
        const customMaxIndex = customItems.length - customVisibleItems; 
        if (customCurrentIndex < customMaxIndex) {
            customCurrentIndex++;
            updateCustomCarouselPosition();
            updateCustomButtons();
        }
    });

    customPrevButton.addEventListener('click', function () {
        if (customCurrentIndex > 0) {
            customCurrentIndex--;
            updateCustomCarouselPosition();
            updateCustomButtons();
        }
    });

    window.addEventListener('resize', function () {
        updateCustomCarouselPosition();
        updateCustomButtons();
    });

    updateCustomCarouselPosition();
    updateCustomButtons();
});
// ---------------------------------------------------------------------
// Кнопка показа доп проектов
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

let visibleCount = 4; // Количество видимых элементов

// Скрываем все элементы, кроме первых 4
function updateItemsDisplay() {
    items.forEach((item, index) => {
        if (index < visibleCount) {
            item.style.display = 'flex'; // Показываем элемент
        } else {
            item.style.display = 'none'; // Скрываем элемент
        }
    });
}

// Обработчик клика по кнопке
loadMoreBtn.addEventListener('click', () => {
    visibleCount += 4; // Увеличиваем количество видимых элементов на 4
    updateItemsDisplay(); // Обновляем отображение элементов

    // Если все элементы показаны, скрываем кнопку
    if (visibleCount >= items.length) {
        loadMoreBtn.style.display = 'none';
    }
});

// Инициализируем отображение элементов
updateItemsDisplay();














