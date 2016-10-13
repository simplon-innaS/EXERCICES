<?php
$destinataire = 'inna.sarib@gmail.com';
$nomsite = 'Mon site formulaire ajax';
// trim c'est pour enlever les espaces
//on recupere et post l'info de l'id name
$name = trim($_POST['nom']);
$numero = trim($_POST['numero']);
$message = trim($_POST['message']);
$messageMail = 'Voici les information d\'un nouvel utilisateur, Nom : ' . $name . ', Numéro: ' . $numero . ', Le message : ' . $message .'';

mail($destinataire, $nomsite, $messageMail);
?>
