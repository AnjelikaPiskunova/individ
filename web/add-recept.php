<?php
require_once 'autoload.php';
$id = 0;
if (isset($_GET['id'])) {
    $id = Helper::clearInt($_GET['id']);
}
$recept = (new ReceptMap())->findById($id);
$header = (($id)?'Редактировать':'Добавить').' Рецепт';
require_once 'template/header.php';
?>
<section class="content-header">
    <h1><?=$header;?></h1>
    <ol class="breadcrumb">

        <li><a href="/index.php"><i class="fa fa-dashboard"></i> Главная</a></li>

        <li><a href="list-recept.php">Рецепты</a></li>
        <li class="active"><?=$header;?></li>
    </ol>
</section>
<div class="box-body">
    <form action="save-recept.php" method="POST">
    
        <div class="form-group">
                <label>Название</label>
                <input type="text" class="form-control" name="name" required="required" value="<?=$recept->name;?>">
        </div>

        <div class="form-group">
                <label>Описание</label>
                <input type="text" class="form-control" name="opisanie" required="required" value="<?=$recept->opisanie;?>">
        </div>

        <div class="form-group">
            <label>Автор рецепта</label>
            <select class="form-control" name="user_id">
            <?= Helper::printSelectOptions($recept->user_id, (new UserMap())->arrUsers());?>
            </select>
        </div>

        <div class="form-group">
            <label>Операция</label>
            <select class="form-control" name="operation_id">
            <?= Helper::printSelectOptions($recept->operation_id, (new OperationMap())->arrOperations());?>
            </select>
        </div>

        <div class="form-group">
            <label>Группа продукта</label>
            <select class="form-control" name="group_id">
            <?= Helper::printSelectOptions($recept->group_id, (new GroupMap())->arrGroups());?>
            </select>
        </div>

        <div class="form-group">
            <label>Поставщик</label>
            <select class="form-control" name="postavshik_id">
            <?= Helper::printSelectOptions($recept->postavshik_id, (new PostavshikMap())->arrPostavshiks());?>
            </select>
        </div>



        <!--Кнопка сохранения -->  
        <div class="form-group">
            <button type="submit" name="saveRecept" class="btn btn-primary">Сохранить</button>
        </div>
        <input type="hidden" name="recept_id" value="<?=$id;?>"/>
    </form>
</div>
<?php
require_once 'template/footer.php';
?>