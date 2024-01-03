<?php

function loginUtente() {
    global $utente;
    $utente = new Utente();
    $username = getRequest('username');
    $password = getRequest('password');


    $utenti = DAOFactory::getUtenteDAO()->queryByUsername($username);
    //$utenti = DAOFactory::getUserDAO()->queryByUser($username);
    
    for ($i = 0; $i < count($utenti); $i++) {
        $utente = $utenti[$i];
        if ($utente->password == md5($password)) {
            $_SESSION['profilo'] = $utente;
            $_SESSION['profilo']->tipo = 'admin';
            //$_SESSION['profilo']->ruolo = 'ADMIN';
            //$ruolo = DAOFactory::getUserruoloDAO()->load($utente->idRuolo);
            $ruolo = DAOFactory::getRuoloDAO()->load($utente->idRuolo);
            $_SESSION['profilo']->ruolo = $ruolo->tipo;
            if (($ruolo->tipo == 'superAdmin') || ($ruolo->tipo == 'admin')) {
                $_SESSION['profilo']->tipo = 'admin';
            } else {
                $_SESSION['profilo']->tipo = 'utente';
            }

            ob_clean();
            header("location: index.php?action=applicazione");
            exit;
        }
    }

    $_SESSION["validazione"] = "Username e/o Password non corretti";
}

function logout() {
    azzeraSessione();
    ob_clean();
    header("location: index.php");
}
