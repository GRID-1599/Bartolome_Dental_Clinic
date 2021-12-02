function valueExist(value, array) {

    var result = false;
    for (var i = 0; i < array.length; i++) {
        var name = array[i];
        if (name == value) {
            result = true;
            break;
        }
    }

    return result;
}

function string_to_int(str) {
    str = strRemoveDashChar(str);
    strNum = '';
    for (var i = 0; i < str.length; i++) {
        strChar = str.charAt(i);
        if ($.isNumeric(strChar)) {
            strNum += strChar;
        }
    }
    return Number.parseInt(strNum);

}

function strRemoveDashChar(str) {
    if (str.includes("-")) {
        strNum = '';
        for (var i = 0; i < str.indexOf('-'); i++) {
            strChar = str.charAt(i);
            if ($.isNumeric(strChar)) {
                strNum += strChar;
            }
        }
        return strNum;
    } else {
        return str;
    }
}


function onlyNumberKey(evt) {

    // Only ASCII character in that range allowed
    var ASCIICode = (evt.which) ? evt.which : evt.keyCode
    if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
        return false;
    return true;
}

function oneDigit_to_twoDigit(digit) {
    if (digit.toString().length == 1) {
        digit = "0" + digit;
    }
    return digit;
}

function generateRandomCharacters(size) {
    var generatedOutput = '';
    var storedCharacters =
        '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    var totalCharacterSize = storedCharacters.length;
    for (var index = 0; index < size; index++) {
        generatedOutput += storedCharacters.charAt(Math.floor(Math.random() *
            totalCharacterSize));
    }
    return generatedOutput;
}


function validateEmail(email) {
    let res = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    return res.test(email);

}

function validateEmail2(emailID) {
    atpos = emailID.indexOf("@");
    dotpos = emailID.lastIndexOf(".");
    if (atpos < 1 || (dotpos - atpos < 2)) {
        return false;
    } else {
        return true;
    }
}

function capitalizeEachWord(str) {
    return str.replace(/\w\S*/g, function(txt) {
        return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
    });
}