<?php
 echo $this->Html->css('product');
 echo $this->Html->script('plusMinus');
?>
<h1>Lista Zakupów</h1>
<table style=" margin: 0 auto;">
		<tr>
			<th width = "150">Produkt</th>
			<th width = "240">Opis</th>
			<th width = "120">Kategoria</th>
			<th width = "120">Sklep</th>
			<th width = "150">Ilość</th>
			<th width = "200">Zakupiony</th>
		</tr>
	</div>
	<?php
	$products->all();
    $productsArray = $products->toArray();
	$categories->all();
    $categoriesArray = $categories->toArray();
     $shops->all();
    $shopsArray = $shops->toArray();
     ?>
	<?php foreach($shoppingLists as $shoppingList){ ?>
	
	<tr>
	<?php 
	echo $this->Form->create('shoppingList', [ 'controller' => 'ShoppingLists', 'type' => 'get', 'id' => 'form_id' . ($shoppingList['id'])]); ?>
		<input form = "form_id<?php echo $shoppingList['id']; ?>" type = "hidden" name = "id" value = "<?php echo $shoppingList['id']; ?>">
		<td  style = "padding-top: 35px;"><h6><?php echo($productsArray[$shoppingList['id_produktu'] - 1]->nazwa); ?></td></h6></div>
		<td  style = "padding-top: 35px;"><h6><?php echo($productsArray[$shoppingList['id_produktu'] - 1]->opis); ?></h6></td>
		<td  style = "padding-top: 35px;"><h6><?php echo($categoriesArray[$productsArray[$shoppingList['id_produktu'] - 1]->id_kategorii - 1]->nazwa); ?></h6></td>
		<td  style = "padding-top: 35px; ">
		
		<h6><?php 
		if(($shoppingList['id_sklepu']) == 0) echo "dowolny";
		else
		echo($shopsArray[$shoppingList['id_sklepu'] - 1]->nazwa); ?></h6>
		</td>
		<td  style = "padding-top: 35px; ">
		<img src = "/img/minus.svg" width = "20" height = "20" style = "display: inline-block; margin-right: 10px;" onclick = "minus(<?php echo($shoppingList['id']); ?>)"/>
		<input form = "form_id<?php echo($shoppingList['id']); ?>" name = "ilosc" type = "number"  step = "0.1" min = "0.1" value ="<?php echo($shoppingList['ilosc']);?>" id = "ilosc_<?php echo($shoppingList['id']); ?>" style = "width: 60px; display: inline-block;">
		<img src = "/img/plus.svg" width = "20" height = "20"  style = "display: inline-block; margin-left: 10px;" onclick = "plus(<?php echo($shoppingList['id']); ?>)"/> </td>
		
		<td style = "padding-top: 40px;">
		
		<input form = "form_id<?php echo($shoppingList['id']); ?>" type = "image" src = "/img/pencil.svg" width = "20" height = "20" style = "display: inline-block; margin-right: 10px; margin-left: 15px;" formaction = "/ShoppingLists/change">
		
		<input form = "form_id<?php echo($shoppingList['id']); ?>" type = "image" src = "/img/remove.svg" width = "20" height = "20" style = "display: inline-block; margin-left: 10px;" formaction = "/ShoppingLists/remove">
		</td>
		
	<?php echo $this->Form->end(); ?>
	</tr>
	<?php } ?>
</table>
