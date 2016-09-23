<footer>
    <div class="cr">
        <div class="footer">
            <a href="" class="header-logo logo">
                <img src="/img/logo.png" alt="Сервис проката одежды">
                <span>логотип</span>
            </a>
            <div class="header-slogan">Сервис проката одежды</div>
            <div class="footer-item">
                <a href="/feedback" class="obratnaia-svaz button">
                    Обратная связь
                </a>
                <?php if($admin=='false'): ?>
                <?php if(AuthComponent::user()) : ?>
                <a href="/users/cabinet" class="lichni-cab button">Личный кабинет</a>
        <a href="/users/logout" class="lichni-cab button">Выход</a>
    <?php else : ?>
        <a href="/users/cabinet" class="lichni-cab button">Личный кабинет</a>
    <?php endif; ?>
<?php endif ?>
            </div>
            <div class="copy-developed-container">
                <p class="copyright">Copyright 2016. Все права защишены</p>
                <div class="developed">
                    Сайт разработан
                    <a href="http://astanacreative.kz" target="_blank"> <img src="/img/astanacreative.png" alt="Создание и разработка сайтов"></a>
                </div>
                </div>
        </div>
    </div>
</footer>