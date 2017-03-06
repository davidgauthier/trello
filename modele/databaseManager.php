<?php

class DatabaseManager
{
	


	private static $host 		= "localhost";
    private static $database 	= "trello";
    private static $username 	= "root";
    private static $password 	= "";

    public $bdd;


    protected function getBdd(){

		$bdd = new PDO('mysql:host='.self::$host.';dbname='.self::$database.';charset=utf8', self::$username, self::$password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		
		$this->bdd = $bdd;
	}

}


?>