<?php

require_once "Connect.class.php";
require_once  'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Font;

class TicketExtract
{
	private $bd;

	public function __construct()
	{
		$this->bd = Connect::conn();
		$this->itemType = "ticket";
	}

	public function getRecap($date_debut, $date_fin )
	{
		$bd = "";
		$entites = "OCM-CFAO T&E";
		$bd = Connect::conn();
		$log = '';
		$status = array();
		$type = array();
		$priority = array();
		$status["1"] = "Nouveau";
		$status["2"] = "En cour Attribue";
		$status["3"] = "En cour planifie";
		$status["4"] = "En attente";
		$status["5"] = "Resolu";
		$status["6"] = "Clos";
		$type["1"] = "Incident";
		$type["2"] = "Demande";
		$priority["1"] = "P1";
		$priority["2"] = "P2";
		$priority["3"] = "P3";
		$priority["4"] = "P4";
		$qry = "";
		$qry = "SELECT * 
								FROM glpi_tickets 
								WHERE glpi_tickets.is_deleted = 0 ";

		// if ($etat === 1) {
		// 	$qry = "SELECT * 
		// 						FROM glpi_tickets 
		// 						WHERE glpi_tickets.entities_id = $entities_id 
		// 						AND glpi_tickets.status != 6 
		// 						AND glpi_tickets.status != 5 
		// 						AND glpi_tickets.is_deleted = 0";

		// } else if ($etat === 2) {
		// 	$qry = "SELECT * 
		// 						FROM glpi_tickets 
		// 						WHERE glpi_tickets.entities_id = $entities_id 
		// 						AND (glpi_tickets.status= 5 
		// 						OR glpi_tickets.status = 6)
		// 						AND glpi_tickets.is_deleted = 0 ";
		// }
		if ($date_debut != null && $date_debut != "" && $date_fin != "null" && $date_fin != "") {

			$qry .= " AND glpi_tickets.date BETWEEN '" . $date_debut . "' AND '" . $date_fin . "'";
		}
		try {
			

			$req = $this->bd->query($qry);

			$destinationFolder = 'reports/';

			if (!file_exists($destinationFolder)) {
				mkdir($destinationFolder, 0777, true);
			}
			
			$now = new DateTime();
			$now->format('Y-m-d_H\hi');
			$name = $entites . "-" . $now->format('Y-m-d_H\hi');
			$fileDest = $destinationFolder . $name . ".xlsx";
			

			/*if (file_exists($fileDest)) {
				unlink($fileDest);
			}*/
			$objPHPExcel = new Spreadsheet();
			$objPHPExcel->getProperties()->setCreator("CFAO EXTRACTION")
				->setLastModifiedBy("CFAO EXTRACTION")
				->setTitle($entites . "-" . $name)
				->setSubject("HELPDESK ORANGE")
				->setDescription("Liste des tickets Resolus.")
				->setKeywords("OCM")
				->setCategory("OCM");

			$objPHPExcel->setActiveSheetIndex(0)


				->setCellValue('A1', utf8_encode('id'))
				->setCellValue('B1', utf8_encode('Titre'))
				->setCellValue('C1', utf8_encode('priorite'))
				->setCellValue('D1', utf8_encode('Demandeur'))
				->setCellValue('E1', utf8_encode('Source'))
				->setCellValue('F1', utf8_encode('Lieu'))
				->setCellValue('G1', utf8_encode('SLA'))
				->setCellValue('H1', utf8_encode('Domaine'))
				->setCellValue('I1', utf8_encode('Categorie'))
				->setCellValue('J1', utf8_encode('Sous-Categorie'))
				->setCellValue('K1', utf8_encode('Statut'))
				->setCellValue('L1', utf8_encode('Date d\' ouverture'))
				->setCellValue('M1', utf8_encode('Delais resolution'))
				->setCellValue('N1', utf8_encode('Type'))
				->setCellValue('O1', utf8_encode('Attrinbue'))
				->setCellValue('P1', utf8_encode('Date de Resolution'))
				->setCellValue('Q1', utf8_encode('satisfaction'))
				->setCellValue('R1', utf8_encode('note/5'))
				->setCellValue('S1', utf8_encode('suggestion'))
				->setCellValue('T1', utf8_encode('Suivis'));


			$objPHPExcel->getActiveSheet()->getStyle('A1:T1')->applyFromArray(
				array(
					'fill' => array(
						// 'type' => PHPExcel_Style_Fill::FILL_SOLID,
						'color' => array('rgb' => 'FF4500')
					)
				)
			);

			// $objPHPExcel->getActiveSheet()->getStyle("A1:T1")->getFont()->setBold(true)
			// 	->getColor()->setRGB('F7F7F7');

			$objPHPExcel->getActiveSheet()->setAutoFilter('A1:T1');
			$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
			$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(50);
			$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(10);
			$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
			$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(20);
			$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
			$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
			$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
			$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
			$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
			$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
			$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(20);
			$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(20);
			$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(20);
			$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(20);
			$objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(30);
			$objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(20);
			$objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(15);
			$objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(10);
			$objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(40);
			$objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(50);

			$rowCount = 2;
			$sla = "";
			while ($p = $req->fetch(PDO::FETCH_ASSOC)) {

				if ($p['time_to_resolve'] == null) {
					$sla = "OK";
				} else {
					if ($p['status'] == 6 || $p['status'] == 5) {

						if ($p['solvedate'] < $p['time_to_resolve']) {
							$sla = "OK";
						} else {
							$sla = "NON OK";
						}
					} else {
						if (date('Y-m-d H:i:s') < $p['time_to_resolve']) {
							$sla = "OK";
						} else {
							$sla = "NON OK";
						}
					}
				}

				$objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, utf8_encode($p['id'] ?? ''));
				$objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, utf8_encode($p['name'] ?? ''));
				$objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, utf8_encode($priority["" . $p["priority"]] ?? ''));
				$objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, utf8_encode($this->getUsers($p["id"], 1) ?? ''));
				$objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, utf8_encode($this->requestName($p['requesttypes_id']) ?? ''));
				$objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, utf8_encode($this->getLocation($p['locations_id']) ?? ''));
				$objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, utf8_encode($sla));
				$objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, utf8_encode($this->getDomaine($p['entities_id']) ?? ''));
				$objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, utf8_encode($this->getCategorie($p['itilcategories_id']) ?? ''));
				$objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, utf8_encode($this->getSubCategories($p['itilcategories_id']) ?? ''));
				$objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, utf8_encode($status["" . $p["status"]] ?? ''));
				$objPHPExcel->getActiveSheet()->SetCellValue('L' . $rowCount, utf8_encode($p['date'] ?? ''));
				$objPHPExcel->getActiveSheet()->SetCellValue('M' . $rowCount, utf8_encode($p['time_to_resolve'] ?? ''));
				$objPHPExcel->getActiveSheet()->SetCellValue('N' . $rowCount, utf8_encode($type["" . $p["type"]] ?? ''));
				$objPHPExcel->getActiveSheet()->SetCellValue('O' . $rowCount, utf8_encode($this->getUsers($p["id"], 2) ?? ''));
				$objPHPExcel->getActiveSheet()->SetCellValue('P' . $rowCount, utf8_encode($p['solvedate'] ?? ''));
				$objPHPExcel->getActiveSheet()->SetCellValue('Q' . $rowCount, utf8_encode($this->getSatisfaction($p["id"]) ?? ''));
				$objPHPExcel->getActiveSheet()->SetCellValue('R' . $rowCount, utf8_encode($this->getNoteSatisfaction($p["id"]) ?? ''));
				$objPHPExcel->getActiveSheet()->SetCellValue('S' . $rowCount, utf8_encode($this->getSatisfactionComment($p["id"]) ?? ''));
				$objPHPExcel->getActiveSheet()->getStyle('S' . $rowCount)->getAlignment()->setWrapText(true);
				$objPHPExcel->getActiveSheet()->SetCellValue('T' . $rowCount, utf8_encode($this->getFollowups($p["id"]) ?? ''));
				$objPHPExcel->getActiveSheet()->getStyle('T' . $rowCount)->getAlignment()->setWrapText(true);

				$rowCount++;
			}
			$objWriter = new Xlsx($objPHPExcel);
			$objWriter->save($fileDest);

			$log .= "getRecap function called with parameters: date_debut=$date_debut, date_fin=$date_fin\n";

		} catch (PDOException $e) {
			$log .= "Error in getRecap function: " . $e->getMessage() . "\n";
		}
		return $fileDest;
	}

	public function getLocation($id)
	{
		$value = "";
		$qry = "SELECT name FROM glpi_locations WHERE id = :id";
		$req = $this->bd->prepare($qry);
		$req->execute(array("id" => $id));
		try {
			if ($p = $req->fetch(PDO::FETCH_ASSOC)) {
				return $p["name"];
			}
		} catch (PDOException $e) {

		}
		return $value;
	}

	public function getSla($id)
	{
		$value = "";
		$qry = "SELECT name FROM glpi_slas WHERE id = :id";
		$req = $this->bd->prepare($qry);
		$req->execute(array("id" => $id));
		try {
			if ($p = $req->fetch(PDO::FETCH_ASSOC)) {
				return $p["name"];
			}
		} catch (PDOException $e) {

		}
		return $value;
	}

	public function getCategorie($id)
	{
		$cate = $this->getSonsCategory($id);
		$value = "";

		$qry = "SELECT name FROM glpi_itilcategories WHERE level = 1 AND id IN " . $cate;
		
		error_log('query: ' . $qry);
		$req = $this->bd->prepare($qry);
		$req->execute();
		try {
			if ($p = $req->fetch(PDO::FETCH_ASSOC)) {
				$value = $p["name"];
			}
		} catch (PDOException $e) {

		}
		error_log('Categorie : ' . $value);
		return $value;
	}

	public function requestName($id)
	{
		$value = "";

		$qry = "SELECT name FROM glpi_requesttypes WHERE id=:id";

		$req = $this->bd->prepare($qry);
		$req->execute(array("id" => $id));
		try {
			if ($p = $req->fetch(PDO::FETCH_ASSOC)) {
				$value = $p["name"];
			}
		} catch (PDOException $e) {

		}
		return $value;
	}

	public function getUsers($id, $t)
	{
		$value = "";
		$qry = "SELECT glpi_users.name as name, 
							glpi_users.firstname as first, 
							glpi_users.realname as realn
						FROM
							glpi_users, 
							glpi_tickets_users 
						WHERE 
							glpi_tickets_users.tickets_id = :id AND 
							glpi_tickets_users.type = :type AND 
							glpi_tickets_users.users_id = glpi_users.id ";
		$req = $this->bd->prepare($qry);
		$req->execute(array("id" => $id, "type" => $t));
		try {
			while ($p = $req->fetch(PDO::FETCH_ASSOC)) {
				if (($p["first"] != "" && $p["first"] != null) || ($p["realn"] != "" && $p["realn"] != null)) {
					$value = $p["first"] . " " . $p["realn"];
				} else {
					$value = $p["name"];
				}
			}
		} catch (PDOException $e) {

		}
		return $value;
	}

	public function getFollowups($id)
	{

		$suivi = "";
		$nom = "";
		try {
			$qry = "SELECT * FROM glpi_ticketfollowups WHERE glpi_ticketfollowups.tickets_id= :id";
			$req = $this->bd->prepare($qry);
			$req->execute(array("id" => $id));
			if (!empty($req)) {
				while ($p = $req->fetch(PDO::FETCH_ASSOC)) {
					$nom = $this->getUserName($p['users_id']);
					$ajout = $p['date'] . " : " . $p['content'] . "\n\t par : " . $nom;
					$suivi .= $ajout . "\n";
				}
			} else
				$suivi = "Aucun suivi";

		} catch (Exception $e) {

		}

		return $suivi;

	}

	public function getUserName($id)
	{
		$value = "";
		$qry = "SELECT glpi_users.name as name, 
							glpi_users.firstname as first, 
							glpi_users.realname as realn
						FROM
							glpi_users
						WHERE 
							id= :id";

		try {
			$req = $this->bd->prepare($qry);
			$req->execute(array("id" => $id));
			while ($p = $req->fetch(PDO::FETCH_ASSOC)) {
				if (($p["first"] != "" && $p["first"] != null) || ($p["realn"] != "" && $p["realn"] != null)) {
					$value = $p["first"] . " " . $p["realn"];
				} else {
					$value = $p["name"];
				}
			}
		} catch (PDOException $e) {

		}
		return $value;
	}

	public function getDomaine($id)
	{
		$value = "";
		$qry = "SELECT name FROM glpi_entities WHERE id = :id";
		$req = $this->bd->prepare($qry);
		$req->execute(array("id" => $id));
		try {
			if ($p = $req->fetch(PDO::FETCH_ASSOC)) {
				$value = $p["name"];
			}
		} catch (PDOException $e) {

		}
		return $value;
	}

	public function getSubCategories($id)
	{

		$value = "";
		$qry = "SELECT name FROM glpi_itilcategories WHERE id=:id";
		$req = $this->bd->prepare($qry);
		$req->execute(array("id" => $id));
		try {
			if ($p = $req->fetch(PDO::FETCH_ASSOC)) {
				$value = $p["name"];
			}
		} catch (PDOException $e) {

		}
		return $value;
	}

	public function getdom()
	{
		$tab = array();
		$qry = "SELECT * FROM glpi_entities WHERE level = 2";
		$req = $this->bd->query($qry);
		while ($p = $req->fetch(PDO::FETCH_ASSOC)) {
			$tab["" . $p['id']] = $p['name'];
		}
		return $tab;
	}

	public function getSonsCategory($cid)
	{

		if ($cid == 0) {
			return "all";
		}
		try {
			$query = "SELECT level, ancestors_cache AS cache  FROM glpi_itilcategories WHERE id =" . $cid;
			$req = $this->bd->query($query);
			if ($p = $req->fetch(PDO::FETCH_ASSOC)) {
				$sons = $p['cache'];
				if (preg_match("/}/", $sons)) {
					$sons = preg_replace("/{/", '(', $sons);
					$sons = preg_replace("/}/", ')', $sons);
					$sons = preg_replace("/:/", ',', $sons);
					$sons = preg_replace('/"/', '', $sons);
					$sons = preg_replace("/\[/", '(', $sons);
					$sons = preg_replace("/\]/", ')', $sons);
					return $sons;

				} else {
					return "(" . $cid . ")";
				}
			} else {
				return "(" . $cid . ")";
			}

		} catch (Exception $e) {

		}
		return "(" . $cid . ")";
	}

	public function getSatisfactionComment($id)
	{
		$value = "";
		$query = "SELECT comment FROM glpi_ticketsatisfactions WHERE tickets_id = :id";
		$req = $this->bd->prepare($query);
		$req->execute(array("id" => $id));
		if ($p = $req->fetch(PDO::FETCH_ASSOC)) {
			$value = $p['comment'];
		}
		return $value;
	}

	public function getNoteSatisfaction($id)
	{
		$value = "";
		$query = "SELECT satisfaction FROM glpi_ticketsatisfactions WHERE tickets_id = :id";
		$req = $this->bd->prepare($query);
		$req->execute(array("id" => $id));
		if ($p = $req->fetch(PDO::FETCH_ASSOC)) {
			$value = $p['satisfaction'];
		}
		return $value;
	}

	public function getSatisfaction($id)
	{
		$value = "";
		$query = "SELECT answer FROM glpi_plugin_satisfaction_surveyanswers INNER JOIN glpi_ticketsatisfactions 
		ON glpi_plugin_satisfaction_surveyanswers.ticketsatisfactions_id=glpi_ticketsatisfactions.id WHERE 
		glpi_ticketsatisfactions.tickets_id = :id";
		$req = $this->bd->prepare($query);
		$req->execute(array("id" => $id));
		if ($p = $req->fetch(PDO::FETCH_ASSOC)) {
			if (stristr($p['answer'], '0') === false) {
				$value = "OUI";
			} else {
				$value = "NON";
			}
		}
		return $value;
	}


}
// $c = new TicketExtract();

?>