<?php

namespace App\Core;

class CSRFTokenManager
{
    // Nom de la clé de session pour stocker le jeton CSRF
    const CSRF_TOKEN_KEY = 'csrf_token';

    /**
     * Génère un nouveau jeton CSRF et le stocke en session
     */
    public static function generateCSRFToken()
    {
        // Génère un nouveau jeton CSRF
        $token = bin2hex(random_bytes(32));

        // Stocke le jeton en session
        $_SESSION[self::CSRF_TOKEN_KEY] = $token;

        // Retourne le jeton généré
        return $token;
    }

    /**
     * Vérifie si le jeton CSRF soumis correspond à celui stocké en session
     */
    public static function validateCSRFToken($submittedToken)
    {
        // Vérifie si le jeton soumis est identique à celui stocké en session
        if (isset($_SESSION[self::CSRF_TOKEN_KEY]) && $_SESSION[self::CSRF_TOKEN_KEY] === $submittedToken) {
            // Le jeton est valide, on le supprime de la session pour qu'il ne puisse être réutilisé
            unset($_SESSION[self::CSRF_TOKEN_KEY]);

            // Retourne vrai pour indiquer que la validation a réussi
            return true;
        }

        // Le jeton est invalide, on retourne faux
        return false;
    }
}
