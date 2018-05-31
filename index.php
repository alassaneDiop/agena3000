<html>
	<head></head>

    	<body>

		<?php
		
		$eanCle = $err = "";


		if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
			if (empty($_POST["chiffre"])){
				$err = "Aucun chiffre détecté";
			} else {

				if(preg_match("/[a-z]/i", $_POST["chiffre"])){
					$err = "Veuillez saisir 12 chiffres en respectant le format";
				} else {

					$tab = explode(" ", $_POST["chiffre"]);
				
					if (count($tab) != 12){
						$err = "Veuillez saisir 12 chiffres en respectant le format";
					} else {
						$eanCle = $_POST["chiffre"]." ".cle($_POST["chiffre"]);
					}
				}
			}
		}

		function cle($param) {

			$tab = explode(" ", $param);
			$reste = somme($tab) % 10;

			if ($reste != 0)
				return 10 - $reste;

			return 0;
		}

		function somme($param) {

			$s = 0;
			$length = count($param);

			for ($i=0; $i<$length; $i++) {

				if ($i % 2 == 0) {
				$s = $s + $param[$i];
				} else {
					$s = $s + ($param[$i] * 3);
				}

			}

			return $s;
		}

		?>

		<div>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" style="display: inline-grid;">
				<label>Veuillez saisir un EAN sans la clé</label>
				<input type="text" name="chiffre" placeholder="x x x x x x x x x x x x"> <?php echo $err; ?>
				<button type="submit" name="submit">Valider</button>
			</form>
		</div>
		
		<div>
			<label>EAN avec la clé : <?php echo $eanCle; ?>
			</label>
			</form>
		</div>
      	</body>

</html>                                                                                                                                                                                                 
      
