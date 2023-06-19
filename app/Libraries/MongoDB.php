<?php
 
namespace App\Libraries;

class MongoDB {
             
	private $conn;

	function __construct() {
		//$config = new \Config\MongoDbConfig();

		$host = 'localhost';
		$port = '27017';
		$username = '';
		$password = '';
		$authRequired = false;

		try {
			if($authRequired === true) {
				$this->conn = new \MongoDB\Driver\Manager('mongodb://' . $username . ':' . $password . '@' . $host. ':' . $port);
			} else {
				$this->conn = new \MongoDB\Driver\Manager('mongodb://' . $host. ':' . $port);
			}
		} catch(MongoDB\Driver\Exception\MongoConnectionException $ex) {
			show_error('Couldn\'t connect to mongodb: ' . $ex->getMessage(), 500);
		}
	}

	function getConn() {
		return $this->conn;
	}
             
}
?>