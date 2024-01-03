<?php
if(isAdmin()){
    include_once "applicazione/homeAdmin.php";
}else{
    include_once("applicazione/homeUtente.php");
    
}

