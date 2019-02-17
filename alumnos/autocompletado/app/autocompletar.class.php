<?php
header('Access-Control-Allow-Origin: *');  
class Autocompletar
{

	private $dbh;

	public function __construct()
	{
		$this->dbh = new PDO("mysql:host=localhost;dbname=valdoco;charset=UTF8", "root", "");
        
        
	}

	public function findData($search)
	{
		$query = $this->dbh->prepare("SELECT Nombre_articulo, Codigo FROM catalogo WHERE Nombre_articulo LIKE :search");
        $query->execute(array(':search' => '%'.$search.'%'));
        $this->dbh = null;
        if($query->rowCount() > 0)
        {
        	echo json_encode(array('res' => 'full', 'data' => $query->fetchAll()));
        }
        else
        {
        	echo json_encode(array('res' => 'empty'));
        }
	}
}