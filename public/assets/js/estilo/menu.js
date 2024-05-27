
document.addEventListener('DOMContentLoaded', function() {
    var btn_exp = document.querySelector('#btn_exp');
    var menu_side = document.querySelector('.menu_lateral');

    btn_exp.addEventListener('click', function() {
        menu_side.classList.toggle('expandir');
    });
});