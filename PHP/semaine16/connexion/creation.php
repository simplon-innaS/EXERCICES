<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login Mdp V2</title>
  </head>
  <body>
    <form action="creation.php" method="post">
      <div>Crée votre compte</div>
      <fieldset>
      <label for="mail">Votre adresse mail *</label>
      <input type="email" name="mail" placeholder="votremail@gmail.com"></br>
      <label for="mail">Votre mot de passe *</label>
      <input type="password" name="mdp" placeholder="motdepasse"></br>
      <label for="mail">Confirmer le mot de passe *</label>
      <input type="password" name="mdpconfirm" placeholder="motdepasse"></br>
      <label for="check">J'accepte les conditions *</label>
      <input type="checkbox" name="check"></br>
      <input type="submit" name="valider">
      <label for="tel"></label>
      </fieldset>
    </form>
    <?php
    $fichierJSON = file_get_contents("data.json");//on se ouvre le fichier json
    $data = json_decode($fichierJSON);// Récupère une chaîne encodée JSON et la convertit en une variable PHP.  avec les => ...

    if(isset($_POST['mail']) && isset($_POST['mdp']) && isset($_POST['mdpconfirm']) ){
      $mail = $_POST['mail'];
      $mdp = $_POST['mdp'];
      $mdpconfirm = $_POST['mdpconfirm'];
      $mailok = false;
      $mdpok = false;
      $checkok = false;
      if($mail == ""){
        echo 'Vous n\'avez pas rempli le champs mail</br>';
      }else{
        if(!filter_var($mail, FILTER_VALIDATE_EMAIL) || strlen($mail) <= 3){
          echo 'L\'adresse mail n\'est pas valide</br>';
          $mailok
        }
        for($i= 0; $i < count($data->users); $i++){ //count($data->user) = 2; psk le count commence par 1
          if($data->users[$i]->login == $mail){
            echo 'Un compte à déjà été crée avec cet identifiant';
            $mailok;
          }else{
            $mailok = true;
          }
        }
      }


      if($mdp && $mdpconfirm == ""){
        echo 'Champs mot de passe et/ou confirmation de mot de passe sont vident</br>';
        $mdpok;
      }else{
        if($mdp == $mdpconfirm){
          if(strlen($mdp) <= 3){
            echo 'Le mot de passe doit contenir au moins 4 caractères</br>';
            $mdpok;
          }else{
            $mdpok = true;
          }
        }else{
          echo 'Le mot de passe de confirmation et le mot de passe ne sont pareil</br>';
          $mdpok;
        }
      }

      if(empty($_POST['check'])){
        echo 'Vous devez accepté les conditions</br>';
        $checkok;
      }else{
        $checkok = true;
      }
    }
        if($mailok && $mdpok && $checkok === true){ //si tout est bon , on ajoute les donnees ds la base de donnees json


          $file = 'data.json';//on recupere le fichier json
          $contenu = json_decode(file_get_contents($file), true);//on le decode + on fait un file_get_contents pour Lire tout le fichier dans une chaîne + on ajoute le true pour preciser que les donnees seront orienté object
          $newUserId = count($contenu['users']);//ici on compte le nbr d'object present ds le tableau users
          $newUser =[ //on va placer les donness dans un nouvel objet ,on liste tt ds le bon ordre + il faut bien faire un tableau associatif pour quil le voit comme un nouvel object et non pas une nouvelle table
            "id"=>$newUserId++,
            "login"=>$mail,
            "password"=>$mdp
          ];
            array_push($contenu['users'],$newUser); //on push les elements
            file_put_contents($file, json_encode($contenu)); //on put les element puis on les encode pour bien quils soient inseree dans le fichier json
            echo 'C\'est tout bon !</br>';
            echo '<button href="index.php">Revenir à la page d\'authentification</button>';
          }
    ?>

  </body>
</html>
