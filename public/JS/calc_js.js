(function () {
'use strict';

var firstValue = document.getElementById('first_value');
var operator = document.getElementById('operator');
var secondValue = document.getElementById('second_value');
var btn1 = document.getElementById('btn1');
var btn2 = document.getElementById('btn2');
var btn3 = document.getElementById('btn3');
var btn4 = document.getElementById('btn4');
var btn5 = document.getElementById('btn5');
var btn6 = document.getElementById('btn6');
var btn7 = document.getElementById('btn7');
var btn8 = document.getElementById('btn8');
var btn9 = document.getElementById('btn9');
var btn0 = document.getElementById('btn0');
var btnC = document.getElementById('btnC');
var btnMinus = document.getElementById('btnMinus');
var btnAdd = document.getElementById('btnAdd');
var btnDiv = document.getElementById('btnDiv');
var btnMulti = document.getElementById('btnMulti');
var btnSol = document.getElementById('btnSol');
var btnDec = document.getElementById('btnDec');
var btnPer = document.getElementById('btnPer');

var btnDecListener = function() {
    if (!operator.value) {
        firstValue.value += ".";
    } else {
        secondValue.value += ".";
    }
}
btnDec.addEventListener('click', btnDecListener);

var btn1Listener = function() {
    if (!operator.value) {
        firstValue.value += 1;
    } else {
        secondValue.value += 1;
    }
    
}
btn1.addEventListener('click', btn1Listener);

var btn2Listener = function() {
        if (!operator.value) {
        firstValue.value += 2;
    } else {
        secondValue.value += 2;
    }
}
btn2.addEventListener('click', btn2Listener);

var btn3Listener = function() {
        if (!operator.value) {
        firstValue.value += 3;
    } else {
        secondValue.value += 3;
    }
}
btn3.addEventListener('click', btn3Listener);

var btn4Listener = function() {
        if (!operator.value) {
        firstValue.value += 4;
    } else {
        secondValue.value += 4;
    }
}
btn4.addEventListener('click', btn4Listener);

var btn5Listener = function() {
        if (!operator.value) {
        firstValue.value += 5;
    } else {
        secondValue.value += 5;
    }
}
btn5.addEventListener('click', btn5Listener);

var btn6Listener = function() {
        if (!operator.value) {
        firstValue.value += 6;
    } else {
        secondValue.value += 6;
    }
}
btn6.addEventListener('click', btn6Listener);

var btn7Listener = function() {
        if (!operator.value) {
        firstValue.value += 7;
    } else {
        secondValue.value += 7;
    }
}
btn7.addEventListener('click', btn7Listener);

var btn8Listener = function() {
        if (!operator.value) {
        firstValue.value += 8;
    } else {
        secondValue.value += 8;
    }
}
btn8.addEventListener('click', btn8Listener);

var btn9Listener = function() {
        if (!operator.value) {
        firstValue.value += 9;
    } else {
        secondValue.value += 9;
    }
}
btn9.addEventListener('click', btn9Listener);

var btn0Listener = function() {
        if (!operator.value) {
        firstValue.value += 0;
    } else {
        secondValue.value += 0;
    }
}
btn0.addEventListener('click', btn0Listener);
//Clear

var btnCListener = function() {
    switch (firstValue.value.length > 0 || secondValue.value.length > 0 || operator.value.length > 0) {
        case (secondValue.value.length > 0):
            secondValue.value = secondValue.value.substring(0, secondValue.value.length - 1);
            break;
        case (operator.value.length > 0):
            operator.value = operator.value.substring(0, operator.value.length - 1);
            break;
        case (firstValue.value.length > 0):
            firstValue.value = firstValue.value.substring(0, firstValue.value.length - 1);
            break;
    }
}
btnC.addEventListener('click', btnCListener);
//Subtraction

var btnMinusListener = function() {
    if (!firstValue.value) {
        firstValue.value += "-";
    } else if (operator.value) {
        secondValue.value = "-";
    } else operator.value = "-";

}


btnMinus.addEventListener('click', btnMinusListener);
//Addition

var btnAddListener = function() {
    operator.value = "+";
    
}
btnAdd.addEventListener('click', btnAddListener);
//Division

var btnDivListener = function() {
    operator.value = "/";
}
btnDiv.addEventListener('click', btnDivListener);
//Multiplication

var btnMultiListener = function() { 
        operator.value = "*";
}
btnMulti.addEventListener('click', btnMultiListener);
//Percentage

var btnPerListener = function() {
    operator.value = "%";
}
btnPer.addEventListener('click', btnPerListener)
//Solution

var btnSolListener = function() {


    switch (operator.value) {
        case "-":
            firstValue.value = firstValue.value - secondValue.value;
            break;
        case "+":
            firstValue.value = parseInt(firstValue.value) + parseInt(secondValue.value);
            break;
        case "/":
            firstValue.value = firstValue.value / secondValue.value;
            break;
        case "*":
            firstValue.value = firstValue.value * secondValue.value;
            break;
        case "%":
            firstValue.value = (firstValue.value / 100) * secondValue.value;
            break;
    }
    

    if (firstValue.value == "NaN") {
            operator.value = "";
            secondValue.value = "ERROR";
            firstValue.value = "ERROR"
            setTimeout(function() {
            firstValue.value = "";
        }, 1000)
    }
    secondValue.value = "";
}   
btnSol.addEventListener('click', btnSolListener);

})();

