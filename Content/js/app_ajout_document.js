const popupToggle = document.getElementById('popup-toggle');
const popupWrapper = document.querySelector('.popup-wrapper');
const closeButton = document.querySelector('.close-button');

popupToggle.addEventListener('change', function () {
    if (this.checked) {
        popupWrapper.style.display = 'block';
    } else {
        popupWrapper.style.display = 'none';
    }
});

closeButton.addEventListener('click', function () {
    popupWrapper.style.display = 'none';
});

const popupForm = document.getElementById('popup-form');

popupForm.addEventListener('submit', function (event) {
    event.preventDefault();
    const popupInput = document.getElementById('popup-input');
    alert('Vous avez saisi: ' + popupInput.value);
    popupWrapper.style.display = 'none';
});