<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Test PHP</title>
</head>
<body>
	<h1>Boilereplate pour la battledev</h1>
	<p>Test php sur l'index : <?php echo 'Fuck yeah'; ?></p>
	<div style="background-color: rgba(76,102,178,.85); color: #fbfbfb; font-family:Consolas,Monaco,Lucida Console,Liberation Mono,DejaVu Sans Mono,Bitstream Vera Sans Mono,Courier New; font-size: 1.6em; min-height: 70vh; padding: 2em;">
		<pre>
		<?php
			// Yay fun
			$filename = "fichiers-a-recuperer/exemple-alakon.txt";
			// On se sers des jeux de données fournis par la battle dev
			$filename = "fichiers-a-recuperer/exemple-archive-battle-dev-sample/input1.txt";

			// On récupère le contenu du fichier
			$inputEnChaineDeCaracteres = file_get_contents ( $filename ); 

			// On le re-transforme en tableau afin d'avoir la même chose qu'en ligne
			$input = explode (PHP_EOL , $inputEnChaineDeCaracteres );

			// ---------------

			$debug = true;
			$debug = false; // Une fois que tout est bon, on dé-commente ici afin de masquer le debug

			// Test
			if($debug) {
				var_dump($input);
			}
			
			// Extraction du nombre de lignes
			$nbLignes = array_shift($input);
			// echo count($input); // Nb d'éléments restants
			$cpt = 0;

			// On parcourt l'ensemble du tableau
			for($i = 0 ; $i < count($input) ; $i++) {
				if($debug) {
					echo '$input[$i] : ' . $input[$i] . '<br>';
				}
				//// Création de l'algo
				// On extrait les 5 derniers caractères
				$cinqDerniersChars = substr($input[$i], -5);
				if($debug) {
					echo '$cinqDerniersChars : ' . $cinqDerniersChars . '<br>';
				}

				//// Le debug permet de vérifier concrètement les valeurs
				// ici, cela démontre que la fonction int_val pue la merde
				// 		$cinqDerniersChars : 5NZmw		// La chaine commence par un nombre donc céoké LAUL
				// 		C'est un nombre ? oui
				// 		On augmente le compteur, il est maintenant à 2
				// $cestUnNombreOuPas = intval($cinqDerniersChars) > 0;

				// https://www.google.com/search?q=php+v%C3%A9rifier+si+une+chaine+de+caract%C3%A8res+est+un+nombre
				$cestUnNombreOuPas = ctype_digit($cinqDerniersChars);

				if($debug) {
					echo 'C\'est un nombre ? ' . ($cestUnNombreOuPas ? 'oui' : 'non') . '<br>';
				}
				
				// Si c'est un nombre
				if($cestUnNombreOuPas) {
					$cpt++;

					if($debug) {
						echo 'On augmente le compteur, il est maintenant à ' . $cpt . '<br>';
					}
				}

				if($debug) {
					echo '<hr>';
				}
			}

			// éfroid $cpt
			echo $cpt; // à comparer avec "fichiers-a-recuperer/exemple-archive-battle-dev-sample/output1.txt" << le résultat attendu est 2.
		?>
		</pre>
	</div>
</body>
</html>