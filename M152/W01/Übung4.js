var c = {
    x: 300,
    y: 200,
    diameter: 100
};


click = false;

function setup() {
    createCanvas(600, 400);

}

function draw() {
    background(153,186,221)
    if (mouseIsPressed){
        click = true;
    }

    if (click == true){
        stroke(75,104,184);
        strokeWeight(4);
        fill(153,186,221);
        ellipse(c.x,c.y,c.diameter);
        ellipse(c.x,c.y,c.diameter * 0.2);
        ellipse(c.x,c.y,c.diameter * 0.1);

        c.diameter += 5;




    }
}

function mousePressed() {
    c.y = mouseY;
    c.x = mouseX;
    c.diameter = 0;


}

