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

const inputText = document.querySelector('.input-text');
inputText.addEventListener('input', function() {
    if (this.value.length <= 10){
        inputText.classList.remove('middle-size');
        inputText.classList.remove('big-size');
    }
    if (this.value.length <= 100) {
        inputText.classList.remove('middle-size');
    }
    if (this.value.length > 10) {
        inputText.classList.add('big-size');
    }
    if (this.value.length > 100) {
        inputText.classList.add('middle-size');
    }
})