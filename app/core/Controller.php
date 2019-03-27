<?php 

// ini merupakan class utama/parent class
class Controller {

	// method view
	public function view($view, $data = [])
	{
		// memanggil file yang ada di folder views 
		require_once '../app/views/' . $view . '.php';
	}

	// method model
	public function model($model)
	{
		// memanggil file yang ada di folder models
		require_once '../app/models/' . $model . '.php';
		// instansiasi
		return new $model;
	}

}