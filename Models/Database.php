<?php

class Database {

	private static function connect() {
		$pdo = new PDO("mysql:host=localhost;dbname=mvc_db;charset=utf8", 'root', '');
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $pdo;
	}

	public static function query($query, $params = array()) {
		$statement = self::connect()->prepare($query);
		$statement->execute($params);
		//$data = $statement->fetchAll();
		//return $data;
	}
}
