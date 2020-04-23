<?php
require_once 'autoload.php';

if (isset($_GET['id'])) {
    $id = Helper::clearInt($_GET['id']);
    $recept = (new ReceptMap())->findViewById($id);
    $header = 'Просмотр рецепта';
    require_once 'template/header.php';
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <section class="content-header">
                <h1><?=$header;?></h1>
                <ol class="breadcrumb">
                    <li><a href="index.php"><i class="fa fa-dashboard"></i> Главная</a></li>
                    <li><a href="list-recept.php">рецепты</a></li>
                    <li class="active"><?=$header;?></li>
                </ol>
            </section>
            <div class="box-body">
                <a class="btn btn-success" href="add-recept.php?id=<?=$id;?>">Изменить</a>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-hover">
                    <tr>
                        <th>Название рецепата</th>
                        <td><?=$recept->name;?></td>
                    </tr>
                    <tr>
                        <th>Описание</th>
                        <td><?=$recept->opisanie;?></td>
                    </tr>
                    <tr>
                        <th>Имя автора</th>
                        <td><?=$recept->user_id;?></td>
                    </tr>
                    <tr>
                        <th>операции</th>
                        <td><?=$recept->operation_id;?></td>
                    </tr>
                    <tr>
                        <th>Группа</th>
                        <td><?=$recept->group_id;?></td>
                    </tr>
                    <tr>
                        <th>Поставщик</th>
                        <td><?=$recept->postavshik_id;?></td>
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