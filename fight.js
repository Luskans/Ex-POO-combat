// document.addEventListener('DOMContentLoaded', () => {
//     const battleStart = document.querySelector('.battleStart');
//     const attackerImage = document.querySelector('.attackerHero img');
//     const defenderImage = document.querySelector('.defenderHero img');
// });

window.addEventListener('load', function () {
    battleAudio.volume = "0.05";
});

const attackerImage = document.querySelector('.attackerHero img');
const defenderImage = document.querySelector('.defenderHero img');
const battleStart = document.querySelector('.battleStart');

let turn;
let damageNumber;
let healthPercentA;
let healthPercentD;
let energyPercentA;
let energyPercentD;
let battleEnd = false;

const hitD = document.querySelector('.hitD');
const hitA = document.querySelector('.hitA');
const popup = document.querySelector('.popup');
const popupD = document.querySelector('.popupD');
const popupA = document.querySelector('.popupA');

const battleAudio = document.querySelector('#battleAudio');
const blowAudio = document.querySelector('#blowAudio');
const cancelAudio = document.querySelector('#cancelAudio');
const selectAudio = document.querySelector('#selectAudio');
const slashAudio = document.querySelector('#slashAudio');
const victoryAudio = document.querySelector('#victoryAudio');
const collapseAudio = document.querySelector('#collapseAudio');

const healthExtA = document.querySelector('.health__attacker');
const healthIntA = document.querySelector('.health__attacker div');
const energyExtA = document.querySelector('.energy__attacker');
const energyIntA = document.querySelector('.energy__attacker div');

const healthExtD = document.querySelector('.health__defender');
const healthIntD = document.querySelector('.health__defender div');
const energyExtD = document.querySelector('.energy__defender');
const energyIntD = document.querySelector('.energy__defender div');

// let healthPercentA = attacker.health / attacker.stats.maxHealth * 100;
// let energyPercentA = attacker.energy / attacker.stats.maxEnergy * 100;
// let healthPercentD = defender.health / defender.stats.maxHealth * 100;
// let energyPercentD = defender.energy / defender.stats.maxEnergy * 100;


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

            damageTarget(target) {
                let random = Math.floor(Math.random() * 10) + 1; //random 1 - 10
                if (random <= this.stats.critical) {
                    damageNumber = (this.stats.attack - target.stats.defense) * 2;
                    popup.style.color = '#ffc107';
                    popup.style.fontSize = '2.6rem';
                } else {
                    damageNumber = this.stats.attack - target.stats.defense;
                    popup.style.color = '#dc3545';
                    popup.style.fontSize = '2.6rem';
                }
                target.health -= damageNumber;
                if (this.energy <= 8) {
                    this.energy += 2;
                }
                if (turn === 0) {
                    popup.style.left = '73%';
                } else if (turn === 1) {
                    popup.style.left = '30%';
                }
                popup.innerHTML = damageNumber;
                popup.style.display = 'block';
                popup.style.animation = 'damage 1s ease-in forwards';
                setTimeout(function() {
                    popup.style.animation = 'none';
                    popup.style.display = 'none';
                }, 1000);
            }
        }

        const attacker = new Hero(data.attacker);
        const defender = new Hero(data.defender);

        ///////////////////////
        ////// FUNCTIONS //////
        ///////////////////////

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

        function victoryA() {
            battleEnd = true;
            battleAudio.pause();
            defenderImage.style.animation = 'collapseD 2s linear forwards';
            collapseAudio.play();
            setTimeout(function() {
                victoryAudio.play();
            }, 4000);
        }

        function victoryD() {
            battleEnd = true;
            battleAudio.pause();
            attackerImage.style.animation = 'collapseA 2s linear forwards';
            collapseAudio.play();
            setTimeout(function() {
                victoryAudio.style.animation = 'none';
            }, 4000);
        }

        function updateHealthBarA() {
            healthExtA.ariaValueNow = attacker.health;
            healthPercentA = attacker.health / attacker.stats.maxHealth * 100;
            healthIntA.style.width = healthPercentA + '%';
            if (attacker.health > 0) {
                healthIntA.innerHTML = attacker.health;
            } else {
                healthIntA.innerHTML = '0';
                victoryD();
            }
            healthExtA.style.animation = 'shake 0.3s linear';
            setTimeout(function() {healthExtA.style.animation = 'none';}, 300);
        }
        
        function updateEnergyBarA() {
            energyExtA.ariaValueNow = attacker.energy;
            energyPercentA = attacker.energy / attacker.stats.maxEnergy * 100;
            energyIntA.style.width = energyPercentA + '%';
            energyIntA.innerHTML = attacker.energy;
        }
        
        function updateHealthBarD() {
            healthExtD.ariaValueNow = defender.health;
            healthPercentD = defender.health / defender.stats.maxHealth * 100;
            healthIntD.style.width = healthPercentD + '%';
            if (defender.health > 0) {
                healthIntD.innerHTML = defender.health;
            } else {
                healthIntD.innerHTML = '0';
                victoryA();
            }
            healthExtD.style.animation = 'shake 0.3s linear';
            setTimeout(function() {healthExtD.style.animation = 'none';}, 300);
        }
        
        function updateEnergyBarD() {
            energyExtD.ariaValueNow = defender.energy;
            energyPercentD = defender.energy / defender.stats.maxEnergy * 100;
            energyIntD.style.width = energyPercentD + '%';
            energyIntD.innerHTML = defender.energy;
        }

        ////// MAIN FUNCTION
        battleStart.addEventListener('click', () => {
            if (!battleEnd) {
                if (attacker.turn) {
                    turn = 0;
                    popup.style.display = 'none';
                    attackerImage.style.animation = 'attackerHit 0.6s linear';
                    defenderImage.style.animation = 'none';
                    attacker.turn = false;
                    defender.turn = true;
                    hitA.style.animation = 'hit 0.3s steps(4) forwards';
                    setTimeout(function() {hitA.style.animation = 'none';}, 500);
                    // popup.style.display = 'none';
                    blowAudio.play();
                    attacker.damageTarget(defender);
                    updateHealthBarD();
                    updateEnergyBarD();
                    
                } else if (defender.turn) {
                    turn = 1;
                    popup.style.display = 'none';
                    defenderImage.style.animation = 'defenderHit 0.6s linear';
                    attackerImage.style.animation = 'none';
                    defender.turn = false;
                    attacker.turn = true;
                    hitD.style.animation = 'hit 0.3s steps(4) forwards';
                    setTimeout(function() {hitD.style.animation = 'none';}, 500);
                    // popup.style.display = 'none';
                    blowAudio.play();
                    defender.damageTarget(attacker);
                    updateHealthBarA();
                    updateEnergyBarA()
                };
                console.log('Nouveau tour:')
                console.log(attacker.turn);
                console.log(defender.turn);
                console.log(turn);
                console.log(damageNumber);
                console.log(attacker.health + "hp Attacker");
                console.log(defender.health + "hp Defender");
                console.log(healthPercentA + '% hp');
                console.log(healthPercentD + '% hp');
            }
            
        });
   
    } catch (error) {
        console.error('Une erreur s\'est produite:', error);
    }
}

fetchData();

