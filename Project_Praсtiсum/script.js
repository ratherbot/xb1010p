let hiddenBlock = document.querySelector('.registration-block');
let page = document.querySelector('.auto');
let loginButton = document.querySelector('.login');
let closeButton = document.querySelector('.close-button');

let sectionsListShowButton = document.querySelector('.hamburger-button');
let closeSectionsListButton = document.querySelector('.sections-list-close-button');
let sectionsList = document.querySelector('.sections');

let alreadyHaveAccountButton = document.querySelector('.already-have-acc');
let joinButton = document.querySelector('.join-button');
let regForm = document.querySelector('.registration-form');

loginButton.onclick = function() {
    page.classList.add('body');
    page.classList.add('hidden');
    hiddenBlock.classList.remove('hidden');
    hiddenBlock.classList.add('visible');  
}

closeButton.onclick = function() {
    page.classList.remove('body');
    page.classList.remove('hidden');
    hiddenBlock.classList.remove('visible');
    hiddenBlock.classList.add('hidden');
}

sectionsListShowButton.onclick = function() {
    sectionsList.classList.remove('hidden');
}

closeSectionsListButton.onclick = function() {
    sectionsList.classList.add('hidden');
}

joinButton.onclick = function() {
    page.classList.add('body');
    page.classList.add('hidden');
    regForm.classList.remove('hidden');
    regForm.classList.add('visible');
}

alreadyHaveAccountButton.onclick = function() {
    regForm.classList.remove('visible');
    regForm.classList.add('hidden');
    hiddenBlock.classList.remove('hidden');
    hiddenBlock.classList.add('visible');  
}