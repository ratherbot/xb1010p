let favours = document.querySelectorAll('.fav img');

for (let favourButton of favours){
    favourButton.onclick = function() {
        favourButton.classList.toggle('added-postcard');
    }
}