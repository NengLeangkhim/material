// to add event on html File
// <input type="text" onkeypress="return validKHName(event)"/>

// Type KHMER Number Validatoion
function validKHNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 32 && charCode > 31 && (charCode < 6112 || charCode > 6121)) {
        return false;
    }
    return true;
}
// End Type KHMER Number Validatoion


// Type Latin Number Validatoion
function validENNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 32 && charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
// End Type Latin Number Validatoion


// Type Khmer Name Validatoion
function validKHName(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 32 && charCode > 31 && (charCode > 35) && (charCode < 6016 || charCode > 6099) && (charCode < 6112 || charCode > 6121)) {
        return false;
    }
    return true;
}
// End Type Khmer Name Validatoion


// Type Khmer text Validatoion
function validKHTxt(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 32 && (charCode < 6016 || charCode > 6154)) {
        return false;
    }
    return true;
}
// End Type Khmer text Validatoion


// Type English text Validatoion
function validENTxt(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 32 && (charCode < 33 || charCode > 126)) {
        return false;
    }
    return true;
}
// Type English text Validatoion


// Type English Name Validatoion
function validENName(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 32 && charCode > 35 && (charCode < 48 || charCode > 57) && (charCode < 65 || charCode > 90) && (charCode < 97 || charCode > 122)) {
        return false;
    }
    return true;
}
// End Type English Name Validatoion