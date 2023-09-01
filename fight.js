// document.addEventListener('DOMContentLoaded', () => {
//     const battleStart = document.querySelector('.battleStart');
//     const attackerImage = document.querySelector('.attackerHero img');
//     const defenderImage = document.querySelector('.defenderHero img');
// });

const attackerImage = document.querySelector('.attackerHero img');
const defenderImage = document.querySelector('.defenderHero img');
const battleStart = document.querySelector('.battleStart');
const hitD = document.querySelector('.hitD');
const hitA = document.querySelector('.hitA');
const battleAudio = document.querySelector('#battleAudio');
const blowAudio = document.querySelector('#blowAudio');
const cancelAudio = document.querySelector('#cancelAudio');
const selectAudio = document.querySelector('#selectAudio');
const slashAudio = document.querySelector('#slashAudio');
const victoryAudio = document.querySelector('#victoryAudio');

const slash = new Image();
slash.src = '/images/animation.png';

///////////////////////
////// FUNCTIONS //////
///////////////////////


/////////////////////
////// CLASSES //////
/////////////////////

async function fetchData() {
    try {
        const response = await fetch('./controllers/fight/fight_selection.php');
        const data = await response.json();

        class Hero {
            constructor(data) {
                this.id = data.id;
                this.name = data.name;
                this.class = data.class;
                this.level = data.level;
                this.exp = data.exp;
                this.maxExp = data.maxExp;
                this.expGiven = data.expGiven;
                this.image = data.image;
                this.description = data.description;
                this.health = data.health;
                this.energy = data.energy;
                this.stats = data.stats;
                this.turn = false;
            }
        }

        // class Animation {
        //     constructor(x, y) {
        //         this.x = x;
        //         this.y = y;
        //         this.width = 192;
        //         this.height = 192;
        //         this.frameX = 0;   
        //         this.frameY = 0;    
        //         this.minFrame = 0;
        //         this.maxFrame = 24;
        //         this.spriteWidth = 192;  
        //         this.spriteHeight = 192;
        //     }

        //     draw() {
        //         ctx.drawImage(slash, this.frameX * this.spriteWidth, this.frameY * this.spriteHeight, this.spriteWidth,
        //             this.spriteHeight, this.x, this.y, this.width, this.height);
        //     }
            
        //     update() {
        //         if (this.frameX < this.maxFrame) this.frameX++;
        //         else this.frameX = this.minFrame;
        //     }
        // }

        const attacker = new Hero(data.attacker);
        const defender = new Hero(data.defender);
        
        // let test = new Animation(canvas.width/2-116, canvas.height/2+96)

        ///////////////////////
        ////// GAME LOOP //////
        ///////////////////////

        // function animate() {            
        //     frame++;
        //     if (!battleEnd) requestAnimationFrame(animate);
        //     console.log(frame);
        // }

        function checkFirst(attacker, defender) {
            if (attacker.stats.speed > defender.stats.speed) {
                attacker.turn = true;
                defender.turn = false;
            } else if (attacker.stats.speed < defender.stats.speed) {
                defender.turn = true;
                attacker.turn = false;
            } else {
                attacker.turn = true;
                defender.turn = false;
            }
        }
        checkFirst(attacker, defender);

        battleStart.addEventListener('click', () => {
            if (attacker.turn) {
                attackerImage.style.animation = 'attackerHit 0.6s linear';
                defenderImage.style.animation = 'none';
                attacker.turn = false;
                defender.turn = true;
                hitA.style.animation = 'hit 0.3s steps(4) forwards';
                setTimeout(function() {hitA.style.animation = 'none';}, 500);
                blowAudio.play();


            } else if (defender.turn) {
                defenderImage.style.animation = 'defenderHit 0.6s linear';
                attackerImage.style.animation = 'none';
                defender.turn = false;
                attacker.turn = true;
                hitD.style.animation = 'hit 0.3s steps(4) forwards';
                setTimeout(function() {hitD.style.animation = 'none';}, 500);
                blowAudio.play();


            };
            console.log('Nouveau tour:')
            console.log(attacker.turn);
            console.log(defender.turn);
        });

        

   
    } catch (error) {
        console.error('Une erreur s\'est produite:', error);
    }
}

fetchData();

