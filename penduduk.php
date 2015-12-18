<?php 
	
	include 'adodb/adodb.inc.php';

	class Penduduk
	{
		
		public function __construct()
		{
			try {

				$this->db = ADONewConnection('mysql');
				$this->db->Connect('localhost','satub','satub','satub_4795');				

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
		public function getAllPenduduk(){
			$query = "select * from penduduk";
			$result = $this->executeQuery($query);
			return $result->GetArray();
		}
		public function getDetailPenduduk($noktp){
			$query = "select * from penduduk where noktp = '$noktp'";
			$result = $this->executeQuery($query);
			return $result->GetArray();
		}

		public function insertPenduduk($noktp,$nama,$jeniskelamin,$alamat){
			$query = "insert into penduduk(noktp,nama,jeniskelamin,alamat) values ('$noktp','$nama','$jeniskelamin','$alamat')";
			$result = $this->executeQuery($query);
			if($result === false){
				return "gagal";
			}
			else{
				return "berhasil";
			}
		}

		public function updatePenduduk($noktp,$nama,$jeniskelamin,$alamat){
			$query = "update penduduk set nama='$nama',jeniskelamin='$jeniskelamin',alamat = '$alamat' where noktp = '$noktp'";
			$result = $this->executeQuery($query);
			if($result === false){
				return "gagal";
			}
			else{
				return "berhasil";
			}			
		}

		public function deletePenduduk($noktp){
			$query = "delete from penduduk where noktp = '$noktp'";
			$result = $this->executeQuery($query);
			if($result === false){
				return "gagal";
			}
			else{
				return "berhasil";
			}
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
				return "sudah memilih";
			}
		}
	}
 ?>