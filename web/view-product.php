<?php
require_once 'autoload.php';

if (isset($_GET['id'])) {
    $id = Helper::clearInt($_GET['id']);
    $product = (new ProductMap())->findViewById($id);
    $header = 'Просмотр продукта';
    require_once 'template/header.php';
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <section class="content-header">
                <h1><?=$header;?></h1>
                <ol class="breadcrumb">
                    <li><a href="index.php"><i class="fa fa-dashboard"></i> Главная</a></li>
                    <li><a href="list-product.php">Продукты</a></li>
                    <li class="active"><?=$header;?></li>
                </ol>
            </section>
            <div class="box-body">
                <a class="btn btn-success" href="add-product.php?id=<?=$id;?>">Изменить</a>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-hover">
                    
                    <tr>
                        <th>Название продукта</th>
                        <td><?=$product->name;?></td>
                    </tr>

                    <tr>
                        <th>Название рецепата</th>
                        <td><?=$product->recept_id;?></td>
                    </tr>

                </table>
            </div>
        </div>
    </div>
</div>
<?php
}
require_once 'template/footer.php';
?>