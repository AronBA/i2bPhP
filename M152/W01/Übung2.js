var c = {
    x: 0,
    y: 200,
    diameter: 50
};
forward = true;

function setup() {
    createCanvas(600, 400);

}

function draw() {
    background(0);

    if (c.x >= 600){
        forward = false;
    }


    if (forward){
        c.x += 1;
        circle(c.x,c.y,c.diameter);
        stroke(255)
        fill(1);

    } else {
        c.x -= 1;
        circle(c.x,c.y,c.diameter);
        stroke(255)
        fill(1);



    }
}