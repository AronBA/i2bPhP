var c = {
    x: 100,
    y: 100,
    diameter: 50
};


function setup() {
    createCanvas(600, 400);
    background(0);
}

function draw() {
    generate();

}

function generate(){
    r = random(100,255);
    g = 0;
    b = random(100,190);
    a = 50;
    fill(r,g,b,a);
    ellipse(c.x,c.y,c.diameter,c.diameter);
    noStroke();
    c.y = random(0,400);
    c.x = random(0,600);
}
function mousePressed() {
    background(0, 0, 0);
}