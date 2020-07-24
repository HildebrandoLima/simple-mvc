<?php
// http://www.devwilliam.com.br/php/crud-no-php-com-pdo-e-mysql
class DB {

	private static function connect() {
		$pdo = new PDO("mysql:host=localhost;dbname=mvc_db;charset=utf8", 'root', '');
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $pdo;
	}

	public function insert($username, $password, $email){   
   if (!empty($categoria) && !empty($password) && !empty($email)){   
    try{
     $sql = "INSERT INTO users (name, password, email) VALUES (:name, :password, :email)";   
     $stm = $this->pdo->prepare($sql);   
     $stm->bindValue(1, $name);   
     $stm->bindValue(2, $password);   
     $stm->bindValue(3, $email);   
     $stm->execute();
     echo "<script>alert('Registro inserido com sucesso')</script>";   
    }catch(PDOException $erro){
     echo "<script>alert('Erro na linha: {$erro->getLine()}')</script>"; 
    }
   }
  }
}
