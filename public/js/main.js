const $delete = $('.delete-btn');
const $scroll = $('.scroll-link');
$delete.on('click', () => {
    confirm('削除しますか?');
});

$(window).on('load', () => {
    $('html, body').animate({ scrollTop: $('.image-gallery').offset().top }, 1500);
});

$scroll.on('click', (e) => {
    e.preventDefault();
    $('html, body').animate({ scrollTop: 0 }, 600);
});