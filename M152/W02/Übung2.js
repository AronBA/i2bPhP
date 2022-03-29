// leeres Array bilden
let bubbles = [];



// Bilden des Rahmens
function setup() {
    createCanvas(800, 400);
}

// beim Event MouseDragged (Drücken der Maus) werden diese Anweisungen ausgeführt
function mouseDragged() {
    let r = random(5, 30);
    let b = new Bubble(mouseX, mouseY, r, r); // mouseX ist die X-Koordinate des Maus-Zeigers im Rahmen
    bubbles.push(b); // Fügt es ans Ende des Arrays an
}

// Zeichnen der Objekte
function draw() {
    background(255);
    for (let i = 0; i < bubbles.length; i++) {
        bubbles[i].move();
        bubbles[i].show();
    }
}

// Bildung der Klasse ---------------------------------
// Die Klasse nimmt 3 Konstruktoren-Argumente entgegen
class Bubble {
    constructor(tempX, tempY, tempw, temph) {
        this.x = tempX;
        this.y = tempY;
        this.width = tempw;
        this.height = temph;
    }

    move() {
        this.y = this.y + random(-2, 0);
        this.x = this.x + random(-1,1);
    }

    show() {



        fill(random(0,255),random(0,255),random(0,255))
        line(this.x-15,this.y-10,this.x,this.y);
        line(this.x+15,this.y-10,this.x,this.y);

        ellipse(this.x-25,this.y+20,35,30);
        ellipse(this.x-25,this.y+40,35,30);
        ellipse(this.x+25,this.y+20,35,30);
        ellipse(this.x+25,this.y+40,35,30);
        ellipse(this.x,this.y+30,30,60);
    }
} // Ende der Klasse Bubble --------------------------


