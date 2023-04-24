const popupToggle = document.getElementById('popup-toggle-button');
const popupWrapper = document.querySelector('.popup-wrapper');
const closeButton = document.querySelector('.close-button');

popupToggle.addEventListener('click', function () {
    popupWrapper.style.display = 'block';
});

closeButton.addEventListener('click', function () {
    popupWrapper.style.display = 'none';
});

const popupForm = document.getElementById('popup-form');

popupForm.addEventListener('submit', function (event) {
    // event.preventDefault();
    const popupInput = document.getElementById('popup-input');
    alert('Vous avez saisi: ' + popupInput.value);
    popupWrapper.style.display = 'none';
});
