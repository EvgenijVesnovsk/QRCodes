$(document).ready(function(){
    //переход на главную страницу при нажатии кнопки "Отмена"
    $("#cancel").on('click', function() {
        window.location.href = "/";
    });
});