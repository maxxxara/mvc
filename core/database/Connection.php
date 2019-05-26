<?php  

class Connection {
	public static function make() {
		$config = require 'config.php';
		$config = $config['database'];
		try{
			return new PDO(
				$config['connection'].';dbname='.$config['name'],
				$config['username'],
				$config['password'],
				$config['options']
			);
		}catch(PDOException $e){
			die($e->getMessage());
		}
	}
}
?>