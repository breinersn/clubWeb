<?php

class Conexion{

	static public function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=myspee_club_speedy",
			            "myspee_speedy",
			            "Speedy@2020$");
		$link->exec("set names utf8");

		return $link;

	}

}