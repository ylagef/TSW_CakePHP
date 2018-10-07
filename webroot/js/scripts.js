function toggleButton() {
    if ($(this)[0].classList.contains('btn-outline-success')) {
        $(this).removeClass("btn-outline-success");
        $(this).addClass("btn-success");
    } else {
        $(this).addClass("btn-outline-success");
        $(this).removeClass("btn-success");
    }
}