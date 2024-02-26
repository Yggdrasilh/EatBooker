<?php

namespace App\Controllers;

use App\Models\CreationModel;
use App\Entities\Creation;
use App\Core\Validator;

class CreationController extends Controller
{

    public function index()
    {
        $creationModel = new CreationModel();
        $list = $creationModel->findAll();
        $this->render('creation/index', ['list' => $list]);
    }

    function ajout()
    {
        $creationModel = new CreationModel();
        $messageError = '';

        if (Validator::validPostGlobal()) {

            $creation = new Creation;
            $creation->setTitle(htmlspecialchars($_POST['title'], ENT_QUOTES, 'UTF-8'));
            $creation->setDescription(htmlspecialchars($_POST['description'], ENT_QUOTES, 'UTF-8'));
            $creation->setCreated_at(htmlspecialchars($_POST['date'], ENT_QUOTES, 'UTF-8'));
            if (isset($_FILES['image']) && ($_FILES['image']['error'] == 0)) {
                move_uploaded_file($_FILES['image']['tmp_name'], 'image/' . $_FILES['image']['name']);
                $creation->setPicture('image/' . $_FILES['image']['name']);
            }

            $creationModel->create($creation);
            header("Location: index.php?controller=Creation&action=index");
        } elseif (!empty($_POST)) {
            $messageError =  "<script>
            window.onload = function() {
              alert('Veuillez renseigner tous les champs du formulaire !');
            };
          </script>";
        }
        $this->render('creation/ajout', ['messageError' => $messageError]);
    }

    function affichage()
    {
        $creationModel = new CreationModel();
        $list = $creationModel->findAll();
        $this->render('creation/affichage', ['list' => $list]);
    }

    function delate()
    {
        $id = $_GET['id'] ?? '';
        $verif = $_GET['verif'] ?? '';
        $creationModel = new CreationModel();

        if ($id != '' && $verif == true) {
            $creationModel->supp($id);
            header("Location: index.php?controller=Creation&action=index");
        } else {
            echo "<link rel='stylesheet' href='../public/style.css'>
            <div id='verifSupp'><h2>Vous êtes sur de vouloir le supprimer</h2>
            <a href='index.php?controller=Creation&action=delate&id=$id&verif=true'><button id='oui'>Oui</button></a>
            <a href='index.php?controller=Creation&action=index'><button id='non'>Non</button></a></div>";
        }
    }

    function edit()
    {

        $id = $_GET["id"] ?? '';
        $creation = new Creation;
        $creationModel = new CreationModel();
        $titre = htmlspecialchars($_POST['title'] ?? '');
        $description = htmlspecialchars($_POST['description'] ?? '');
        $date = htmlspecialchars($_POST['date'] ?? '');

        if ($titre != '' &&  $description != '' && $date != '') {
            $timestamp = time() - (30);
            if (isset($_GET['id']) && isset($_POST['token']) && $_POST['token'] == $_SESSION['token'] && $_SESSION['token_time'] >= $timestamp) {

                $creation->setTitle($titre);
                $creation->setDescription($description);
                $creation->setCreated_at($date);
                if (isset($_FILES['image']) && ($_FILES['image']['error'] == 0)) {
                    move_uploaded_file($_FILES['image']['tmp_name'], 'image/' . $_FILES['image']['name']);
                    $creation->setPicture('image/' . $_FILES['image']['name']);
                }

                $creationModel->edit($creation, $id);
                header("Location: index.php?controller=Creation&action=index");
            } else {
                echo "<h2>Erreur, les tokens ne corresponde pas ou votre session à expirer !</h2>";
            }
        } else {
            $list = $creationModel->findAll();
            /**** token ****/
            $this->generation_token();

            foreach ($list as $key => $value) {
                if ($value->id_creation == $id) {
                    $creation->setTitle($value->title);
                    $creation->setDescription($value->description);
                    $creation->setCreated_at($value->created_at);
                }
            }

            $this->render('creation/edit', ['titleArticle' => $creation->getTitle(), 'desc' => $creation->getDescription(), 'dateCreation' => $creation->getCreated_at(), 'photo' => $creation->getPicture()]);
        }
    }
}
