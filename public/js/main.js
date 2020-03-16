const $delete = $('.delete-btn');
const $scroll = $('.scroll-link');
const $menu_btn = $('.gallery-btn');
let count = 0;

$delete.on('click', () => {
    confirm('削除しますか?');
});

$(window).on('load', () => {
    $('html, body').animate({ scrollTop: $('.image-gallery').offset().top }, 800);
});

$('.tag').on('click', () => {
    $('html, body').animate({ scrollTop: $('.image-gallery').offset().top }, 600);
});

$scroll.on('click', (e) => {
    e.preventDefault();
    $('html, body').animate({ scrollTop: 0 }, 400);
});

$(window).on('scroll', () => {
    if($(window).scrollTop() >= 100) {
        $('.scroll').fadeIn();
    } else {
        $('.scroll').fadeOut();
    }
});

function open() {
    count += 1;
    $('.side-menu').animate({
        left: '0',
    }, 600);
    
    $('.gallery-btn').animate({
        left: '242px',
    }, 600);
};

function close() {
    count += 1;
    $('.side-menu').animate({
        left: '-300px',
    }, 600);
    
    $('.gallery-btn').animate({
        left: '-58px',
    }, 600);
};

$menu_btn.on('click', () => {
    console.log(count);
    if(count%2 === 0){
        open()
    } else {
        close()
    }
});