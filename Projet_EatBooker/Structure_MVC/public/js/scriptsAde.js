const buttonsUpdate = document.querySelectorAll('.update-button');

buttonsUpdate.forEach(button => {
    button.addEventListener('click', function (event) {
        event.preventDefault();
        var userId = this.getAttribute('data-user-id');
        modifierUtilisateur(userId);
    });
});
function modifierUtilisateur(userId) {

    const nomUser = document.getElementById('nom_user_' + userId).value;
    const prenomUser = document.getElementById('prenom_user_' + userId).value;
    const emailUser = document.getElementById('email_user_' + userId).value;
    const roleUser = document.getElementById('role_user_' + userId).value;
    console.log(userId);
    console.log(prenomUser);
    console.log(nomUser);
    console.log(emailUser);
    console.log(roleUser);

    // console.log('URL de la requête :', 'http://localhost:8888/Projet_EatBooker/Projet_EatBooker/Api_MVC/public/user/update/' + userId);

    // Envoie les données au serveur en utilisant la méthode fetch()
    fetch("http://applications/julie/projets_perso/Projet_EatBooker/EatBooker/Projet_EatBooker/Structure_MVC/public/index.php?controller=admin&action=update&id=" + userId, {
        method: 'POST',
        body: JSON.stringify({
            // les valeurs à gauche sont celles inscrites dans la base de données
            nom_user: nomUser,
            prenom_user: prenomUser,
            email_user: emailUser,
            role_user: roleUser,
        }),
        headers: {
            'Content-Type': 'application/json'
        },
        // Envoie les cookies du client avec la requête
    })

        .then(response => response.json())
        .then(data => {
            console.log(data); // Affiche la réponse du serveur dans la console
            // Vous pouvez mettre à jour la vue en fonction de la réponse du serveur
            // Par exemple, si vous avez une div avec l'id "response" dans votre HTML :
            // document.getElementById("response").innerHTML = "La modification a été effectuée";
        })
        .catch(error => {
            console.error(error); // Affiche les erreurs dans la console
            // Vous pouvez afficher un message d'erreur à l'utilisateur
            // Par exemple, si vous avez une div avec l'id "error" dans votre HTML :
            document.getElementById("error").innerHTML = "Une erreur s'est produite : " + JSON.stringify(error);
        });

}

