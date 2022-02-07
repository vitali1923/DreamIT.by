var menuButton = document.querySelector ('.menu-button');
menuButton.addEventListener('click',function () {
console.log("Клик по кнопке меню");
document.querySelector(".navbar-button").classList.toggle('navbar-button--visible');
});