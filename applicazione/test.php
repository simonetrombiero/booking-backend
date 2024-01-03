<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once('../controller/include_dao.php');

$azienda = DAOFactory::getAziendaDAO()->load("1");
header("Content-Type: $azienda->tipoImmagine");
echo stripslashes($azienda->logo);

?>