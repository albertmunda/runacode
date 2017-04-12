<?php

	class LBDBManager {
		private $host;
		private $user="";
		private $pass="";
		private $dbname="";
		private $dbconnect=null;

		public function __construct($host,$user,$pass, $dbname){
			$this->host=$host;
			$this->user=$user;
			$this->pass=$pass;
			$this->dbname=$dbname;
			$this->dbconnect=null;
		}

		public function createDB($host,$user,$pass,$dbname){
			try {
				$dbh = new PDO("mysql:host=$host", $user, $pass);

				$dbh->exec("CREATE DATABASE IF NOT EXISTS `$dbname`;
                	CREATE USER '$user'@'$host' IDENTIFIED BY '$pass';
                	GRANT ALL ON `$dbname`.* TO '$user'@'$host';
                	FLUSH PRIVILEGES;") or die(print_r($dbh->errorInfo(), true));
					$dbh=null;

			}
			catch (PDOException $e) {
				die("DB ERROR: ". $e->getMessage());
			}

		}

		public function connectDB(){
			$dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
			$options = array(PDO::ATTR_PERSISTENT => true, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

			try{
				$this->dbconnect = new PDO($dsn,$this->user,$this->pass,$options);
			}
			catch(PDOException $e){
				echo $e->getMessage();
				$this->dbconnect=null;
			}
		}

		public function retrieveData($sql){
			$stmt=$this->dbconnect->prepare($sql);
			$stmt->execute();
			return stmt;
		}

		public function insertData($sql){
			$connection=$this->dbconnect;
			$stmt=$connection->prepare($sql);
			$stmt->execute();
		}

	}
