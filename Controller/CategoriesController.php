<?php
namespace App\Controller;
use App\Controller\AppController;

class CategoriesController extends AppController{
	public $helpers = array('Html','Form');
	
	public function index(){
		$this->set('categories', $this->Categories->find());
		
	}
}
?>