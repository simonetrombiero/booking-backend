<?php
require("class.phpmailer.php");
 
class MyMailer extends PHPMailer {

    var $From     = "noreply@vanity.it";
    var $FromName = "nome azienda";
	var $Host = 'out.postassl.it'; 
    var $Mailer   = "out";                      
	var $SMTPAuth = true; 
	var $SMTPSecure = "ssl";
	var $Username = 'noreply@vanity.it'; 
	var $Password = 'Van1t1@2023';
	var $Port = 465; 
	//var $Port = 25;	
}

?>