let hiddenBlock = document.querySelector('.registration-block');
let page = document.querySelector('.auto');
let joinButton = document.querySelector('.join-button');
let closeButton = document.querySelector('.close-button')

joinButton.onclick = function() {
    page.classList.add('body');
    page.classList.add('hidden');
    hiddenBlock.classList.remove('hidden');
    hiddenBlock.classList.add('visible');  
};

closeButton.onclick = function() {
    page.classList.remove('body');
    page.classList.remove('hidden');
    hiddenBlock.classList.remove('visible');
    hiddenBlock.classList.add('hidden');
};