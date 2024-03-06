
const stars = document.querySelectorAll('#star-container .star');
let selectedRating = 0;


function setRating(newRating) {
    selectedRating = newRating;
    for (let i = 0; i < stars.length; i++) {
        if (i < newRating) {
            stars[i].classList.add('active');
        } else {
            stars[i].classList.remove('active');
        }
    }
    document.getElementById('rating').value = selectedRating;

}
stars.forEach((star, index) => {
    star.addEventListener('click', () => setRating(index + 1));

});
document.getElementById('validate-rating').addEventListener('click', () => {
    // Vérifiez si une note a été sélectionnée
    if (selectedRating === 0) {
        alert('Veuillez noter le restaurant');
    } else {
        // Gérez la requête et l'envoi en base de données ici
        // Par exemple, vous pouvez envoyer la note sélectionnée à un fichier PHP ou à une API pour la traiter
        console.log('Note sélectionnée:', selectedRating);
    }
});










