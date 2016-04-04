$(function() { 
"use strict";

var firstValue = $("#first_value")[0];
var operator = $("#operator")[0];
var secondValue = $("#second_value")[0];
var btnC = $("#btnC")[0];
var btnMinus = $("#btnMinus")[0];
var btnAdd = $("#btnAdd")[0];
var btnDiv = $("#btnDiv")[0];
var btnMulti = $("#btnMulti")[0];
var btnSol = $("#btnSol")[0];
var btnDec = $("#btnDec")[0];
var btnPer = $("#btnPer")[0];
var btnAc = $("#btnAc")[0];
var btnSqr = $("#btnSqr")[0];
var btnNumbers = $(".numbers");

//Decimal 
var btnDecListener = function() {
    if (firstValue.value.indexOf(".") == -1) {
        firstValue.value += ".";
    } else if (!operator.value) {
    } else if (secondValue.value.indexOf(".") == -1) {
        secondValue.value += ".";
    }    
}
btnDec.addEventListener("click", btnDecListener);
//All Numbers
    var btnNumbersListener = function() {
        var num = this.getAttribute("data-dbid");
        if (!operator.value) {
            firstValue.value += num;
        } else {
            secondValue.value += num;
        }
    }
    //missing parameters?
btnNumbers.on("click", btnNumbersListener);



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
btnC.addEventListener("click", btnCListener);

//All Clear
var btnAcListener = function() {
    firstValue.value = "";
    secondValue.value = "";
    operator.value = "";
}
btnAc.addEventListener("click", btnAcListener);

//Subtraction
var btnMinusListener = function() {
    if (!firstValue.value) {
        firstValue.value += "-";
    } else if (operator.value) {
        secondValue.value = "-";
    } else operator.value = "-";

}
btnMinus.addEventListener("click", btnMinusListener);

//Addition
var btnAddListener = function() {
    if (!firstValue.value) {
        operator.value = "";
    } else {
        operator.value = "+";
    }
    
}
btnAdd.addEventListener("click", btnAddListener);

//Division
var btnDivListener = function() {
    if (!firstValue.value) {
        operator.value = "";
    } else {
        operator.value = "/";
    }
    
}
btnDiv.addEventListener("click", btnDivListener);

//Multiplication
var btnMultiListener = function() { 
    if (!firstValue.value) {
        operator.value = "";
    } else {
        operator.value = "*";
    }
    
}
btnMulti.addEventListener("click", btnMultiListener);

//Percentage
var btnPerListener = function() {
    if (!firstValue.value) {
        operator.value = "";
    } else {
        operator.value = "%";
    }
    
}
btnPer.addEventListener("click", btnPerListener);

//Square Root
var btnSqrlistener = function() {
    if (!firstValue.value) {
        operator.value = "";
    } else {
        operator.value = "√";
    }

    firstValue.value = Math.sqrt(firstValue.value);
    operator.value = "";

    if (firstValue.value == "NaN") {
            operator.value = "";
            secondValue.value = "ERROR";
            firstValue.value = "ERROR"
            setTimeout(function() {
            firstValue.value = "";
            secondValue.value = "";
        }, 1000)
    }
    
}
btnSqr.addEventListener("click", btnSqrlistener);

//Solution
var btnSolListener = function() {


    switch (operator.value) {
        case "-":
            firstValue.value = firstValue.value - secondValue.value;
            break;
        case "+":
            firstValue.value = parseFloat(firstValue.value) + parseFloat(secondValue.value);
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
            secondValue.value = "";
        }, 1000)
    }

    if (firstValue.value == 3.14) {
        document.getElementById("header").innerHTML = "PI";
        setTimeout(function() {
        document.getElementById("header").innerHTML = "Calculator";
        }, 3000)
    }

    secondValue.value = "";
}   
btnSol.addEventListener("click", btnSolListener);

});
