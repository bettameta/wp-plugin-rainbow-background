var colors = ['#ff0000', '#ffa500', '#ffff00', '#008000', '#0000ff', '#4b0082', '#ee82ee'];
var rainbow = document.getElementById('rb-rainbow');
var position = 0;
setInterval(function() {
    position++;
    if (position >= colors.length) {
        position = 0;
    }
    rainbow.style.backgroundColor = colors[position];
}, 1000);
