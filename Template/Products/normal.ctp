<?php
 echo $this->Html->css('product');
 echo $this->Html->script('plusMinus');
?>
<dl class="sub-nav">
  <dt>Kategorie:</dt>
  <dd><a href="/products/index/żywność"><img src="/img/zywnosc.svg" width = "15" height = "15" style =  "margin-top: -5px;"> Żywność</a></dd>
  <dd><a href="/products/index/chemia"><img src="/img/chemia.svg" width = "15" height = "15" style =  "margin-top: -5px;"> Chemia</a></dd>
  <dd><a href="/products/index/narzędzia"><img src="/img/narzedzia.svg" width = "15" height = "15" style =  "margin-top: -5px;"> Narzędzia</a></dd>
  <dd><a href="/products/index/elektronika"><img src="/img/elektronika.svg" width = "15" height = "15" style =  "margin-top: -5px;"> Elektronika</a></dd>
  <dd><a href="/products/index/rozrywka"><img src="/img/rozrywka.svg" width = "15" height = "15" style =  "margin-top: -5px;"> Rozrywka</a></dd>
  <dd><a href="/products/index/praca"><img src="/img/praca.svg" width = "15" height = "15" style =  "margin-top: -5px;"> Praca</a></dd>
  <dd><a href="/products/index/nauka"><img src="/img/nauka.svg" width = "15" height = "15" style =  "margin-top: -5px;"> Nauka</a></dd>
  <dd><a href="/products/index/ubrania"><img src="/img/ubrania.svg" width = "15" height = "15" style =  "margin-top: -5px;"> Ubrania</a></dd>
</dl>
<h1>Lista Produktów</h1>
<table style=" margin: 0 auto;">
		<tr>
			<th width = "150">Produkt</th>
			<th width = "150">Sklep</th>
			<th width = "240">Opis</th>
			<th width = "100">Kategoria</th>
			<th width = "150">Ilość</th>
			<th width = "200">Dodaj</th>
		</tr>
	</div>
	<?php
	$categories->all();
    $categoriesArray = $categories
    ->toArray();
    $shops->all();
  	$shopsArray = $shops->toArray();
     ?>
	<?php foreach($products as $product){ ?>
	<tr> 
		<form name = "dodaj" type = "get" url = "/ShoppingLists/add" id = "form<?php echo($product['id']); ?>">
		<input form = "form<?php echo($product['id']); ?>" type = "hidden" name = "id" value = "<?php echo($product['id']); ?>">
		</form>
		<td  style = "padding-top: 35px;"><h6><?php echo($product['nazwa']); ?></td></h6></div>
		<td form = "form<?php echo($product['id']); ?>" style = "padding-top: 35px;">
		<select name = "sklep" form = "form<?php echo($product['id']); ?>"> 
		<option value = "0">dowolny</opction>
		<?php foreach($shopsArray as $shopArray){ ?>
		<option value ="<?php echo($shopArray['id']); ?>"><?php echo($shopArray['nazwa']); ?></option>
		<?php } ?>
		</select>
		</td>
		<td  style = "padding-top: 35px;"><h6><?php echo($product['opis']); ?></h6></td>
		<td  style = "padding-top: 35px;"><h6><?php echo($categoriesArray[$product['id_kategorii'] - 1]->nazwa); ?></h6></td>
		<td  style = "padding-top: 35px; ">
		<img src = "/img/minus.svg" width = "20" height = "20" style = "display: inline-block; margin-right: 10px;" onclick = "minus(<?php echo($product['id']); ?>)"/>
		<input form = "form<?php echo($product['id']); ?>" type = "number" step = "0.1" min = "0.1" id = "ilosc_<?php echo($product['id']); ?>" name = "ilosc" style = "width: 60px; display: inline-block;" value = "1" />
		<img src = "/img/plus.svg" width = "20" height = "20"  style = "display: inline-block; margin-left: 10px;" onclick = "plus(<?php echo($product['id']); ?>)"/> </td>
		<td style = "padding-top: 35px;">
		<input form = "form<?php echo($product['id']); ?>" type = "image" src = "/img/add.svg" width = "35" height = "35" style = "display: inline-block; margin-right: 5px; margin-left: 5px;" formaction = "/ShoppingLists/add">
	</td>
	</form>
	</tr>
	<?php } ?>
	<tr>
	<?php $products->all();
  	$productsArray = $products->toArray(); ?>
		<form name = "dodajNowy" type = "get" url = "/ShoppingLists/addNew" id = "formNew">
		<td style = "padding-top: 35px;"><input form = "formNew" name = "nazwa" type = "text"></td>
		<td style = "padding-top: 35px;">
		<select name = "sklep" form = "formNew"> 
			<option value = "0">dowolny</opction>
			<?php foreach($shopsArray as $shopArray){ ?>
			<option value ="<?php echo($shopArray['id']); ?>"><?php echo($shopArray['nazwa']); ?></option>
		<?php } ?></td>
		<td style = "padding-top: 35px;"><input form = "formNew" name = "opis" type = "text"></td>
		<td style = "padding-top: 35px;">
		<select name = "kategoria" form = "formNew"> 
			<?php foreach($categoriesArray as $categoryArray){ ?>
			<option value ="<?php echo($categoryArray['id']); ?>"><?php echo($categoryArray['nazwa']); ?></option>
		<?php } ?>\
		</td>
		<td style = "padding-top: 35px;">
		<img src = "/img/minus.svg" width = "20" height = "20" style = "display: inline-block; margin-right: 10px;" onclick = "minus(<?php echo(count($productsArray) + 1);?>)"/>
		<input form = "formNew" type = "number" step = "0.1" min = "0.1" id = "ilosc_<?php echo(count($productsArray) + 1); ?>" name = "ilosc" style = "width: 60px; display: inline-block;" value = "1" />
		<img src = "/img/plus.svg" width = "20" height = "20"  style = "display: inline-block; margin-left: 10px;" onclick = "plus(<?php echo(count($productsArray) + 1); ?>)"/> </td>
		</td>
		<td style = "padding-top: 35px;">
		<input form = "formNew" type = "image" src = "/img/add.svg" width = "35" height = "35" style = "display: inline-block; margin-right: 5px; margin-left: 5px;" formaction = "/ShoppingLists/addNew">
		</td>
	</tr>
</table>