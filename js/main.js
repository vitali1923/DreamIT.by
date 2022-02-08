var menuButton = document.querySelector ('.menu-button');
menuButton.addEventListener('click',function () {
console.log("Клик по кнопке меню");
document.querySelector(".navbar-button").classList.toggle('navbar-button--visible');
});

// Обработка формы
$(".form").validate({
    messages: {
        name: {
        required: "Введите Ваше имя",
        minlength: jQuery.validator.format("Требуется не менее 2 символов")
        },
        phone: {
            required: "Введите Ваш номер телефона",
            minlength: jQuery.validator.format("Требуется не менее 9 символов")
        },
        email:"Ваш адрес должен быть в формате name@domain.com"
    },
});
$("#phone").mask("+375(99)999-99-99");