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
			$filename = "fichiers-a-recuperer/210603-battle-dev-juin-2021/exo1/fichiers/input1.txt";

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
			$besoinDecollage = array_shift($input);
			$distanceTotale = array_shift($input); // 1 unité = 5 carburants
			
			// Total
			echo $besoinDecollage + 5 * $distanceTotale;
		?>
		</pre>
	</div>
</body>
</html>