<?php 
	
	require_once('nusoap/lib/nusoap.php');		
	//include('library.php');
	include 'penduduk.php';
	include 'calon.php';

	$server = new nusoap_server;
	$server->configureWSDL('server', 'urn:server');
	$server->wsdl->schemaTargetNamespace = 'urn:server';

	ini_set('display_errors','off');


	//return type	
	$server->wsdl->addComplexType(
		'Calon',
		'complexType',
		'array',
		'all',
		'',		
		array(
			'idcalon'=> array('name' => 'idcalon', 'type' => 'xsd:int'),
			'nocalon'=> array('name' => 'nocalon', 'type' => 'xsd:int'),
			'nama'=> array('name' => 'nama', 'type' => 'xsd:string'),
			'partai'=> array('name' => 'partai', 'type' => 'xsd:string'),
			'visimisi'=> array('name' => 'visimisi', 'type' => 'xsd:string')
		)
	);

	$server->wsdl->addComplexType(
		'ArrayCalon',
		'complexType',
		'array',
		'',
		'SOAP-ENC:Array',
		array(),
		array(
			array(
				'ref'=>'SOAP-ENC:arrayType',
				'wsdl:arrayType'=>'tns:Calon[]'
				)
			)		
	);

	$server->wsdl->addComplexType(
		'Penduduk',
		'complexType',
		'array',
		'all',
		'',		
		array(
			'noktp'=> array('name' => 'noktp', 'type' => 'xsd:int'),
			'nama'=> array('name' => 'nama', 'type' => 'xsd:string'),
			'jeniskelamin'=> array('name' => 'jeniskelamin', 'type' => 'xsd:string'),
			'alamat'=> array('name' => 'alamat', 'type' => 'xsd:string')
		)
	);	

	$server->wsdl->addComplexType(
		'ArrayPenduduk',
		'complexType',
		'array',
		'',
		'SOAP-ENC:Array',
		array(),
		array(
			array(
				'ref'=>'SOAP-ENC:arrayType',
				'wsdl:arrayType'=>'tns:Penduduk[]'
				)
			)		
	);

	//register method
	$server->register('login',
		array('noktp' => 'xsd:int'), 
		array('return' => 'xsd:string'),
		'urn:server',
		'urn:server#loginServer', 
		'rpc',
		'encoded',
		'login');

	$server->register('getAllCalon',
		array(), 
		array('return' => 'tns:ArrayCalon'),
		'urn:server',
		'urn:server#getAllCalon', 
		'rpc',
		'encoded',
		'get AllCalon');

	$server->register('getDetailCalon',
		array('idcalon' => 'xsd:int'), 
		array('return' => 'tns:Calon'),
		'urn:server',
		'urn:server#getDetailCalon', 
		'rpc',
		'encoded',
		'get Detail Calon');

	$server->register('getAllPenduduk',
		array('noktp' => 'xsd:int'), 
		array('return' => 'tns:ArrayPenduduk'),
		'urn:server',
		'urn:server#getAllPenduduk', 
		'rpc',
		'encoded',
		'get All Penduduk');

	$server->register('getDetailPenduduk',
		array('noktp' => 'xsd:int'), 
		array('return' => 'tns:Penduduk'),
		'urn:server',
		'urn:server#getDetailPenduduk', 
		'rpc',
		'encoded',
		'get Detail Penduduk');

	$server->register('checkVote',
		array('noktp' => 'xsd:int'), 
		array('return' => 'xsd:string'),
		'urn:server',
		'urn:server#checkVote', 
		'rpc',
		'encoded',
		'checkVote');

	$server->register('voteCalon',
		array('noktp'=>'xsd:int', 'idcalon' => 'xsd:int'), 
		array('return' => 'xsd:string'),
		'urn:server',
		'urn:server#voteCalon', 
		'rpc',
		'encoded',
		'voteCalon');

	$server->register('insertPenduduk',
		array('noktp' => 'xsd:int','nama' => 'xsd:string','jeniskelamin' => 'xsd:string','alamat' => 'xsd:string'), 
		array('return' => 'xsd:string'),
		'urn:server',
		'urn:server#insertPenduduk', 
		'rpc',
		'encoded',
		'insert Penduduk');

	$server->register('updatePenduduk',
		array('noktp' => 'xsd:int','nama' => 'xsd:string','jeniskelamin' => 'xsd:string','alamat' => 'xsd:string'), 
		array('return' => 'xsd:string'),
		'urn:server',
		'urn:server#updatePenduduk', 
		'rpc',
		'encoded',
		'update Penduduk');

	$server->register('deletePenduduk',
		array('noktp' => 'xsd:int'), 
		array('return' => 'xsd:string'),
		'urn:server',
		'urn:server#deletePenduduk', 
		'rpc',
		'encoded',
		'delete Penduduk');

	function login($noktp){
		$obj = new Penduduk();
		$result = $obj->login($noktp);
		return $result;
	}

	function getAllPenduduk(){
		$obj = new Penduduk();
		$result = $obj->getAllPenduduk();
		return $result;
	}

	function getDetailPenduduk($noktp){
		$obj = new Penduduk();
		$result = $obj->getDetailPenduduk($noktp);		
		return $result;
	}

	function insertPenduduk($noktp,$nama,$jeniskelamin,$alamat){
		$obj = new Penduduk();
		$result = $obj->insertPenduduk($noktp,$nama,$jeniskelamin,$alamat);
		return $result;
	}

	function updatePenduduk($noktp,$nama,$jeniskelamin,$alamat){
		$obj = new Penduduk();
		$result = $obj->updatePenduduk($noktp,$nama,$jeniskelamin,$alamat);
		return $result;
	}
	function deletePenduduk($noktp){
		$obj = new Penduduk();
		$result = $obj->deletePenduduk($noktp);
		return $result;
	}
	function checkVote($noktp){
		$obj = new Penduduk();
		$result = $obj->checkVote($noktp);
		return $result;
	}

	function voteCalon($noktp, $idcalon){
		$obj = new Penduduk();
		$result = $obj->voteCalon($noktp, $idcalon);		
		return $result;
	}

	function getAllCalon(){
		$obj = new Calon();
		$result = $obj->getAllCalon();
		return $result;		
	}

	function getDetailCalon($idcalon){
		$obj = new Calon();		
		$result = $obj->getDetailCalon($idcalon);		
		return $result;
	}


	$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
	$server->service($HTTP_RAW_POST_DATA);
 ?>