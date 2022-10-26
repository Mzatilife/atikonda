<?php
class Dbh{
	private $host = "localhost";
	private $user = "u289533873_dratikonda";
	private $pwd = "8085@Must.Upie";
	private $dbname = "u289533873_atikonda";

	protected function connect(){
	$dsn = 'mysql:host=' . $this->host . ';dbname='. $this->dbname;
	$pdo =  new PDO($dsn, $this->user, $this->pwd, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    return $pdo;
	}
}

?>