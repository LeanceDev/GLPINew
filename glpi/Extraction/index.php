<!DOCTYPE html>
<?php	
require_once 'TicketExtract.class.php';

try {
    session_start();
    
    $c = new TicketExtract();
    $domaine = $c->getdom();
    $status = array(
        1 => "En cours",
        2 => "Resolu",
    );
    $date_debut = "";
    $date_fin = "";

    // Variable pour stocker les messages d'erreur
    $errorMessage = "";

    // Fonction pour enregistrer les erreurs dans le log
    function logError($message) {
        error_log($message, 0);  // 0 signifie que le message sera envoyé dans le journal du serveur
    }

   /* if (isset($_POST['date_debut']) && isset($_POST['date_fin'])) {
        $d = $_POST['domaine'];
        $s = 0;
        $entites = $domaine["".$_POST['domaine']];
        $state = $status["".$_POST['status']];

        if ($_POST['status'] == 1) {
            $s = 1;
        } else {
            $s = 2;
        }
		
        // Essayez d'obtenir le récapitulatif, enregistrez une erreur en cas d'échec
        // $test = $c->getRecap($d, "OCM-CFAO T&E-".$entites."-".$state, $s, $_POST['date_debut'], $_POST['date_fin']);

    
    }*/
} catch (Exception $e) {
    $errorMessage = "Erreur : ".$e->getMessage();
    logError($errorMessage);
}
?>


<html>
	<head>
		<title>Extraction</title>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	</head>
	<body>
		<nav class="navbar navbar-dark bg-secondary">
		  <a class="navbar-brand" href="#">
		    <img src="img/logo_ocm.jpg" width="60" height="50" alt=""><b>OCM - EXTRACTION
		  </b></a>
		</nav>
		<div class="container pt-3">
			<h2><b> FORMULAIRE D'EXTRACTION TICKETS OCM </b></h2>
			<form action="index.php" method="POST" class="form-inline" >
				<div class="form-group">
					<table classe="table table-borderless" cellspacing="" cellpadding="10%">
						<tbody>
							<tr>
								
								
								<td><b>DU : </b>
									<input class="form-control is-invalid" type="date" name="date_debut" placeholder="Du: ">
								</td>	
								<td>
									<b>Au : </b>
									<input class="form-control is-invalid" type="date" name="date_fin" required placeholder="Au :">
								</td>
								<td>	
									<button type="submit" class="btn btn-Dark my-1">GENERER</button>
								</td>
								<?php
									$test="#";
									if(isset($_POST['date_debut']) & isset($_POST['date_fin'])){
										/*var_dump($_POST['domaine'],$_POST['status']);
										$d=$_POST['domaine'];
										$s=0;
										$entites=$domaine["".$_POST['domaine']];
										$state=$status["".$_POST['status']];
										if ($_POST['status']==1){
											$s=1;
										}
										else{
											$s=2;
										}*/

										$test=$c->getRecap($_POST['date_debut'],$_POST['date_fin']);
									}

									echo '<td><a href="'.$test.'" class="btn btn-Dark my-1">TELECHARGER</a></td>';
								?>
							</tr>
						</tbody>
					</table>
				</div>
			</form>
		</div>	
		<?php
            // Afficher le message d'erreur s'il y en a un
            if (!empty($errorMessage)) {
                echo '<div class="alert alert-danger">'.$errorMessage.'</div>';
            }
        ?>

        <script src="bootstrap/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	</body>
</html>					

<?php
// // Clear the error log by truncating its content
// if (file_exists('/opt/lampp/logs/php_error_log')) {
//     $handle = fopen('/opt/lampp/logs/php_error_log', 'w');
//     fclose($handle);
//     echo "Error log cleared successfully.";
// } else {
//     echo "Error log file not found.";
// }

//   exec('tail /opt/lampp/logs/php_error_log -n 100', $error_logs);

//   foreach($error_logs as $error_log) {

//        echo "<br />".$error_log;
//   }

 ?>

<style type="text/css">
	form{
		margin-top: 3%;
		margin-left: 5%;
		text-align: center;

	}
	th{
		text-align: center;
	}
	.container{
		margin-top: 10%;
		text-align: center;
	}
</style>