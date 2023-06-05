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

const ajout_doc_form = document.querySelector('#ajout_doc_form');

if(ajout_doc_form) {
    ajout_doc_form.addEventListener('submit', (event) => {
        console.log("test")

        const titre_document = document.querySelector('.titre_document');
        const description_document = document.querySelector('.description_document');
        const input_file_ajout_document = document.querySelector('#input-file-ajout-document');


    
        let isFormValid = true;
    
        if (titre_document.value.trim() === '') {
            isFormValid = false;
            document.querySelector('#span_titre').textContent = 'Le titre est obligatoire.';
        } else {
            document.querySelector('#span_titre').textContent = '';
        }
    
        if (description_document.value.trim() === '') {
            isFormValid = false;
            document.querySelector('#span_description').textContent = 'La description est obligatoire.';
        } else {
            document.querySelector('#span_description').textContent = '';
        }
        if (input_file_ajout_document.value.trim() === '') {
            console.log("after submit",input_file_ajout_document.value.trim())
            isFormValid = false;
            document.querySelector('#input-file-ajout-document').value = '';
            document.querySelector('#input-file-ajout-document').setCustomValidity('Le fichier est obligatoire.');
        } else {
            const allowedExtensions = /(\.png|\.jpg|\.jpeg|\.mp3|\.mp4)$/i;
            if (!allowedExtensions.exec(input_file_ajout_document.value)) {
                isFormValid = false;
                document.querySelector('#input-file-ajout-document').value = '';
                document.querySelector('#input-file-ajout-document').setCustomValidity('Le fichier doit être au format : .png, .jpg, .jpeg, .mp3, .mp4.');
            }
        }
    
        if (!isFormValid) {
            event.preventDefault();
            input_file_ajout_document.setCustomValidity("")

    
        }
    });
    
}




