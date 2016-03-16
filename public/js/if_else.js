// ignore these lines for now
// just know that the variable 'color' will end up with a random value from the colors array
var colors = ['red', 'orange', 'yellow', 'green', 'blue', 'indigo', 'violet'];
var color = colors[Math.floor(Math.random()*colors.length)];

var favorite = 'red'; // TODO: change this to your favorite color from the list

var favorite = 'orange';

// TODO: Create a block of if/else statements to check for every color except indigo and violet.

var color;

if (color == "red") {
	console.log("The color is red, like a rose");
} else if (color == "orange") {
	console.log("The color is orange, like an orange");
} else if (color == "yellow") {
	console.log("The color is yellow, like a banana");
} else if (color == "green") {
	console.log("The color is green, like a leaf");
} else if (color == "blue") {
	console.log("The color is blue, like the sky");
} else {
	console.log("I do not know anything by that color");
}


// TODO: When a color is encountered log a message that tells the color, and an object of that color.
//       Example: Blue is the color of the sky.



// TODO: Have a final else that will catch indigo and violet.
// TODO: In the else, log: I do not know anything by that color.

// TODO: Using the ternary operator, conditionally log a statement that
//       says whether the random color matches your favorite color.

var color;

if (color == favorite) {
	console.log("It matches my favorite color");
} else {
	console.log("It does not match my favorite color");
}

var color = (favorite) ? "It matches my favorite color" : "It does not match my favorite color";