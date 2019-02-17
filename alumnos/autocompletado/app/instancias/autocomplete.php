<?php
    header('Access-Control-Allow-Origin: *');  
	require_once("../autocompletar.class.php");
	$search = $_POST["autocomplete"];
	$autocompletar = new Autocompletar();
	$autocompletar->findData($search);
