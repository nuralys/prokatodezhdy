<div class="big-slogan">
                   Свадебные платья напрокат в Астане - prokatastana
                </div>
                <ul class="breadcrumbs">
                    <li class="breadcrumbs-item">
                    <a href="/" class="breadcrumbs-item__link">Главная   </a>  </li>
                    <li class="breadcrumbs-item"> Свадебные платья напрокат в Астане - prokatastana</li>
                </ul>
                <aside class="side-bar">
                    <ul class="cabinet-list">
                        <li class="cabinet-list__item active">
                            <a href="" class="cabinet-list__item--link ">
                                Общая информация
                            </a>
                        </li>
                        <li class="cabinet-list__item">
                            <a href="/users/category" class="cabinet-list__item--link">
                                Свадебные платья
                            </a>
                        </li>
                        <li class="cabinet-list__item">
                            <a href="/users/accessory" class="cabinet-list__item--link">
                                Аксессуары
                            </a>
                        </li>
                    </ul>
                </aside>
                <div class="content-cabinet content-product ">
                    <div class="general-information">
                        <div class="general-information__title">
                          Общая информация
                        <?php 
echo $this->Form->create('User', array('type' => 'file'));?>
<div class="general-information-input_container login_icon">
<?php
echo $this->Form->input('img', array('label'=>'Изображение', 'class' =>'','type' => 'file'));
echo $this->Form->input('title', array('label'=>'','placeholder' => 'Название', 'class' =>'general-information-input input'));
echo $this->Form->input('phone', array('label' => 'Телефон', 'class' => ''));
echo $this->Form->input('about', array('label' => 'О компании', 'class' => ''));
echo $this->Form->input('conditions', array('label' => 'Условия:',));
echo $this->Form->input('instagram', array('label' => 'instagram', 'class' => ''));
echo $this->Form->input('vk', array('label' => 'vk:', 'class' => ''));
echo $this->Form->end('Редактировать');
?>
                    </div>
                </div>
