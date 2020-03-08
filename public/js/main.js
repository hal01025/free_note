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
    $note.css({
        'z-index': 0,
    });
    $red_note.css({
        'z-index': 5,
    });
    $red.css({
        'z-index': 10,
    });
});

$green.on('click', () => {
    $tag.css({
        'z-index': 0,
    });
    $note.css({
        'z-index': 0,
    });
    $green_note.css({
        'z-index': 5,
    });
    $green.css({
        'z-index': 10,
    });
});

$blue.on('click', () => {
    $tag.css({
        'z-index': 0,
    });
    $note.css({
        'z-index': 0,
    });
    $blue_note.css({
        'z-index': 5,
    });
    $blue.css({
        'z-index': 10,
    });
});

$yellow.on('click', () => {
    $tag.css({
        'z-index': 0,
    });
    $note.css({
        'z-index': 0,
    });
    $yellow_note.css({
        'z-index': 5,
    });
    $yellow.css({
        'z-index': 10,
    });
});