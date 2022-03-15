


click = false;

function setup() {
    createCanvas(400, 400);

    x = random(0,400)
    y = random(0,400)
    ellipse(x,y,50);

}

function draw() {
    background(1)
    distance = dist(mouseX,mouseY,x,y);

    if (distance <= 200 && distance >= 100){
        fill(124,252,0);
        text("wärmer", mouseX,mouseY);
    }

    if (distance <= 100 && distance >= 50){
        fill(255,215,0);
        text("heiss", mouseX,mouseY);
    }
    if (distance >= 200){
        fill(100, 149, 237);
        text("kalt", mouseX,mouseY);
    }


    if (distance <= 50){
        fill(124,252,0);
        text("gefunden", mouseX,mouseY);
        fill(255);
        ellipse(x,y,50);



    }

}
function mouseClicked(){
    x = random(0,400)
    y = random(0,400)
    ellipse(x,y,50);
}





