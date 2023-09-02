window.addEventListener('load', function () {
    menuAudio.volume = "0.1";
});

const menuAudio = document.querySelector('#menuAudio');
const cancelAudio = document.querySelector('#cancelAudio');
const selectAudio = document.querySelector('#selectAudio');
const slashAudio = document.querySelector('#slashAudio');

const confirmArray = document.querySelectorAll('.confirmAudio');
const cancelArray = document.querySelectorAll('.cancelAudio');

const versus = document.querySelector('.versusLink');

///////////////////
////// AUDIO //////
///////////////////

confirmArray.forEach(element => {
    element.addEventListener('click', () => {
        selectAudio.play();
    })
})

cancelArray.forEach(element => {
    element.addEventListener('click', () => {
        cancelAudio.play();
    })
})


const storageKey = 'lastTimeAudio';
// Vérifiez si le temps de lecture précédent est stocké
if (localStorage.getItem(storageKey)) {
    const lastTimeAudio = parseFloat(localStorage.getItem(storageKey));
    menuAudio.currentTime = lastTimeAudio;
}
// Ajoutez un gestionnaire d'événements pour stocker le temps de lecture actuel
menuAudio.addEventListener('timeupdate', () => {
    localStorage.setItem(storageKey, menuAudio.currentTime);
});


////////////////////
////// VERSUS //////
////////////////////

versus.addEventListener('click', () => {
    slashAudio.play();
    setTimeout(() => {
        window.location.href = './fight.php';
    }, 1000);
});