
<ul class="breadcrumbs">
    <li class="breadcrumbs-item">
    <a href="/" class="breadcrumbs-item__link">Главная</a></li>
    <li class="breadcrumbs-item"><?=$user['User']['title']?></li>
</ul>
<div class="big-slogan">
   <?=$user['User']['h1']?>
</div>
    <div class="magazine">
        <div class="magazine-img">
            <img src="/img/user/thumbs/<?=$user['User']['img']?>" alt="<?=$user['User']['title']?>">
        </div>   
        <a href="tel:<?=$user['User']['phone']?>" class="magazine-item magazine-item__phone">
            <?=$user['User']['phone']?>
        </a>   
        <div class="magazine-item magazine-item__address">
           <?=$user['User']['address']?>
        </div>
        <a href="" class="magazine-item magazine-item__maps">
            <?=$user['User']['map']?>
        </a>
    </div>
<div class="content-product">
    <div class="product-slider">
        <div class="product-slider-name-container">
            <div class="product-slider-name button">
                <?php echo $cat['Category']['title'] ?>
            </div>
            <div class="product-slider-name button product-slider-name--accessories">
                Аксессуары
            </div>
            <?php if($user['User']['vk'] || $user['User']['instagram']): ?>
              <div class="product-description__podelitsia-soc-seti">
                Мы в социальных сетях: 
                <?php if($user['User']['instagram']): ?>
                <a target="_blank" href="https://www.instagram.com/<?=$user['User']['instagram']?>" class=" soc-seti_item insta">
                    <img src="/img/instagram.svg" alt="instagram">
                </a> 
                <?php endif ?>
                <?php if($user['User']['vk']): ?>
                <a target="_blank" href="https://vk.com/<?=$user['User']['vk']?>" class="soc-seti_item vk">
                    <img src="/img/vk.svg" alt="vk">
                </a>
                <?php endif ?>
            </div>
            <?php endif ?>

        </div>
        <div class="product-slider-content">
            <div class="product-slider-content__item active">
                <div class="slider-product" >
                 <?php if(!empty($products)): ?>
                <?php foreach($products as $item): ?>
                    <div class="slider__item">
                        <div class="slider_item_img">
                            <img src="/img/product/thumbs/<?=$item['Product']['img']?>" alt="<?=$item['Product']['title']?>">
                        </div>
                        <div class="product-description">
                              <div class="product-description__name">
                                  <?=$item['Product']['title']?>
                              </div>
                              <?=$item['Product']['body']?>
                              
                              <div class="product-description__item product-price">
                                  Цена (за сутки): <span><?=$item['Product']['price_day']?> KZT</span> 
                              </div>
                              <?php if($item['Product']['price_lot_of_days']): ?>
                              <div class="product-description__item product-price">
                                  Цена (от 5 суток): <span><?=$item['Product']['price_lot_of_days']?> KZT</span> 
                              </div>
                         	 <?php endif ?>
                              <div class="product-description__item product-size">
                                 Размеры:  <?=$item['Product']['size']?>
                              </div>
                              <div class="product-description__item product-bron">
                                 Бронь:  <?=$item['Product']['book']?> KZT
                              </div>
                              <div class="product-description__podelitsia">
                                  Расскажите о нас друзьям
                              </div>
                          </div>
                    </div>
                    <?php endforeach ?>
                    <?php else: ?>
               	<p>К сожалению в данном разделе еще не добавлена информация</p>
               <?php endif ?>
                </div>
            </div>
            <div class="product-slider-content__item">
                <div class="slider-product" >
                <?php if(!empty($accessories)): ?>
                <?php foreach($accessories as $item): ?>
                    <div class="slider__item">
                        <div class="slider_item_img">
                            <img src="/img/accessory/thumbs/<?=$item['Accessory']['img']?>" alt="<?=$item['Accessory']['title']?>">
                        </div>
                        <div class="product-description">
                              <div class="product-description__name">
                                  <?=$item['Accessory']['title']?>
                              </div>
                              <?=$item['Accessory']['body']?>
                             
                              <div class="product-description__item product-price">
                                  Цена (за сутки): <span><?=$item['Accessory']['price_day']?> KZT</span> 
                              </div>
                              <?php if($item['Accessory']['price_lot_of_days']): ?>
                              <div class="product-description__item product-price">
                                  Цена (от 5 суток): <span><?=$item['Accessory']['price_lot_of_days']?> KZT</span> 
                              </div>
                         	 <?php endif ?>
                         	 <?php if($item['Accessory']['size']): ?>
                              <div class="product-description__item product-size">
                                 Размеры:  <?=$item['Accessory']['size']?>
                              </div>
                              <?php endif ?>
                              <?php if($item['Accessory']['book']): ?>
                              <div class="product-description__item product-bron">
                                 Бронь:  <?=$item['Accessory']['book']?> KZT
                              </div>
                              <?php endif ?>
                              <div class="product-description__podelitsia">
                                  Расскажите о нас друзьям
                              </div>
                          </div>
                    </div>
                   <?php endforeach ?>
               <?php else: ?>
               	<p>К сожалению в данном разделе еще не добавлена информация</p>
               <?php endif ?>
                </div>
            </div>
        </div>
    </div>
    <div class="hypercomment"></div>
    <div class="o-nas">
        <div class="service-index_title">О компании</div>
        <p><?= $this->Text->truncate(strip_tags($user['User']['about']), 1000, array('ellipsis' => '...', 'exact' => true)) ?></p>
    </div>
    <div class="uslovia-prokata">
        <div class="uslovia-prokata__title title">
            Условия проката
        </div>
        <p><?= $this->Text->truncate(strip_tags($user['User']['conditions']), 1000, array('ellipsis' => '...', 'exact' => true)) ?></p>
    </div>
    
</div>