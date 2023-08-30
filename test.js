const canvas = document.getElementById('canvas');
const ctx = canvas.getContext('2d');
canvas.width = window.innerWidth;
canvas.height = window.innerHeight;


fetch('./controllers/fight/fight_selection.php')
    .then(response => response.json())
    .then(data => {
        // Faites quelque chose avec les données reçues
    })
    .catch(error => {
        console.error('Une erreur s\'est produite :', error);
    });



const modifiedData = { /* données modifiées */ };



fetch('./controllers/fight/fight_return.php', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json'
    },
    body: JSON.stringify(modifiedData)
})
.then(response => response.json())
.then(responseData => {
    // Faites quelque chose avec la réponse de PHP
})
.catch(error => {
    console.error('Une erreur s\'est produite :', error);
});