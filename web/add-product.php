<?php
require_once 'autoload.php';
$id = 0;
if (isset($_GET['id'])) {
    $id = Helper::clearInt($_GET['id']);
}
$product = (new ProductMap())->findById($id);
$header = (($id)?'Редактировать':'Добавить').' Продукт';
require_once 'template/header.php';
?>
<section class="content-header">
    <h1><?=$header;?></h1>
    <ol class="breadcrumb">

        <li><a href="/index.php"><i class="fa fa-dashboard"></i> Главная</a></li>

        <li><a href="list-product.php">Продукты</a></li>
        <li class="active"><?=$header;?></li>
    </ol>
</section>
<div class="box-body">
    <form action="save-product.php" method="POST">
    
        <div class="form-group">
                <label>Название</label>
                <input type="text" class="form-control" name="name" required="required" value="<?=$recept->name;?>">
        </div>


        <div class="form-group">
            <label>Рецепт</label>
            <select class="form-control" name="recept_id">
            <?= Helper::printSelectOptions($product->recept_id, (new ReceptMap())->arrRecepts());?>
            </select>
        </div>



        <!--Кнопка сохранения -->  
        <div class="form-group">
            <button type="submit" name="saveProduct" class="btn btn-primary">Сохранить</button>
        </div>
        <input type="hidden" name="product_id" value="<?=$id;?>"/>
    </form>
</div>
<?php
require_once 'template/footer.php';
?>