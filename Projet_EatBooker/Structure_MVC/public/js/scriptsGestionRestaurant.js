var restaurantAValider = document.querySelectorAll('.rowRestoAValider');
var btnRestoAValider = document.querySelectorAll('.valider');

btnRestoAValider.forEach(elt => {
    elt.addEventListener('click', function (e) {

        // Récupération des données du resto à valider
        var item = {
            method: 'POST',
            body: JSON.stringify({
                nom_restaurant: '',
                email_restaurant: '',
                password_restaurant: '',
                adresse_restaurant: '',
                cp_restaurant: '',
                ville_restaurant: '',
                description_restaurant: '',
                place_max_restaurant: '',
                prix_restaurant: '',
                menu_restaurant: '',
                type_restaurant: '',
                note_moyenne_restaurant: '',
                id_planning: ''
            }),
            headers: {
                'Content-type': 'application/json; charset=UTF-8',
            },
        }


        // Envoi d'une requête http à l'API pour valider le resto


    })
})