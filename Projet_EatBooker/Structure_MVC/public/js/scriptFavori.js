const favoriButton = document.querySelector('#favori');
const favoriCoeur = document.querySelector('#favori_coeur');



// Écouter l'événement 'click' sur l'icône du cœur
favoriButton.addEventListener('click', function (event) {
    event.preventDefault(); // Empêcher le comportement par défaut du formulaire

    const restaurantId = favoriCoeur.dataset.restaurantId;
    const userId = favoriCoeur.dataset.userId;

    // Préparer les données à envoyer dans la requête AJAX
    const data = JSON.stringify({
        id_user: userId,
        id_restaurant: restaurantId
    });

    // Envoyer la requête AJAX ATTENTION MODIFIER LE LIEN
    fetch('http://applications/julie/projets_perso/Projet_EatBooker/EatBooker/Projet_EatBooker/Structure_MVC/public/index.php?controller=favori&action=addFavori', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: data
    })
        .then(response => {
            if (response.ok) {
                return response.json();
            } else {
                console.error("Erreur de la requête AJAX :", response);
                throw new Error('La requête AJAX a échoué.');
            }
        })
        .then(data => {


            // Ajouter la classe CSS en fonction de l'état du favori
            favoriCoeur.classList.add('favoriValide');
        })
        .catch(error => console.log(error.message));
});

