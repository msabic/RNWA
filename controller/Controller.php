<?php
include_once("model/Model.php");

class Controller {
	public $model;
	
	public function __construct()  
    {  
        $this->model = new Model();

    } 
	
	public function invoke()
	{
		if (!isset($_GET['Nekretnina']))
		{
			
			$nekretninas = $this->model->getNekretnina();
			include 'view/nekretnina.php';
		}
		else
		{
			
			$nekretnina = $this->model->getNekretnine($_GET['Nekretnina']);
			include 'view/viewnek.php';
		}
	}
}

?>