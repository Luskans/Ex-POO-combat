window.addEventListener('load', function () {
    battleAudio.volume = "0.05";
});

const attackerImage = document.querySelector('.attackerHero img');
const defenderImage = document.querySelector('.defenderHero img');
const battleStart = document.querySelector('.battleStart');

let turn;
let winner;
let battleEnd = false;
let damageNumber;
export let startFirework = false;
let healthPercentA;
let healthPercentD;
let energyPercentA;
let energyPercentD;
let expPercentA;
let expPercentD;

let arrayDatas = []; // Will receive the two instances of heroes at the end of the battle
let jsonDatas; // Will receive the json of arrayDatas

const hitD = document.querySelector('.hitD');
const hitA = document.querySelector('.hitA');
const popup = document.querySelector('.popup');
const victoryA = document.querySelector('.victoryA');
const victoryD = document.querySelector('.victoryD');
const levelUp = document.querySelectorAll('.levelUp');

const battleAudio = document.querySelector('#battleAudio');
const blowAudio = document.querySelector('#blowAudio');
const slashAudio = document.querySelector('#slashAudio');
const victoryAudio = document.querySelector('#victoryAudio');
const collapseAudio = document.querySelector('#collapseAudio');

const healthExtA = document.querySelector('.health__attacker');
const healthIntA = document.querySelector('.health__attacker div');
const healthExtA2 = document.querySelector('.health__attacker2');
const healthIntA2 = document.querySelector('.health__attacker2 div');
const energyExtA = document.querySelector('.energy__attacker');
const energyIntA = document.querySelector('.energy__attacker div');
const expExtA = document.querySelector('.exp__attacker');
const expIntA = document.querySelector('.exp__attacker div');

const healthExtD = document.querySelector('.health__defender');
const healthIntD = document.querySelector('.health__defender div');
const healthExtD2 = document.querySelector('.health__defender2');
const healthIntD2 = document.querySelector('.health__defender2 div');
const energyExtD = document.querySelector('.energy__defender');
const energyIntD = document.querySelector('.energy__defender div');
const expExtD = document.querySelector('.exp__defender');
const expIntD = document.querySelector('.exp__defender div');


/////////////////////
////// CLASSES //////
/////////////////////

