let planes = [];

let plane;
let explo;
let blo;
let weapon2;
score = 0;
speed = 1;
leben = 3;
timer = 0;
weapon = 0;
sammo = 5;


function preload() {
    plane = loadImage('img.png');
    explo = loadImage('explo.gif');
    blo = loadImage('blo.png');
    weapon2 = loadImage("weapon2.png");
    puc = loadImage('puc.jpg');
    soundFormats('mp3', 'ogg');
    gunSound = loadSound('sound');
    soundFormats('mp3', 'ogg');
    bgSound = loadSound('bg');

}

function setup() {
    cursor(CROSS);
    createCanvas(1200, 800);
    bgSound.loop(5);
}

function mousePressed() {
    gunSound.play();
    for (let i = 0; i < planes.length; i++) {
        planes[i].clicked(mouseX, mouseY,i);
    }
}



function draw() {
    timer++;
    sammo = sammo + (timer/600).toFixed(1);
    background(puc);
    textSize(30);
    text(leben + " x ♡",10,30);
    textSize(30);
    text(sammo + " x 🚀",100,30);
    if (planes.length < 7){
        for (let i = 0; i < (timer/360 + 5 * 1.2); i++) { // 10 Kreise werden gebildet
            let x = random(1200,3000);
            let y = random(0,300);
            let r = random(10, 50);
            let b = new Plane(x , y, r);
            planes.push(b);
        }
    }



    for (let i = 0; i < planes.length; i++) {
        planes[i].move(i);
        planes[i].show(i);
        planes[i].check(i);




    }

    if (weapon === 0){
        image(blo,mouseX - 150,600,300,300);
    } else if (weapon === 200 && sammo > 0){
        image(weapon2,mouseX - 150,500,300,300);
    }




}

//--------------Bubble KLASSE------------------------------------
class Plane {
    constructor(tempX, tempY, tempRadius) {
        this.x = tempX;
        this.y = tempY;
        this.hit = false;
        this.radius = tempRadius;
        this.brightness = 0; // Schwarz während der Initialisierung
    }

    clicked(px,py,i) {
        sammo--;
        let d = dist(px, py, this.x, this.y);
        if (weapon === 200){
            if (mouseY >= this.y - 50 && mouseY <= this.y + 100 && mouseX >= this.x - 50 && mouseX <= this.x + 150) {
                planes[i].hit = true;
                score++;
            }
        } else if (weapon === 0) {
            if (mouseY >= this.y && mouseY <= this.y + 50 && mouseX >= this.x && mouseX <= this.x + 100) {
                planes[i].hit = true;
                score++;
            }
        }

    }

    move(i) {
        this.x = this.x + random(0, -1 * (timer/360 + 8));

        if (planes[i].hit){
            this.y += speed * 5;
        } else {
            this.y = this.y + random(-2, 2);
        }
    }

    show(i) {

        if (planes[i].hit){
            if(weapon === 0) {
                image(explo, this.x -50 , this.y - 50, 100, 100);
            } else if (weapon === 200){
                image(explo, this.x - 150, this.y - 150, 300, 300);
            }

        } else {
            image(plane, this.x, this.y, 100, 50);
        }
    }

    check(i){
        if (leben <= 0){
            gameover();
        }

        if(this.x < -100 && this.hit === true){
            planes.splice(i,1);
        } else if (this.x < -100 && this.hit === false){
            planes.splice(i,1);
            leben -= 1;
        }
    }
}

function gameover(){
    background(0);
    fill(255);
    textSize(50);
    text("Game Over ", 180, 80);
    textSize(20);
    fill(255);
    text("Your score was: " + score, 200, 200);
}
function mouseWheel(event) {
    weapon += event.delta;
}