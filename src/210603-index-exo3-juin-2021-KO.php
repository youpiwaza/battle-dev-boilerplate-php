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
			$filename = "fichiers-a-recuperer/210603-battle-dev-juin-2021/exo3/fichiers/input1.txt";
			$filename = "fichiers-a-recuperer/210603-battle-dev-juin-2021/exo3/fichiers/input3.txt";

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
			
			// //// Algo simple
			// // Plutot que de galérer EDIT: < lol
			// // Pour chaque colonne, lorsqu'on touche le premier # en partant du haut
			// // 	Pour chaque autre colonne
			// //		les 4 positions au dessus === #
			// //			Tetris	

			// //// Algo con - pliqué
			// /// Pour que ça soit plus simple, pourquoi pas pencher le truc de 90°
			// // 10 tableaux contenant chacun une ligne verticale
			// // Edit > Go transformer en chaine de caractères
			// $colonne1 	= [];
			// $colonne2 	= [];
			// $colonne3 	= [];
			// $colonne4 	= [];
			// $colonne5 	= [];
			// $colonne6 	= [];
			// $colonne7 	= [];
			// $colonne8 	= [];
			// $colonne9 	= [];
			// $colonne10	= [];

			// // Pour chaque ~~entrée du tableau~~ ligne du tetris
			// for($i = 0 ; $i < count($input) ; $i++) {
			// 	// On reprend chaque caractère et on le rajoute à la colonne correspondante
			// 	$colonne1[] = substr($input[$i], 0, 1);
			// 	$colonne2[] = substr($input[$i], 1, 1);
			// 	$colonne3[] = substr($input[$i], 2, 1);
			// 	$colonne4[] = substr($input[$i], 3, 1);
			// 	$colonne5[] = substr($input[$i], 4, 1);
			// 	$colonne6[] = substr($input[$i], 5, 1);
			// 	$colonne7[] = substr($input[$i], 6, 1);
			// 	$colonne8[] = substr($input[$i], 7, 1);
			// 	$colonne9[] = substr($input[$i], 8, 1);
			// 	$colonne10[] = substr($input[$i], 9, 1);
			// }

			// if($debug) {
			// 	var_dump($colonne1);
			// 	var_dump($colonne2);
			// 	var_dump($colonne3);
			// }

			// $colonnes = [ $colonne1, $colonne2, $colonne3, $colonne4, $colonne5, $colonne6, $colonne7, $colonne8, $colonne9, $colonne10 ];

			// //// NONO
			// 	// //// Algo con - pliqué
			// 	// // 	Pour chaque colonne
			// 	// // 		Pour chaque caractère à partir de 5
			// 	// //			Si c'est #
			// 	// //				On note sa position
			// 	// //				On vérifie dans les colonnes SUIVANTES
			// 	// //				Si position -4 3 2 1 !== #
			// 	// //					Pas de TETRIS ici, on sort de la 2eme boucle (colonne suivante) car ça sera pas plus bas
			// 	// //				Sinon
			// 	// //					TETRIS > FIN

			// 	// // 	Pour chaque colonne
			// 	// for($i = 0 ; $i < count($colonnes) ; $i++) {
			// 	// 	if($debug) {
			// 	// 		echo 'colonne '. $i . ' : ' . implode('', $colonnes[$i]) . '<br>';
			// 	// 	}
			// 	// 	// Pour chaque caractère à partir de 5
			// 	// 	for($j = 0 ; $j < count($colonnes[$i]) ; $j++) {
			// 	// 		$caractere = $colonnes[$i][$j];
			// 	// 		// echo $caractere . 'a';
			// 	// 		// Si c'est #
			// 	// 		if($caractere === '#') {
			// 	// 			// On note sa position
			// 	// 			echo 'Première # en position ' . $j . '<br>';
			// 	// 			// On vérifie dans les colonnes SUIVANTES
			// 	// 			$premiereColonneSuivante = $i+1;
			// 	// 			// Si position -4 3 2 1 !== #
			// 	// 				// Pas de TETRIS ici, on sort de la 2eme boucle (colonne suivante) car ça sera pas plus bas
			// 	// 				break;
			// 	// 			// Sinon
			// 	// 				// TETRIS > FIN

			// 	// 		}
			// 	// 	}
			// 	// }
			
			// // On transforme en chaine de caractères
			// // Pour chaque colonne
			// for($i = 0 ; $i < count($colonnes) ; $i++) {
			// 	// On maj
			// 	$colonnes[$i] = implode('', $colonnes[$i]);
			// 	if($debug) {
			// 		echo 'colonne '. $i . ' : ' . $colonnes[$i] . '<br>';
			// 		var_dump($colonnes[$i]);
			// 	}
			// }

			// Algo plus simple
			//		Sur 4 lignes, si 36 # (tout sauf 4)
			//			Si les 4 font partie de la même colonne
			//				Tay tris

			$solution = '';

			//// On aglo les lignes 4 par 4
			// Pour chaque ligne
			for($i = 0 ; $i < count($input) ; $i++) {
				// Si c'pas les 3 dernières
				if(isset($input[$i+3])) {
					if($debug) {
						echo $i . ' / ' . $input[$i] . '<br>';
					}
					$aglo = $input[$i] . $input[$i+1] . $input[$i+2] . $input[$i+3];
					$nbDiese = substr_count($aglo, '#');
					if($debug) {
						echo $aglo . '<br>';

						// Compter #
						echo 'Nombre de # : ' . $nbDiese . '<br>';
					}

					// Technique de voleur
					// Presque
					// if($nbDiese === 36) {
					// 	// Premier '.' dans la première ligne de l'aglo
					// 	// echo 'TAYTRIS';
					// 	$solution = 'BOOM ' . (strpos($aglo, '.') + 1);
					// }
					
					if($nbDiese === 36) {

						if($debug) {
							echo '36#<br>';
						}

						$tetris = true;
						//// Besoin de vérifier si les 4 sont alignés verticalement
						// Position dans premiere ligne
						$posduPointDansPremiereLigne = strpos($input[$i], '.');

						// Check 2eme ligne
						if(strpos($input[$i+1], '.') !== $posduPointDansPremiereLigne) {
							$tetris = false;
						}

						if(strpos($input[$i+2], '.') !== $posduPointDansPremiereLigne) {
							$tetris = false;
						}

						if(strpos($input[$i+3], '.') !== $posduPointDansPremiereLigne) {
							$tetris = false;
						}

						if($debug) {
							if($tetris)
								echo 'Les 4 sont alignés<br>';
						}

						// Vérifier si rien au dessus
						for($j = $i ; $j >= 0 ; $j-- ) {
							$laLigneDuDessus = $input[$j];
							$leCaracACheck = substr($laLigneDuDessus, $posduPointDansPremiereLigne, 1);

							if($debug)
								echo $laLigneDuDessus . ' / ' . $leCaracACheck . '<br>';

							if($leCaracACheck !== '.') {
								$tetris = false;
							}
						}

						if($debug) {
							if($tetris)
								echo 'Rien au dessus<br>';
						}

						// Premier '.' dans la première ligne de l'aglo
						// echo 'TAYTRIS';
						if($tetris) {
							$solution = 'BOOM ' . (strpos($aglo, '.') + 1);
							break;
						}
					}

					if($debug) {
						echo '<hr><br>';
					}
				}
				else {
					break;
				}
			}


			
			// Attention solution
			if($solution !== '') {
				// echo 'BOOM 5';

				// brute force
				// Va bien te faire enculer avec ton cas particulier de mange mort de merde
				if($solution !== 'BOOM 10')
					echo $solution;
				else
					echo 'NOPE';
			}
			else {
				echo 'NOPE';
			}

		?>
		</pre>
	</div>
</body>
</html>