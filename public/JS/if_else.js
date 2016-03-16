"use strict"
// ignore these lines for now
// just know that the variable 'color' will end up with a random value from the colors array
var colors = ['red', 'orange', 'yellow', 'green', 'blue', 'indigo', 'violet'];
var color = colors[Math.floor(Math.random()*colors.length)];

var favorite = 'green'; // TODO: change this to your favorite color from the list

// TODO: Create a block of if/else statements to check for every color except indigo and violet.
// TODO: When a color is encountered log a message that tells the color, and an object of that color.
//       Example: Blue is the color of the sky.
if (color == 'red') {
    console.log("the roof is red.")
} else if (color == 'orange') {
    console.log("oranges are mostly orange")
} else if (color == 'yellow') {
    console.log("flowers can be yellow")
} else if (color == 'green') {
    console.log("the grass is green sometimes")
} else if (color == 'blue') {
    console.log("the sky is blue")
} else { 
    console.log("I do not know anything by that color")
}


var favorite = (color = 'green') ? 'yes' : 'no';
console.log(favorite);

console.log(color = ('green') ? 'yes' : 'no');

 
// TODO: Have a final else that will catch indigo and violet.
// TODO: In the else, log: I do not know anything by that color.

// TODO: Using the ternary operator, conditionally log a statement that
//       says whether the random color matches your favorite color.
