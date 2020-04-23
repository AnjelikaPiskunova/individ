<?php
require_once 'autoload.php';
$size = 5;
if (isset($_GET['page'])) {
    $page = Helper::clearInt($_GET['page']);
} else {
    $page = 1;
}
$productMap = new productMap();
$count = $productMap->count();
$products = $productMap->findAll($page*$size-$size, $size);
$header = 'Список продуктов ';
require_once 'template/header.php';
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <section class="content-header">
                <h1><?=$header;?></h1>
                <ol class="breadcrumb">
                <li><a href="/index.php"><i class="fa fa-dashboard"></i> Главная</a></li>
                <li class="active"><?=$header;?></li>
                </ol>
            </section>
            <div class="box-body">

            <a class="btn btn-success" href="add-product.php">Добавить продукт</a>

            </div>
            <div class="box-body">
            <?php
            if ($products) {
            ?>
            <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>Название продукта</th>
                <th>Рецепт</th>
                
            </tr>
            </thead>    
            <tbody>
            <?php
            foreach ($products as $product) {
            echo '<tr>';
            echo '<td><a href="view-product.php?id='.$product->product_id.'">'.$product->name.'</a> '. '<a href="add-product.php?id='.$product->product_id.'"><i class="fa fa-pencil"></i></a></td>';
            echo '<td>'.($product->recept_id).'</td>';
            echo '</tr>';
            }
            ?>
            </tbody>
            </table>
            <?php } else {
            echo 'Ни одного продукта не найдено';
            } ?>
            </div>
            <div class="box-body">
                <?php Helper::paginator($count, $page,$size); ?>
            </div>
        </div>
    </div>
</div>
<?php
require_once 'template/footer.php';
?>