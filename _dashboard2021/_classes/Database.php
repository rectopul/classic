<?php 

class Database{

	private $connstr 	= 'sqlite:'.DB_HOST;
	protected $conn;
	
	
	public function __construct(){

		$this->conn = null;
		
		try{

			$this->conn = new PDO($this->connstr);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			return $this->conn;

		}catch(PDOException $e){

			exit("Connection error: {$e->getMessage()}");

		}
	}


	public function adicionar($table, $fields, $values, $binds = null){

		$stmt = $this->conn->prepare("INSERT INTO {$this->tabela} ({$fields}) VALUES ({$values})");
		($binds == null) ? $stmt->execute() : $stmt->execute($binds);
		return ($this->conn->lastInsertId()) ? $this->conn->lastInsertId() : false;

	}

}