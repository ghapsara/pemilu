<?php 
	
	include 'adodb/adodb.inc.php';	

	class Library{

		var $db;

		public function __construct(){

			try {

				$this->db = ADONewConnection('mysql');
				$this->db->Connect('localhost','root','','pemilu');				

			} catch (Exception $e) {

			}			
		}

		private function executeQuery($query){
			return $this->db->Execute($query);
		}

		public function login($noktp){
			$query = "select * from penduduk where noktp = '$noktp'";
			$result = $this->executeQuery($query);
			if($result->RecordCount() >= 1 ){
				return "login success";
			}
			else{
				return "login failed";
			}
		}

		public function getDetailPenduduk($noktp){
			$query = "select * from penduduk where noktp = '$noktp'";
			$result = $this->executeQuery($query);
			return $result->GetArray();
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

		public function checkVote($noktp){
			$query = "select * from memilih where noktp = '$noktp'";
			$result = $this->executeQuery($query);
			if($result->RecordCount() == 1){
				return "sudah memilih";
			}
			else if ($result->RecordCount() == 0 ) {
				return "belum memilih";
			}
		}
		
		public function voteCalon($noktp,$idcalon){
			$check = $this->checkVote($noktp);			
			if($check=='belum memilih'){
				$query = "insert into memilih(noktp,idcalon) values ('$noktp','$idcalon')";
				$result = $this->executeQuery($query);
				if($result === false){
					return "gagal";
				}
				else{
					return "berhasil";
				}
			}
			else{
				return "gagal";
			}
		}
		
	}
 ?>