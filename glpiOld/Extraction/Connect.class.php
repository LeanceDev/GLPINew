<?php

 	class Connect{

		public static function conn(){
		
			try{
				$b=new PDO('mysql: host=localhost;dbname=glpiold', 'root','');

				$log = 'connexion réussie!';
				$b->setattribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				return $b;
			}
			catch(PDOException $e){
					die('Probleme de connection a la base de données : '.$e->getMessage());
				}
				catch(Exception $e){
					die('ERREUR survenue'.$e->getMessage());
				}
				
			return $b;

		}
	}	

?>
