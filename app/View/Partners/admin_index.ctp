<a href="/admin/partners/add">Добавить партнера</a>
<?php //debug($data) ?>
<table>
<tr>
		<th>Название</th>
		
		<th>Дествия</th>	
	</tr>

<?php foreach($data as $item): ?>
	<tr>
		<td><?=$item['Partner']['title']?> </td>
		<td><a href="partners/edit/<?=$item['Partner']['id']?>">Редактировать</a> 
	| <?php echo $this->Form->postLink('Удалить', array('action' => 'admin_delete', $item['Partner']['id']), array('confirm' => 'Подтвердите удаление')); ?></td>
</tr>
<?php endforeach ?>
</table>