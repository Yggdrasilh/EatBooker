document.getElementById("my-form").addEventListener("submit", function(event) {
    event.preventDefault(); // Empêche le comportement par défaut du formulaire
    var form = event.target; // Récupère le formulaire qui a déclenché l'événement

    // Crée un objet FormData pour rassembler les données du formulaire, y compris les fichiers
    var formData = new FormData(form);
    for (const [name, value] of formData.entries()) {
         console.log(name + ': ' + value);
       }
    // Envoie les données au serveur en utilisant la méthode fetch()
    fetch("index.php?controller=creation&action=add", {
        method: "POST",
        body: formData,
        headers: {
            'Content-Type': 'application/multipart/form-data'
          }
    })
    .then(response => response.text())
    .then(data => {
        console.log(data); // Affiche la réponse du serveur dans la console
    // Vous pouvez mettre à jour la vue en fonction de la réponse du serveur
    // Par exemple, si vous avez une div avec l'id "response" dans votre HTML :
    document.getElementById("response").innerHTML = "l'ajout a été effectué";
    })
    .catch(error => {
        console.error(error); // Affiche les erreurs dans la console
        // Vous pouvez afficher un message d'erreur à l'utilisateur
    // Par exemple, si vous avez une div avec l'id "error" dans votre HTML :
    document.getElementById("error").innerHTML = "Une erreur s'est produite : " + error.message;
    });
});
