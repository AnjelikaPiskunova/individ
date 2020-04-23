<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
            <li
<?=($_SERVER['PHP_SELF']=='/index.php')?'class="active"':'';?>>
                <a href="index.php"><i class="fa fa-calendar"></i><span>Главная</span></a>
            </li>
            <li class="header">Основа</li>
            <li <?=($_SERVER['PHP_SELF']=='/list-recept.php')?'class="active"':'';?>>
                <a href="list-recept.php"><i class="fa fa-users"></i><span>Рецепты</span></a>
            </li>
            <li <?=($_SERVER['PHP_SELF']=='/list-product.php')?'class="active"':'';?>>
                <a href="list-product.php"><i class="fa fa-users"></i><span>Продукты</span></a>
            </li>
        </ul>
    </section>
</aside>