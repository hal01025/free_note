const $delete = $('.delete-btn');
const $back = $('.back-link');
const $menu_btn = $('.gallery-btn');
let count = 0;

$delete.on('click', () => {
    confirm('削除しますか?');
});

$back.on('click', (e) => {
    e.preventDefault();
    $('html, body').animate({ scrollTop: 0 }, 400);
});

function open() {
    count += 1;
    $('.side-menu').animate({
        left: '0',
    }, 600);
    
    $('.gallery-btn').animate({
        left: '242px',
    }, 600);
    
    $('.note').animate({
        left: '100px',
    }, 600);
    
    $('.tag').animate({
        left: '115px',
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
    
    $('.note').animate({
        left: '0px',
    }, 600);
    
    $('.tag').animate({
        left: '15px',
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