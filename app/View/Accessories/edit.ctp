<?php 
echo $this->Form->create('Accessory', array('type' => 'file'));
echo $this->Form->input('title', array('label' => 'Название:'));
echo $this->Form->input('img', array('label' => 'Изображение:', 'type' => 'file'));
echo $this->Form->input('body', array('label' => 'Текст:', 'id' => 'editor'));
echo $this->Form->input('price_day', array('label' => 'Цена (за сутки):'));
echo $this->Form->input('price_lot_of_days', array('label' => 'Цена (от 5 суток):'));
echo $this->Form->input('book', array('label' => 'Бронь:'));
echo $this->Form->input('size', array('label' => 'Размеры:'));
echo $this->Form->input('keywords', array('label' => 'Ключевые слова:'));
echo $this->Form->input('description', array('label' => 'Описание:'));
echo $this->Form->end('Редактировать');
?>