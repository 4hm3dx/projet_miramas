// declaration pour le premier form
const popupToggle = document.getElementById('popup-toggle-button');
const popupWrapper = document.querySelector('.popup-wrapper');
const closeButton = document.querySelector('.close-button');
const popupInput = document.getElementById('popup-input');
const spanPop = document.getElementById('spanpop');
const popupForm = document.getElementById('popup-form');
spanPop.style.color = 'red';




function validePop(event) {

    if (popupInput.value.length == 0) {
        spanPop.innerHTML = 'Veuillez saisir une catégorie';
        return false;
    } else if (popupInput.value.length < 3) {
        spanPop.innerHTML = 'Le nom est trop court';
        return false;
    } else if (popupInput.valuematch(/^[A-Za-z'-]+$/)) {
        spanPop.innerHTML = 'Nom de catégorie invalide';
        return false;
    }

    spanPop.innerHTML = '';
    return true;

}



popupToggle.addEventListener('click', function () {
    popupWrapper.style.display = 'block';
});

closeButton.addEventListener('click', function () {
    popupWrapper.style.display = 'none';
});



popupForm.addEventListener('submit', function (event) {

    // event.preventDefault();
    if (!validePop(event)) {
        event.preventDefault();
    } else {
        popupWrapper.style.display = 'none';
    }

});

// sécurisation du second form (ajout de document)
// declaration des const du second form

const form2 = document.getElementById('ajout_doc_form');
const titreDoc = document.getElementsByClassName('titre_document');
const descriptionDoc = document.getElementsByClassName('description_document');
const fileInput = document.getElementById('input-file-ajout-document');




function valideTitre() {
}

