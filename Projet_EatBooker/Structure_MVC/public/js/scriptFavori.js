const favoriButton = document.querySelector('#favori');
const favoriCoeur = document.querySelector('#favori_coeur');

// Écouter l'événement 'click' sur l'icône du cœur
favoriButton.addEventListener('click', function (event) {
    event.preventDefault(); // Empêcher le comportement par défaut du formulaire

    const restaurantId = favoriCoeur.dataset.restaurantId; // Récupérer l'ID du restaurant à partir de l'attribut de données
    const userId = favoriCoeur.dataset.userId; // Récupérer l'ID de l'utilisateur associé à cette icône

    // Préparer les données à envoyer dans la requête AJAX
    const data = JSON.stringify({
        id_user: userId,
        id_restaurant: restaurantId
    });

    // Utiliser l'API Fetch pour envoyer la requête AJAX
    fetch('http://applications/julie/projets_perso/Projet_EatBooker/EatBooker/Projet_EatBooker/Structure_MVC/public/index.php?controller=restaurant&action=addFavori', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: data
    })
        .then(response => {
            if (response.ok) { // Vérifier si la réponse est valide
                return response.json(); // Parser la réponse en objet JSON
            } else {
                throw new Error('Une erreur s\'est produite lors de l\'ajout du restaurant aux favoris.');
            }
        })


        .then(data => {

            favoriCoeur.classList.add('favoriValide'); // Basculer la classe CSS pour changer la couleur du cœur

            console.log(favoriCoeur);

        })
        .catch(error => {
            console.log(error.message);
        });
});
