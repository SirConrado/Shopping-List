<h1>Lista kategorii</h1>
<table>
	<tr>
		<th>Id</th>
		<th>Kategoria</th>
	</tr>
	<?php foreach($categories as $cat){ ?>
	<tr>
		<td><?php echo($cat['id']); ?></td>
		<td><?php echo($cat['nazwa']); ?></td>
	</tr>
	<?php } ?>
</table>
