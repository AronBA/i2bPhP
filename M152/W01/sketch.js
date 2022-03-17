let myCircle;
score = 0;
timer = 1800;

function setup() {
    startscreen();
    createCanvas(600,400);
    myCircle = new Circle(random(10,500), random(10,500), 2, 2);
}

function draw() {
    d = dist(myCircle.x,myCircle.y,mouseX,mouseY)
    timer--;

    background(200);
    text(score + " Punkte", 10, 20);
    text((timer/60).toFixed() + " Sekunden", 10, 50);
    textSize(20);

    myCircle.x += myCircle.xSpeed;
    if (myCircle.x < 0 || myCircle.x > width) {
        myCircle.xSpeed *= -1;
    }

    myCircle.y += myCircle.ySpeed;
    if (myCircle.y < 0 || myCircle.y > height) {
        myCircle.ySpeed *= -1;
    }
    if (d < 50 && mouseIsPressed){
        hit();


    }
    if (timer <= 0){
        end();
    }
    fill(0);
    circle(myCircle.x, myCircle.y, 50);

}

class Circle {
    constructor(x, y, xSpeed, ySpeed) {
        this.x = x;
        this.y = y;
        this.xSpeed = xSpeed;
        this.ySpeed = ySpeed;
    }
}

function hit(){
    score++;
    circle.xSpeed++;
    circle.ySpeed++;
    myCircle.xSpeed *= -1.1;
    myCircle.ySpeed *= -1.1;
    myCircle.y = random(10,400);
    myCircle.x = random(10,400);

}
function end(){
    background(0);
    fill(255);
    textSize(50);
    text("Game Over ", 180, 80);
    textSize(20);
    fill(255);
    text("Your score was: " + score, 200, 200);
    textSize(20);
    fill(255);
    text(">>> Click to Restart <<<",200,300);
    if (mouseIsPressed){
        Timer = 1800;

    }
    noLoop();


}
function startscreen(){

}

