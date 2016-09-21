 <?php if(empty($search_res)): ?>
 	<p>К сожалению по данному запросу не найден результат...</p>
 <?php elseif(is_array($search_res)): ?>
	<ul class="search-list">
		<?php foreach($search_res as $item): ?>
		<li class="search-item">
			<div class="search-item_container">
				<div class="search-img">
					<img src="/img/product/thumbs/<?=$item['Product']['img']?>">
				</div>
				<a href="/product/<?=$item['Product']['id']?>" class="search-name">
					<?php foreach($cities as $city): ?>
						<?php if($city['City']['id'] == $item['User']['city_id']): ?>
							<?php echo $city['City']['alias'] ?>
						<?php endif ?>
					<?php endforeach ?>
					<?=$item['Product']['title']?>
				</a>
			</div>
		</li>
		<?php endforeach ?>
	</ul> 	 	
<?php elseif(!is_array($search_res)): ?>
	<p><?php echo $search_res; ?></p>
<?php endif ?>
	
