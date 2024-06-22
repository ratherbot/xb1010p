let hamburgerButton = document.querySelector('.hamburger-button');
let sections = document.querySelector('.sections');
let homeButton = document.querySelector('.sections-list-close-button');

hamburgerButton.onclick = function() {
    sections.classList.remove('hidden');
}

homeButton.onclick = function() {
    sections.classList.add('hidden');
}