<div class="big-slogan">
   Свадебные платья напрокат в Астане - prokatastana
</div>
<ul class="breadcrumbs">
    <li class="breadcrumbs-item">
    <a href="/" class="breadcrumbs-item__link">Главная   </a>  </li>
    <li class="breadcrumbs-item"> Свадебные платья напрокат в Астане - prokatastana</li>
</ul>
<aside class="side-bar">
    <div class="magazine">
        <div class="magazine-img">
            <img src="img/magazine.jpg" alt="">
        </div>   
        <a href="tel:+77777788999" class="magazine-item magazine-item__phone">
            +7  (777) 777-77-77
        </a>   
        <div class="magazine-item magazine-item__address">
            г. Астана, Кунаева 35
        </div>
        <a href="" class="magazine-item magazine-item__maps">
            показать на карте
        </a>
    </div>
</aside>
<div class="content-product">
    <div class="product-slider">
        <div class="product-slider-name-container">
            <div class="product-slider-name button">
                Свадебные платья
            </div>
            <div class="product-slider-name button product-slider-name--accessories">
                Аксессуары
            </div>
             <div class="product-description__podelitsia-soc-seti">
                  Мы в социальных сетях:
                    
              </div>  
        </div>
        <div class="product-slider-content">
            <div class="product-slider-content__item active">
                <div class="slider-product" >
                <?php foreach($data['Product'] as $item): ?>
                    <div class="slider__item">
                        <div class="slider_item_img">
                            <img src="/img/product/thumbs/<?=$item['img']?>" alt="<?=$item['title']?>">
                        </div>
                        <div class="product-description">
                              <div class="product-description__name">
                                  <?=$item['title']?>
                              </div>
                              <?=$item['body']?>
                              <select name="" id="" class="product-description__select">
                                  <option value="">Выбрать срок аренды</option>
                                  <option value="">год</option>
                                  <option value="">10 лет</option>
                              </select>
                              <div class="product-description__item product-price">
                                  Цена: <span>3000 KZT</span> 
                              </div>
                              <div class="product-description__item product-size">
                                 Размеры:  36, 38, 40, 42, 44
                              </div>
                              <div class="product-description__item product-bron">
                                 Бронь:  1000 KZT
                              </div>
                              <div class="product-description__podelitsia">
                                  Расскажите о нас друзьям
                              </div>
                          </div>
                    </div>
                    <?php endforeach ?>
                </div>
            </div>
            <div class="product-slider-content__item">
                <div class="slider-product" >
                <?php foreach($data['Accessory'] as $item): ?>
                    <div class="slider__item">
                        <div class="slider_item_img">
                            <img src="/img/accessory/thumbs/<?=$item['img']?>" alt="<?=$item['title']?>">
                        </div>
                        <div class="product-description">
                              <div class="product-description__name">
                                  <?=$item['title']?>
                              </div>
                              <?=$item['body']?>
                              <select name="" id="" class="product-description__select">
                                  <option value="">Выбрать срок аренды</option>
                                  <option value="">год</option>
                                  <option value="">10 лет</option>
                              </select>
                              <div class="product-description__item product-price">
                                  Цена: <span>3000 KZT</span> 
                              </div>
                              <div class="product-description__item product-size">
                                 Размеры:  36, 38, 40, 42, 44
                              </div>
                              <div class="product-description__item product-bron">
                                 Бронь:  1000 KZT
                              </div>
                              <div class="product-description__podelitsia">
                                  Расскажите о нас друзьям
                              </div>
                          </div>
                    </div>
                   <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
    
    <div class="hypercomment"></div>
    <div class="o-nas">
        <div class="service-index_title">О сервисе</div>
        <p><span>Название сервиса</span> - popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very </p>
    </div>
    <div class="uslovia-prokata">
        <div class="uslovia-prokata__title title">
            Условия проката
        </div>
        <p>
            <span>Название сервиса </span>- popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very 
        </p>
    </div>
</div>