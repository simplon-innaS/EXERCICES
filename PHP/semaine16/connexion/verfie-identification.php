<?php
session_start();

$fichierJSON = file_get_contents("data.json");//on se ouvre le fichier json
$data = json_decode($fichierJSON);// Récupère une chaîne encodée JSON et la convertit en une variable PHP.  avec les => ...
if(!isset($_POST['login']) && isset($_POST['password'])){
header("index.html?error=true");// retourner dans le index.php si c'est pas tout rempli
};
$trouve;

if(isset($_POST['login']) && isset($_POST['password'])){
  for($i= 0; $i < count($data->users); $i++){ //count($data->user) = 2; psk le count commence par 1
    if($data->users[$i]->login == $_POST['login'] && $data->users[$i]->password == $_POST['password']){
      // echo "<br/>" . $data->user[$i]->login;//il va echo tt les login qui existe dans la table user
      // echo "<br/>" . $data->user[$i]->password;//il va echo tt les password qui existe dans la table user
      $trouve = true;
      break; //psk il va parcourir tt les lignes du tableau et pour eviter ceci on va mettre un break
    }else{
      $trouve = false;
    }
  };

  if($trouve === true){
    echo "Bonjour ". $data->user[$i]->name;
    } else {
    echo "Vous n'avez pas été reconnu";
  }
};
?>
