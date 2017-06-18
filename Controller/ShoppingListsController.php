<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Symfony\Component\Debug\Tests\Fixtures\ToStringThrower;
use Cake\Validation\Validator;
use Cake\Datasource\ConnectionManager;

class ShoppingListsController extends  AppController{
	public $helpers = array('Html','Form');
	
	
	public function add(){
		$validator = new Validator();
		$id = strip_tags(($this->request->getQuery('id')));
		$ilosc = strip_tags(($this->request->getQuery('ilosc')));
		$sklep = strip_tags(($this->request->getQuery('sklep')));
		$connection = ConnectionManager::get('default');
		$connection->insert('shoppingslists', [
					'id_produktu' => $id,
					'id_sklepu' => $sklep,
					'ilosc' => $ilosc
			]);
		$products = TableRegistry::get('Products')->find();
		$products->all();
		$productsArray = $products->toArray();
		$shops = TableRegistry::get('Shops')->find();
		$shops->all();
		$shopsArray = $shops->toArray();
		?><div style = "display: block;" id = "toClose" data-alert class="alert-box success radius">
		  Dodano <?php echo $productsArray[$id - 1]->nazwa ?>, w ilości: <?php echo $ilosc ?>, w sklepie: <?php 
		  if($sklep == 0) echo "dowolny";
		  else echo $shopsArray[$sklep - 1]->nazwa; ?>
		  <button class = "close" onclick = 'document.getElementById("toClose").style.display = "none"'>x</button>
		</div>
		<?php
		$this->index();
	}
	public function addNew(){
		$validator = new Validator();
		$nazwa = strip_tags(($this->request->getQuery('nazwa')));
		$ilosc = strip_tags(($this->request->getQuery('ilosc')));
		$sklep = strip_tags(($this->request->getQuery('sklep')));
		$opis = strip_tags(($this->request->getQuery('opis')));
		$kategoria = strip_tags(($this->request->getQuery('kategoria')));
		$connection = ConnectionManager::get('default');
		$connection->insert('products', [
				'nazwa' => $nazwa,
				'opis' => $opis,
				'id_kategorii' => $kategoria
		]);
		$connection = ConnectionManager::get('default');
		$products = TableRegistry::get('Products')->find('all', ['limit' => 1,'conditions' =>['Products.nazwa' => $nazwa]]);
		$products->all();
		$productsArray = $products->toArray();
		$shops = TableRegistry::get('Shops')->find('all');
		$shops->all();
		$shopsArray= $shops->toArray();
		//echo ($productsArray[count($productsArray) - 1]->id);
		$connection->insert('shoppingslists', [
				'id_produktu' => $productsArray[count($productsArray) - 1]->id,
				'id_sklepu' => $sklep,
				'ilosc' => $ilosc
		]);
		?><div style = "display: block;" id = "toClose" data-alert class="alert-box success radius">
		  Dodano <?php echo $nazwa?>, w ilości: <?php echo $ilosc ?>, w sklepie: <?php 
		  if($sklep == 0) echo "dowolny";
		  else echo $shopsArray[$sklep - 1]->nazwa; ?>
		  <button class = "close" onclick = 'document.getElementById("toClose").style.display = "none"'>x</button>
		</div>
		<?php
		$this->index();
	}
	public function change(){
		$validator = new Validator();
		$id = strip_tags(($this->request->getQuery('id')));
		$ilosc = strip_tags(($this->request->getQuery('ilosc')));
		$connection = ConnectionManager::get('default');
		$connection->update('shoppingslists', ['ilosc' => $ilosc], ['id' => $id]);
		$this->index();
	}
	public function remove(){
		$validator = new Validator();
		$id = strip_tags(($this->request->getQuery('id')));
		$ilosc = strip_tags(($this->request->getQuery('ilosc')));
		$connection = ConnectionManager::get('default');
		$connection->delete('shoppingslists', ['id' => $id]);
		$this->index();
	}
	public function index(){
		$this->set('products', TableRegistry::get('Products')->find());
		$this->set('categories', TableRegistry::get('Categories')->find());
		$this->set('shops', TableRegistry::get('Shops')->find());
		$this->set('shoppingLists', TableRegistry::get('Shoppingslists')->find('all',['order' => ['Shoppingslists.id' => 'ASC' ]]));
		if($this->checkIsMobile())
			$this->render("mobile");
		else
			$this->render("normal");
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