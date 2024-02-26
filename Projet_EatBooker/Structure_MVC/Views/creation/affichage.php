<?php

$title = 'Mon portfolio - Création';

$id = $_GET['id'];

foreach ($list as $key => $value) {
    if ($value->id_creation == $id) {
        echo "<div id='vuePrécise'>
    <h2>$value->title</h2>
    <p id='date'>Date de publication : $value->created_at</p>
    <img src='$value->picture'>
    <p id='description'>$value->description</p>
    </div>";
    }
}
