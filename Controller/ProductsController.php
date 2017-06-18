<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class ProductsController extends  AppController{
	public $helpers = array('Html','Form');
	
	//var $helpers = array('Form', 'Html', 'CategoriesHelper');
	
	public function index($cat = NULL){
		if(!$cat)
		$this->set('products',$this->Products->find('all',['order' => ['Products.nazwa' => 'ASC' ]]));
		else {
			$category = TableRegistry::get('Categories')->find('all', ['limit' => 1, 'conditions' =>['Categories.nazwa' => $cat]]);
			$category->all();
			$categoryArray = $category->toArray();
			$this->set('products',$this->Products->find('all',['order' => ['Products.nazwa' => 'ASC' ], 'conditions' =>['Products.id_kategorii' => $categoryArray[0]->id]]));
		}
		$this->set('categories', TableRegistry::get('Categories')->find());
		$this->set('shops', TableRegistry::get('Shops')->find());
		if($this->checkIsMobile())
			$this->render("mobile");
		else
			$this->render("normal");
			//$this->beforeRender();
	}
	public function jedzenie(){
		index("jedzenie");
	}
	public function checkIsMobile(){
		$iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
		$android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
		$palmpre = strpos($_SERVER['HTTP_USER_AGENT'],"webOS");
		$berry = strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
		$ipod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");
		
		if($iphone || $android || $palmpre || $ipod || $berry == true)
		{
			return true;
		}
	}
}
?>