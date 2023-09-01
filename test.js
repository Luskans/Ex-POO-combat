const canvas = document.getElementById('canvas');
const ctx = canvas.getContext('2d');
canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

const attackerImage = document.querySelector('.attackerHero img');
const defenderImage = document.querySelector('.defenderHero img');
const battleStart = document.querySelector('.battleStart');
let frame = 0;
let battleEnd = false;
let animationStartTimeA = null;
let animationStartTimeB = null;
const slash = new Image();
slash.src = '/images/animation.png';



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
                // this.height = 310;
                // this.width = 370;
                // this.x = x;
                // this.y = y;
                this.attacking = false;
            }
        }

        const attacker = new Hero(data.attacker);
        const defender = new Hero(data.defender);
        console.log(attacker);
        console.log(defender);

        class Animation {
            constructor(x, y) {
                this.x = x;
                this.y = y;
                this.width = 192;
                this.height = 192;
                this.frameX = 0;   
                this.frameY = 0;    
                this.minFrame = 0;
                this.maxFrame = 24;
                this.spriteWidth = 192;  
                this.spriteHeight = 192;
            }

            draw() {
                ctx.drawImage(slash, this.frameX * this.spriteWidth, this.frameY * this.spriteHeight, this.spriteWidth,
                    this.spriteHeight, this.x, this.y, this.width, this.height);
            }
            
            update() {
                if (this.frameX < this.maxFrame) this.frameX++;
                else this.frameX = this.minFrame;
            }
        }
        let test = new Animation(canvas.width/2-116, canvas.height/2+96)











        function handleGame(attacker, defender) {
            // ATTACKER ////
            if (frame % (200 - (attacker.stats.speed) ** 2) === 0 && (animationStartTimeA === null || Date.now() - animationStartTimeA >= 1000)) {
                animationStartTimeA = Date.now();
                attackerImage.style.animation = 'attackerHit 1s linear';
                test.draw();
                test.update();
                
                
                
            }
        
            // Écouter l'événement animationend pour réinitialiser l'animation
            attackerImage.addEventListener('animationend', () => {
                attackerImage.style.animation = 'none';
            });
        
            if (animationStartTimeA !== null && Date.now() - animationStartTimeA >= 1000) {
                animationStartTimeA = null;
            }

            //DEFENDER ////
            if (frame % (100 - (defender.stats.speed) ** 2) === 0 && (animationStartTimeB === null || Date.now() - animationStartTimeB >= 1000)) {
                animationStartTimeB = Date.now();
                defenderImage.style.animation = 'defenderHit 1s linear';
            }
        
            // Écouter l'événement animationend pour réinitialiser l'animation
            defenderImage.addEventListener('animationend', () => {
                defenderImage.style.animation = 'none';
            });
        
            if (animationStartTimeB !== null && Date.now() - animationStartTimeB >= 1000) {
                animationStartTimeB = null;
            }
        }

      
        
        
        function animate() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            handleGame(attacker, defender);
            
            frame++;
            if (!battleEnd) requestAnimationFrame(animate); // si gameover est false faire la loop
            console.log(frame);
        }
        
        battleStart.addEventListener('click', () => {
            battleStart.style.display = 'none';
            animate();
        });














        
    } catch (error) {
        console.error('Une erreur s\'est produite:', error);
    }
}

fetchData();






