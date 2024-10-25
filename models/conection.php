<?php 

	class Conection{

		static public function conect(){

			$link = new PDO("mysql:host=localhost;dbname=alxsanblog",
			"root",
			"");

			$link->exec("set names utf8");

			return $link;

		}

	}