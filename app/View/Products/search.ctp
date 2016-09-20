 <?php if(empty($search_res)): ?>
 	<p>К сожалению по данному запросу не найден результат...</p>
 <?php elseif(is_array($search_res)): ?>
	<table>
		<tr>
			<th>Изображение</th>
			<th>Название</th>
		</tr>
	 	<?php foreach($search_res as $item): ?>
		 	<tr>
		 		<td><img src="/img/product/thumbs/<?=$item['Product']['img']?>"></td>
		 		<td><a href="/product/<?=$item['Product']['id']?>"><?=$item['Product']['title']?></td>
			</tr>
		<?php endforeach ?>
	</table>
<?php elseif(!is_array($search_res)): ?>
	<p><?php echo $search_res; ?></p>
<?php endif ?>