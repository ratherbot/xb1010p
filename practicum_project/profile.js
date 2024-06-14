let createButton = document.querySelector('.create-button');
let createPost = document.querySelector('.create-post-history');
let inputFiles = document.querySelector('.input-description');

createButton.onclick = function() {
    createPost.classList.add('hidden');
    inputFiles.classList.remove('hidden');
}

let closeCreatePostButton = document.querySelector('.create-close-button');

closeCreatePostButton.onclick = function() {
    createPost.classList.remove('hidden');
    inputFiles.classList.add('hidden');
}