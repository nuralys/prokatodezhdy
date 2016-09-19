<ul class="links">
                        <?php if(AuthComponent::user()) : ?>
                            <li><a href="/" title="Log In">Сайт</a></li>
                            <li><a href="/admin/" title="Log In">Админка</a></li>
                            <li class=" last"><a href="/users/logout" title="Log In">Log Out</a></li>
                        <?php else : ?>
                            <li class=" last"><a href="/users/login" title="Log In">Log In</a></li>
                        <?php endif; ?>
                    </ul>
<header>
    <div class="cr">
        <div class="header">
            <a href="/" class="header-logo logo">
                <img src="/img/logo.png" alt="Сервис проката одежды">
                <span>логотип</span>
            </a>
            <div class="header-slogan">Сервис проката одежды</div>
            <div class="header-item">
                <a href="" class="header-item__vk">
                    vk.com/example
                </a>
                <a href="/news" class="header-item__button button">
                    Новости и статьи
                </a>
                <div class="header-item__search search">
                    <form action="">
                        <input placeholder="Поиск по сайту" class="search-input" type="text" name="q">
                        <div class="search-button">
                            <button type="submit"></button>
                            <span class="over-search"> </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>