<?php
$title = "Page Contact";

?>

<div class="contact">

    <div class="emplacement">

        <div class="un">
            <h2>
                EMPLACEMENT
            </h2>
            <div class="adresse">
                11 place Pierre Semard <br>
                49000 ANGERS
            </div>
        </div>

        <div class="deux">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2110.1403390243454!2d-0.5610275343898761!3d47.464961374805156!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x480878b8e7ba21f9%3A0xf0a4ea6efc45f0a0!2sCEFii%20-%20Ecole%20Sup%C3%A9rieure%20du%20Web!5e0!3m2!1sfr!2sfr!4v1709720621393!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

    </div>


    <div>

        <h2>FORMULAIRE DE CONTACT</h2>

        <form action="index.php?controller=user&action=traitement_contact" method="POST">

            <div>
                <input type="text" id="nom" name="nom" placeholder="Enter your forename">
            </div>

            <div>
                <input type="email" id="email" name="email" placeholder="Enter a valid email address">
            </div>

            <div>
                <input type="text" id="sujet" name="sujet" placeholder="Enter your subject">
            </div>

            <div>
                <textarea id="message" name="message" rows="4" placeholder="Enter your message" required></textarea>
            </div>

            <div class="boutons">
                <button type="submit" class="" name="soumettre">Soumettre</button>
            </div>

        </form>

    </div>

</div>