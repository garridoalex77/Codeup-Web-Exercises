(function () {
'use strict';

var firstValue = document.getElementById('first_value');
var operand = document.getElementById('operand');
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

var btnDecListener = function() {
    if (!operand.value) {
        firstValue.value += ".";
    } else {
        secondValue.value += ".";
    }
}

btnDec.addEventListener('click', btnDecListener);

var btn1Listener = function() {
    if (!operand.value) {
        firstValue.value += 1;
    } else {
        secondValue.value += 1;
    }
    
}
btn1.addEventListener('click', btn1Listener);

var btn2Listener = function() {
        if (!operand.value) {
        firstValue.value += 2;
    } else {
        secondValue.value += 2;
    }
}
btn2.addEventListener('click', btn2Listener);

var btn3Listener = function() {
        if (!operand.value) {
        firstValue.value += 3;
    } else {
        secondValue.value += 3;
    }
}
btn3.addEventListener('click', btn3Listener);

var btn4Listener = function() {
        if (!operand.value) {
        firstValue.value += 4;
    } else {
        secondValue.value += 4;
    }
}
btn4.addEventListener('click', btn4Listener);

var btn5Listener = function() {
        if (!operand.value) {
        firstValue.value += 5;
    } else {
        secondValue.value += 5;
    }
}
btn5.addEventListener('click', btn5Listener);

var btn6Listener = function() {
        if (!operand.value) {
        firstValue.value += 6;
    } else {
        secondValue.value += 6;
    }
}
btn6.addEventListener('click', btn6Listener);

var btn7Listener = function() {
        if (!operand.value) {
        firstValue.value += 7;
    } else {
        secondValue.value += 7;
    }
}
btn7.addEventListener('click', btn7Listener);

var btn8Listener = function() {
        if (!operand.value) {
        firstValue.value += 8;
    } else {
        secondValue.value += 8;
    }
}
btn8.addEventListener('click', btn8Listener);

var btn9Listener = function() {
        if (!operand.value) {
        firstValue.value += 9;
    } else {
        secondValue.value += 9;
    }
}
btn9.addEventListener('click', btn9Listener);

var btn0Listener = function() {
        if (!operand.value) {
        firstValue.value += 0;
    } else {
        secondValue.value += 0;
    }
}
btn0.addEventListener('click', btn0Listener);
//Clear

var btnCListener = function() {
    firstValue.value = '';
    secondValue.value = '';
    operand.value = '';
}
btnC.addEventListener('click', btnCListener);
//Subtraction

var btnMinusListener = function() {
    operand.value = "-";
}


btnMinus.addEventListener('click', btnMinusListener);
//Addition

var btnAddListener = function() {
    operand.value = "+";
    
}
btnAdd.addEventListener('click', btnAddListener);
//Division

var btnDivListener = function() {
    operand.value = "/";
}
btnDiv.addEventListener('click', btnDivListener);
//Multiplication

var btnMultiListener = function() {
    operand.value = "*";

}
btnMulti.addEventListener('click', btnMultiListener);
//Solution

var btnSolListener = function() {


    switch (operand.value) {
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
    }
    operand.value = "";
    secondValue.value = "";
}   
btnSol.addEventListener('click', btnSolListener);


})();