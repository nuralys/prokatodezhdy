 <?php if(!empty($category)): ?>
<table>
	<tr>
		<th>ID</th>
		<th>Изображение</th>
		<th>Название</th>
		<th>Дествия</th>	
	</tr>
 	<?php foreach($category['Product'] as $item): ?>
 	<tr>
 		<td><?=$item['id']?></td>
 		<td><img src="/img/product/thumbs/<?=$item['img']?>"></td>
 		<td><?=$item['title']?></td>
 		<td><a href="/users/edit/<?=$item['id']?>">Редактировать</a> |
			<?php echo $this->Form->postLink('Удалить', array('action' => 'admin_delete', $item['id']), array('confirm' => 'Подтвердите удаление')); ?></td>

	<?php endforeach ?>
	</tr>
</table>
<?php else: ?>
<p>К сожалению в данном разделе еще не добавлена информация...</p>
<?php endif ?>