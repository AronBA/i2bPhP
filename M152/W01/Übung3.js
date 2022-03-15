var r = {
    x: 300,
    y: 200,
    diameter: 100
};

function setup() {
    createCanvas(600, 400);


}

function draw() {
    background(0);
    rect(r.x,r.y,r.diameter);
    fill(0);
    stroke(255);
    strokeWeight(4);


    if (mouseY >= 200 && mouseY <= 300 && mouseX >= 300 && mouseX <= 400){
        fill(155,38,182);
        stroke(255)
        rect(r.x,r.y,r.diameter);
        strokeWeight(4);

    }

}