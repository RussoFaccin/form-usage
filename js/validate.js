/*
| ============================================================
|   Inputs masks
| ============================================================
*/

var maskedInputs = document.querySelectorAll('input[data-mask]');

for (let i = 0; i<maskedInputs.length; i++) {
    let element = maskedInputs[i];
    let maskOptions = {
        mask: maskedInputs[i].dataset.mask
      };
      var mask = new IMask(element, maskOptions);
}

/*
| ============================================================
|   Form
| ============================================================
*/

// Disable automatic validation
let form = document.querySelector('form.-novalidate');
form.setAttribute('novalidate', true);

// Disable submit button
let submitButton = form.querySelector('input[type="submit"]');

// Handle form validation on submit
let formFields = form.querySelectorAll('input[validate]');

submitButton.addEventListener('click', evt => {
    evt.preventDefault();
    let isFormValidated = validateForm(formFields);
    if (isFormValidated) {
        form.submit();
    }
})

/*
| ============================================================
|   Functions
| ============================================================
*/
function validateForm(fields) {
    for (let i = 0; i < fields.length; i++) {
        let success = validateField(fields[i]);
        if (!success) {
            return false;
            break;
        }
    }
    return true;
}

function validateField(field) {
    let message = '';
    let msgElement = field.parentElement.querySelector('.m-formCadastro__fieldMessage');
    
    if (field.validity.valueMissing) {
        message = 'Campo de preenchimento obrigatório';
        msgElement.innerHTML = message;
        msgElement.classList.add('--active');
        return false;
    }

    if (field.validity.patternMismatch) {
        message = field.title;
        msgElement.innerHTML = message;
        return false;
    }
    
    //Style field
    if (field.validity.valid == false) {
        field.classList.add('--invalid');
        msgElement.classList.add('--active');
        msgElement.innerHTML = message;
    } else {
        // Sanitize input and message
        msgElement.innerHTML = '';
        field.classList.remove('--invalid');
    }

    return true;
}