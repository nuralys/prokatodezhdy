<div class="big-slogan">
    <h1><?=$page['Page']['h1']?></h1>
</div>

<!-- <div class="select_city-container">
    <form action="">
        <select class="select  svadebnoe-plate">
            <option value="">Выберите город</option>
            <option value="">Астана</option>
            <option value="">Алматы</option>
            <option value="">Актау</option> 
        </select>

        <select class="select  vechernie_platia ">
            <option value="">Выберите город</option>
            <option value="">Астана</option>
            <option value="">Алматы</option>
            <option value="">Актау</option> 
        </select>
        <select class="select  muzhskie_kostium">
            <option value="">Выберите город</option>
            <option value="">Астана</option>
            <option value="">Алматы</option>
            <option value="">Актау</option> 
        </select>
        <select class="select  detskaia_odezhda">
            <option value="">Выберите город</option>
            <option value="">Астана</option>
            <option value="">Алматы</option>
            <option value="">Актау</option> 
        </select>

    </form>
</div>  -->
<ul class="product_button">
    
    <li class="product_button-item product_button-item--svadebnoe_plate">
        <!-- <a href="/city/astana/svadebnye_platjya">
        </a> -->
        <div class="product_button-name ">
                свадебные платья
        </div>  
        <ul class="city-list">
            <div class="city-list-head">
                Выберите город
            </div>
            <?php foreach($cats[0]['City'] as $item): ?>
           <li class="city-list_item"><a href="/city/<?=$item['alias']?>/svadebnye-platjya" class="city-list_item-link"><?=$item['title']?></a></li>
            <?php endforeach ?>
        </ul>
    </li>
  
    <li class="product_button-item product_button-item--vechernie_platia">
        <div class="product_button-name ">
            вечерние платья
        </div>
        <ul class="city-list">
        <div class="city-list-head">
            Выберите город
        </div>
           <li class="city-list_item"><a href="" class="city-list_item-link">Астана</a></li>
            <li class="city-list_item"><a href="" class="city-list_item-link">Алматы</a></li>
            <li class="city-list_item"><a href="" class="city-list_item-link">Актау</a></li>
            <li class="city-list_item"><a href="" class="city-list_item-link"></a></li>
            <li class="city-list_item"><a href="" class="city-list_item-link"></a></li> 
        </ul>
    </li>

    <li class="product_button-item product_button-item--muzhskie_kostium">
        <div class="product_button-name ">
            мужские костюмы
        </div>
        <ul class="city-list">
            <div class="city-list-head">
                Выберите город
            </div>
           <li class="city-list_item"><a href="" class="city-list_item-link">Астана</a></li>
            <li class="city-list_item"><a href="" class="city-list_item-link">Алматы</a></li>
            <li class="city-list_item"><a href="" class="city-list_item-link">Актау</a></li>
            <li class="city-list_item"><a href="" class="city-list_item-link"></a></li>
            <li class="city-list_item"><a href="" class="city-list_item-link"></a></li> 
        </ul>
    </li>
    <li class="product_button-item product_button-item--detskaia_odezhda">
        <div class="product_button-name ">
            детская одежда
        </div>
        <ul class="city-list">
            <div class="city-list-head">
                Выберите город
            </div>
           <li class="city-list_item"><a href="" class="city-list_item-link">Астана</a></li>
            <li class="city-list_item"><a href="" class="city-list_item-link">Алматы</a></li>
            <li class="city-list_item"><a href="" class="city-list_item-link">Актау</a></li>
            <li class="city-list_item"><a href="" class="city-list_item-link"></a></li>
            <li class="city-list_item"><a href="" class="city-list_item-link"></a></li> 
        </ul>
    </li>
</ul>
<div class="news-stati">
    <div class="news-stati-title">
        Новости и статьи
    </div>
    <div class="news-big">
        <div class="date">
            
            <div class="date_big"><?php echo $this->Time->format($first_news['News']['date'], '%d', 'invalid'); ?></div>
            
            <span><?php echo $this->Time->format($first_news['News']['date'], '%m', 'invalid'); ?></span>
            <span><?php echo $this->Time->format($first_news['News']['date'], '%Y', 'invalid'); ?></span>
        </div>
        <div class="news-big__img">
            <img src="/img/news/<?=$first_news['News']['img']?>" alt="<?=$first_news['News']['title']?>">
        </div>
        <a href="/news/<?=$first_news['News']['alias']?>" class="news-big__title"><?=$first_news['News']['title']?></a>
    </div>
    <div class="news-item-list">
        <?php foreach($other_news as $item): ?>
        <div class="news-item">
            <div class="date">
                <div class="date_big"><?php echo $this->Time->format($item['News']['date'], '%d', 'invalid'); ?></div>
                
                <span><?php echo $this->Time->format($item['News']['date'], '%m', 'invalid'); ?></span>
                <span><?php echo $this->Time->format($item['News']['date'], '%Y', 'invalid'); ?></span>
            </div>
            <div class="news-item__img">
                <img src="/img/news/thumbs/<?=$item['News']['img']?>" alt="<?=$item['News']['title']?>">
            </div>
            <a href="/news/<?=$item['News']['alias']?>" class="news-item__title"><?=$item['News']['title']?>
            </a>
        </div>
    <?php endforeach ?>
    </div>
</div>
<div class="service-index">
    <div class="slider" >
        <div class="slider__item">
            <div class="slider_item_img">
                <img src="img/slider.jpg" alt="">
            </div>
        </div>
        <div class="slider__item">
            <div class="slider_item_img">
                <img src="img/slider.jpg" alt="">
            </div>
        </div>
        <div class="slider__item">
            <div class="slider_item_img">
                <img src="img/slider.jpg" alt="">
            </div>
        </div>
    </div>
    <div class="service-index_text">
        <div class="service-index_title">О сервисе</div>
        <?php echo $page['Page']['body'] ?>
    </div>
</div>