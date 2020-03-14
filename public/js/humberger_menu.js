const $open = $('.open');
const $close = $('.close');
const $menu = $('.header-menu');

$open.on('click', () => {
    $menu.fadeIn();
    $close.fadeIn();
    $open.hide();
});

$close.on('click', () => {
    $open.fadeIn();
    $menu.hide();
    $close.hide();
});