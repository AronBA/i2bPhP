// ES6 ist die neuste Version von JavaScript
// in ES6 wird let statt var eingesetzt
let bubble1;
let bubble2;

// Den Rahmen bilden
// Aufruf des Objektes Bubble1 und Bubble2
function setup() {
    createCanvas(600, 400);
    bubble1 = new Bubble(300, 200, 40);
    bubble2 = new Bubble(360, 200, 20);
    // print(bubble1.x, bubble1.y)
}

// die draw-Funktion läuft ohne Ende immer wieder durch
function draw() {
    background(0);
    distance = dist(bubble1.x,bubble1.y,bubble2.x,bubble2.y);
    bubble1.move();
    bubble1.show();
    bubble2.move();
    bubble2.show();


    print(distance)
}

// Bildung der Klasse ---------------------------------
// Die Klasse hat 3 Konstruktoren-Argumente
class Bubble {
    constructor(tempX, tempY, tempRadius) {
        this.x = tempX;
        this.y = tempY;
        this.radius = tempRadius;
    }

    // Die Koordinaten des Kreismittelpunktes werden um einen Zufallswert jeweils verschoben
    move() {
        this.x = this.x + random(-2, 2);
        this.y = this.y + random(-2, 2);
    }

    // Der Kreis wird gezeichnet
    show() {
        if (distance <= 68){
            stroke(255,0,0);
        } else {
            stroke(255);
        }

        strokeWeight(4);
        fill(150, 120, 120);
        ellipse(this.x, this.y, this.radius * 2);

    }

} // Ende der Klasse Bubble --------------------------