async function fetchData() {
    try {;
        const response = await fetch('./controllers/fight/fight_sending.php');
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
                let random = Math.floor(Math.random() * 10) + 1;
                if (random <= this.stats.critical) {
                    damageNumber = (this.stats.attack - target.stats.defense) * 2;
                    popup.style.color = '#ffc107';
                    // popup.style.color = 'white';
                    popup.style.fontSize = '3.2rem';
                } else {
                    damageNumber = this.stats.attack - target.stats.defense;
                    // popup.style.color = '#dc3545';
                    popup.style.color = 'white'
                    popup.style.fontSize = '3rem';
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
            if (attacker.stats.speed >= defender.stats.speed) {
                attacker.turn = true;
                defender.turn = false;
            } else {
                defender.turn = true;
                attacker.turn = false;
            } 
        }
        checkFirst(attacker, defender);

        function victory() {
            battleEnd = true;
            battleAudio.pause();
            if (winner === 0) {
                defenderImage.style.animation = 'collapseD 2s linear forwards';
            } else if (winner === 1) {
                attackerImage.style.animation = 'collapseA 2s linear forwards';
            }
            collapseAudio.play();
            setTimeout(function() {
                startFirework = true;
                victoryAudio.play();
                victoryPage();
            }, 4000);
        }

        function victoryPage() {
            if (winner === 0) {
                victoryA.style.display = 'flex';
                victoryA.style.animation = 'victoryPage 1s ease-out forwards';
                updateHealthBarA2();
                updateExpBarA();
            } else if (winner === 1) {
                victoryD.style.display = 'flex';
                victoryD.style.animation = 'victoryPage 1s ease-out forwards';
                updateHealthBarD2();
                updateExpBarD();
            }
            returnDatas(attacker, defender);
        }

        // function returnDatas() {
        //     arrayDatas.push(attacker);
        //     arrayDatas.push(defender);
        //     console.log(arrayDatas);
        //     jsonDatas = JSON.stringify(arrayDatas);
        //     console.log(jsonDatas);
            
        //     fetch('./controllers/fight/fight_return.php', {
        //         method: 'POST',
        //         headers: {'Content-Type': 'application/json'},
        //         body: jsonDatas,
        //     });
        // }

        function returnDatas(attacker, defender) {
            // Crée un objet contenant les données mises à jour des héros
            const updatedData = {
                attacker: {
                    health: attacker.health,
                    energy: attacker.energy,
                    exp: attacker.exp,
                    // Autres propriétés mises à jour si nécessaire
                },
                defender: {
                    health: defender.health,
                    energy: defender.energy,
                    exp: defender.exp,
                    // Autres propriétés mises à jour si nécessaire
                }
            };
        
            // Convertit l'objet en JSON
            const jsonDatas = JSON.stringify(updatedData);

            fetch('./controllers/fight/fight_return.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: jsonDatas
            });
        }


        function updateHealthBarA() {
            healthExtA.ariaValueNow = attacker.health;
            healthPercentA = attacker.health / attacker.stats.maxHealth * 100;
            healthIntA.style.width = healthPercentA + '%';
            if (attacker.health > 0) {
                healthIntA.innerHTML = attacker.health;
            } else {
                winner = 1;
                healthIntA.innerHTML = '0';
                victory();
            }
            healthExtA.style.animation = 'shake 0.3s linear';
            setTimeout(function() {
                healthExtA.style.animation = 'none';
            }, 300);
        }

        function updateHealthBarA2() {
            attacker.health += attacker.stats.regen * 10;
            if (attacker.health >= attacker.stats.maxHealth) {
                attacker.health = attacker.stats.maxHealth;
            }
            healthExtA2.ariaValueNow = attacker.health;
            healthPercentA = attacker.health / attacker.stats.maxHealth * 100;
            healthIntA2.style.width = healthPercentA + '%';
            healthIntA2.innerHTML = attacker.health;
        }
        
        function updateEnergyBarA() {
            energyExtA.ariaValueNow = attacker.energy;
            energyPercentA = attacker.energy / attacker.stats.maxEnergy * 100;
            energyIntA.style.width = energyPercentA + '%';
            energyIntA.innerHTML = attacker.energy;
        }

        function updateExpBarA() {  
            attacker.exp += defender.expGiven;
            expPercentA = attacker.exp / attacker.maxExp * 100;
            if (attacker.exp >= attacker.maxExp) {
                let expPlus = attacker.exp - attacker.maxExp;
                attacker.exp = expPlus;
                attacker.level += 1;
                expPercentA = attacker.exp / (attacker.maxExp + 100) * 100;
                levelUp[0].style.display = 'block';
            }
            expExtA.ariaValueNow = attacker.exp;
            expIntA.style.width = expPercentA + '%';
            expIntA.innerHTML = attacker.exp;
        }
        
        function updateHealthBarD() {
            healthExtD.ariaValueNow = defender.health;
            healthPercentD = defender.health / defender.stats.maxHealth * 100;
            healthIntD.style.width = healthPercentD + '%';
            if (defender.health > 0) {
                healthIntD.innerHTML = defender.health;
            } else {
                winner = 0;
                healthIntD.innerHTML = '0';
                victory();
            }
            healthExtD.style.animation = 'shake 0.3s linear';
            setTimeout(function() {
                healthExtD.style.animation = 'none';
            }, 300);
        }

        function updateHealthBarD2() {
            defender.health += defender.stats.regen * 10;
            if (defender.health >= defender.stats.maxHealth) {
                defender.health = defender.stats.maxHealth;
            }
            healthExtD2.ariaValueNow = defender.health;
            healthPercentD = defender.health / defender.stats.maxHealth * 100;
            healthIntD2.style.width = healthPercentD + '%';
            healthIntD2.innerHTML = defender.health;
        }
        
        function updateEnergyBarD() {
            energyExtD.ariaValueNow = defender.energy;
            energyPercentD = defender.energy / defender.stats.maxEnergy * 100;
            energyIntD.style.width = energyPercentD + '%';
            energyIntD.innerHTML = defender.energy;
        }

        function updateExpBarD() {
            defender.exp += attacker.expGiven;
            expPercentD = defender.exp / defender.maxExp * 100;
            if (defender.exp >= defender.maxExp) {
                let expPlus = defender.exp - defender.maxExp;
                defender.exp = expPlus;
                defender.level += 1;
                expPercentD = defender.exp / (defender.maxExp + 100) * 100;
                levelUp[1].style.display = 'block';
            }
            expExtD.ariaValueNow = defender.exp;
            expIntD.style.width = expPercentD + '%';
            expIntD.innerHTML = defender.exp;
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
                    setTimeout(function() {
                        hitA.style.animation = 'none';
                    }, 500);
                    blowAudio.play();
                    attacker.damageTarget(defender);
                    updateHealthBarD();
                    updateEnergyBarA();
                    
                } else if (defender.turn) {
                    turn = 1;
                    popup.style.display = 'none';
                    defenderImage.style.animation = 'defenderHit 0.6s linear';
                    attackerImage.style.animation = 'none';
                    defender.turn = false;
                    attacker.turn = true;
                    hitD.style.animation = 'hit 0.3s steps(4) forwards';
                    setTimeout(function() {
                        hitD.style.animation = 'none';
                    }, 500);
                    blowAudio.play();
                    defender.damageTarget(attacker);
                    updateHealthBarA();
                    updateEnergyBarD()
                };
            }
            
        });
   
    } catch (error) {
        console.error('Une erreur s\'est produite:', error);
    }
}

fetchData();

