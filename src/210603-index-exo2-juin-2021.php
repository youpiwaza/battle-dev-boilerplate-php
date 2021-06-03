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
			$filename = "fichiers-a-recuperer/210603-battle-dev-juin-2021/exo2/fichiers/input1.txt";

			// On récupère le contenu du fichier
			$inputEnChaineDeCaracteres = file_get_contents ( $filename ); 

			// On le re-transforme en tableau afin d'avoir la même chose qu'en ligne
			$input = explode (PHP_EOL , $inputEnChaineDeCaracteres );

			// ---------------

			$debug = true;
			$debug = false;

			// Test
			if($debug) {
				var_dump($input);
			}
			
			// Extraction du nombre de lignes
			$nbLignes = array_shift($input);
			$tab = []; // tableau assoc > [nom, nbOccurences]
			
			for($i = 0 ; $i < count($input) ; $i++) {
				if($debug) {
					echo $input[$i] . '<br>';
				}
				//// Création de l'algo
				// Si l'entrée n'existe pas
				if(!array_key_exists($input[$i], $tab)) {
					// première occurence
					$tab[$input[$i]] = 1;
				}
				// Sinon
				else {
					// ++
					$tab[$input[$i]]++;
				}
			}

			if($debug) {
				var_dump($tab);
			}

			// Réponse
			function kiké2($var){
				// retourne si l'entier en entrée est pair
				return ($var === 2);
			}
			$réponse = array_filter($tab, "kiké2");

			if($debug) {
				var_dump($réponse);
			}
			echo array_key_first($réponse);
		?>
		</pre>
	</div>
</body>
</html>