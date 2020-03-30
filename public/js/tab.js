const $red = $('.tag-1');
const $green = $('.tag-2');
const $blue = $('.tag-3');
const $yellow = $('.tag-4');

const $red_note = $('.note-1');
const $green_note = $('.note-2');
const $blue_note = $('.note-3');
const $yellow_note = $('.note-4');

const $tag = $('.tag');
const $note = $('.note');

$red.on('click', () => {
    $tag.css({
        'z-index': 0,
    });
    $green.css({
        'z-index': 0,
    });
    $note.hide();
    $red_note.show();
    
    $red.css({
        'z-index': 100,
    });
});

$green.on('click', () => {
    $tag.css({
        'z-index': 0,
    });
    $note.hide();
    $green_note.show();
    
    $green.css({
        'z-index': 100,
    });
});

$blue.on('click', () => {
    $tag.css({
        'z-index': 0,
    });
    $note.hide();
    $blue_note.show();
    
    $blue.css({
        'z-index': 100,
    });
});

$yellow.on('click', () => {
    $tag.css({
        'z-index': 0,
    });
    $note.hide();
    $yellow_note.show();
    
    $yellow.css({
        'z-index': 100,
    });
});