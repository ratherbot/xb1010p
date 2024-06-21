let circles = document.querySelectorAll('.circle');

var circleIndex = 0;

for (let i = 0; i < circles.length;i++) {
    circles[i].onclick = function() {
        circleIndex = i + 1;
        for (let i = 0; i < circleIndex; i++){
            circles[i].classList.add('yellow');
        }
        for (let i = circleIndex; i < circles.length; i++){
            circles[i].classList.remove('yellow');
        }
    }
}