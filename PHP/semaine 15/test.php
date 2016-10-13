<?php
$nom = 'Inna';
echo $nom ."\n";

$somme = 3 + 4;
echo $somme ."\n";

echo "Hello"  .$nom ."\n";

if ($somme < 10){
echo "somme < 10 \n";
}else{
	echo "somme > 10 \n";
}

$villes = ['Lyon', 'Marseile', 'Paris'];

for($i = 0 ; $i < 3; $i++){
	echo $villes[$i]."\n\n";
}

$pays = array();
array_push($pays,"France");
$pays[] = "Italie";

for($i = 0 ; $i < count($pays); $i++){
	echo $pays[$i]."\n";
}

$contacts = [
		[
			"nom" => "Dupont",
			"prenom" => "Bob",
			"mail" => "b.dupont@gmail.com"
		],
		[
			"nom" => "Petit",
			"prenom" => "jean",
			"mail" => "p.jean@gmail.com"
		]
	];
	echo $contacts[0]['nom']."\n";

	function hello($nom){
		echo 'hello'.$nom."\n";
	}
	function addition($valeur1, $valeur2){
		return $valeur1 + $valeur2 ."\n";
	}

	echo "resultat : ".addition(5,7) ."\n";

$tableaNum = [5, 7, 6, 12, 7];
echo "moyenne : ".array_sum($tableaNum)/count($tableaNum);

<?
