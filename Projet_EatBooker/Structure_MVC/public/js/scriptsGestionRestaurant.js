

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Logique pour l'update des resto pour les admins

function adminUpdateResto() {
    var btnRestoUpdate = document.querySelectorAll('.modifier');


    btnRestoUpdate.forEach(elt => {
        elt.addEventListener('click', function (e) {


            // Récupération des données du resto à valider
            var itemUpdate = {
                method: 'POST',
                body: JSON.stringify({
                    nom_restaurant: document.getElementById('nom_restaurant' + elt.id).value,
                    email_restaurant: document.getElementById('email_restaurant' + elt.id).value,
                    password_restaurant: document.getElementById('password_restaurant' + elt.id).value,
                    adresse_restaurant: document.getElementById('adresse_restaurant' + elt.id).value,
                    cp_restaurant: document.getElementById('cp_restaurant' + elt.id).value,
                    ville_restaurant: document.getElementById('ville_restaurant' + elt.id).value,
                    description_restaurant: document.getElementById('description_restaurant' + elt.id).value,
                    place_max_restaurant: document.getElementById('place_max_restaurant' + elt.id).value,
                    prix_restaurant: document.getElementById('prix_restaurant' + elt.id).value,
                    menu_restaurant: document.getElementById('menu_restaurant' + elt.id).value,
                    type_restaurant: document.getElementById('type_restaurant' + elt.id).value,
                    note_moyenne_restaurant: document.getElementById('note_moyenne_restaurant' + elt.id).value,
                    statut_restaurant: elt.getAttribute('data-statut'),
                    id_planning: elt.getAttribute('data-idPlanning')
                }),
                headers: {
                    'Content-type': 'application/json; charset=UTF-8',
                },
            }
            console.log(itemUpdate);

            // Envoi d'une requête http à l'API pour update le resto
            fetch(`http://application/Api_MVC/public/restaurant/update/${elt.id}`, itemUpdate)
                .then((response) => response.json())
                .then((json) => {
                    if (json.status) {
                        alert("Le restaurant a bien été mis à jour !");
                    } else {
                        alert("La mis à jour a échouer veuillez recommencer !");
                    }
                })
        })
    })
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Logique pour Delete des resto pour les admins
function adminDeleteResto() {
    var btnRestoDelete = document.querySelectorAll('.supprimer');


    btnRestoDelete.forEach(elt => {
        elt.addEventListener('click', function (e) {
            console.log(elt);
            if (confirm(`Voulez vraiment supprimer le resto ${document.getElementById('nom_restaurant' + elt.id).value} `)) {

                // Envoi d'une requête http à l'API pour update le resto
                fetch(`http://application/Api_MVC/public/restaurant/delete/${elt.id}`)
                    .then((response) => response.json())
                    .then((json) => {
                        if (json.status) {
                            if (elt.getAttribute('data-statut') == 'Valider') {
                                document.getElementById(`rowRestoValid${elt.id}`).remove();
                            } else {
                                document.getElementById(`rowRestoAValider${elt.id}`).remove();
                            }

                            alert("Le restaurant a bien été DELETE !!!!!");
                        } else {
                            alert("La suppression a échouer veuillez recommencer !");
                        }
                    })
            }
        })
    })
}

adminDeleteResto();
adminUpdateResto();


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Logique pour la validation des restaurant pour les admins
var btnRestoAValider = document.querySelectorAll('.valider');

btnRestoAValider.forEach(elt => {
    elt.addEventListener('click', function (e) {

        // Récupération des données du resto à valider
        var item = {
            method: 'POST',
            body: JSON.stringify({
                nom_restaurant: document.getElementById('nom_restaurant' + elt.id).value,
                email_restaurant: document.getElementById('email_restaurant' + elt.id).value,
                password_restaurant: document.getElementById('password_restaurant' + elt.id).value,
                adresse_restaurant: document.getElementById('adresse_restaurant' + elt.id).value,
                cp_restaurant: document.getElementById('cp_restaurant' + elt.id).value,
                ville_restaurant: document.getElementById('ville_restaurant' + elt.id).value,
                description_restaurant: document.getElementById('description_restaurant' + elt.id).value,
                place_max_restaurant: document.getElementById('place_max_restaurant' + elt.id).value,
                prix_restaurant: document.getElementById('prix_restaurant' + elt.id).value,
                menu_restaurant: document.getElementById('menu_restaurant' + elt.id).value,
                type_restaurant: document.getElementById('type_restaurant' + elt.id).value,
                note_moyenne_restaurant: document.getElementById('note_moyenne_restaurant' + elt.id).value,
                statut_restaurant: 'Valider',
                id_planning: elt.getAttribute('data-idPlanning')
            }),
            headers: {
                'Content-type': 'application/json; charset=UTF-8',
            },
        }

        // Envoi d'une requête http à l'API pour valider le resto
        fetch(`http://application/Api_MVC/public/restaurant/update/${elt.id}`, item)
            .then((response) => response.json())
            .then((json) => {
                itemReplace = JSON.parse(item.body);
                if (json.status) {
                    document.getElementById(`rowRestoAValider${elt.id}`).remove();
                    document.getElementById('bodyTableauRestoValid').innerHTML += `<tr class="rowRestoValid" id="rowRestoValid${elt.id}">
                    <td><input type="text" class="form-control input" value="${itemReplace.nom_restaurant}" id="nom_restaurant${elt.id}"></td>
                    <td><input type="text" class="form-control input" value="${itemReplace.email_restaurant}" id="email_restaurant${elt.id}"></td>
                    <td><input type="text" class="form-control input" value="${itemReplace.password_restaurant}" id="password_restaurant${elt.id}"></td>
                    <td><input type="text" class="form-control input" value="${itemReplace.adresse_restaurant}" id="adresse_restaurant${elt.id}"></td>
                    <td><input type="text" class="form-control input" value="${itemReplace.cp_restaurant}" id="cp_restaurant${elt.id}"></td>
                    <td><input type="text" class="form-control input" value="${itemReplace.ville_restaurant}" id="ville_restaurant"></td>
                    <td><input type="text" class="form-control input" value="${itemReplace.description_restaurant}" id="description_restaurant${elt.id}"></td>
                    <td><input type="number" class="form-control input" value="${itemReplace.place_max_restaurant}" id="place_max_restaurant${elt.id}"></td>
                    <td><input type="text" class="form-control input" value="${itemReplace.prix_restaurant}" id="prix_restaurant${elt.id}"></td>
                    <td><input type="text" class="form-control input" value="${itemReplace.menu_restaurant}" id="menu_restaurant${elt.id}"></td>
                    <td><input type="text" class="form-control input" value="${itemReplace.type_restaurant}" id="type_restaurant${elt.id}"></td>
                    <td><input type="number" class="form-control input" value="${itemReplace.note_moyenne_restaurant}" id="note_moyenne_restaurant${elt.id}"></td>
                    <td> <button class="btn btn-outline-primary modifier" id="${elt.id}" data-idPlanning="${itemReplace.id_planning}" data-statut="${itemReplace.statut_restaurant}">Update</button></td>
                    <td> <button class="btn btn-outline-danger supprimer" id="${elt.id}" data-statut="${itemReplace.statut_restaurant}">Delete</button></td>
                </tr>`
                    alert("La demande d'inscription du restaurant a bien été validé !");
                    adminDeleteResto();
                    adminUpdateResto();
                } else {
                    alert("La demande d'inscription a échouer veuillez recommencer !");
                }

            })
    })
})

