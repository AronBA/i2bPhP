function setup() {
    createCanvas(400, 400);
    background(100);
    ellipse(200,200,400)

}

function draw() {
    green = 0;
    red = 0;

    for (let i = 0; i < 4000; i++){
        if(i == 1000){
            print(green / 1000 * 4);
        }
        x = random(0,400);
        y = random(0,400);
        distance = dist(x,y,200,200)
        if (distance > 200){
            stroke(0,255,0)
            point(x,y);
            red += 1;
        } else {
            stroke(255,0,0)
            point(x,y);
            green += 1;
        }
    }
}