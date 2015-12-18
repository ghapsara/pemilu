<?php 
	
	include 'adodb/adodb.inc.php';

	class Calon
	{
		
		public function __construct(){

			try {

				$this->db = ADONewConnection('mysql');
				$this->db->Connect('localhost','satub','satub','satub_4795');				

			} catch (Exception $e) {

			}			
		}

		private function executeQuery($query){
			return $this->db->Execute($query);
		}

		public function getHasil($idcalon){
			$query = "select * from memilih where idcalon = '$idcalon'";
			$result = $this->executeQuery($query);
			return $result->RecordCount();			
		}

		public function getAllCalon(){
			$query = "select * from calon";			
			$result = $this->executeQuery($query);			
			return $result->GetArray();					
		}

		public function getDetailCalon($idcalon){
			$query = "select * from calon where idcalon = '$idcalon'";
			$result = $this->executeQuery($query);
			return $result->GetArray();
		}
		
		//select * from calon where idcalon != 1;

	}

 ?>