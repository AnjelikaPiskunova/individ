<?php
require_once 'autoload.php';
$size = 5;
if (isset($_GET['page'])) {
    $page = Helper::clearInt($_GET['page']);
} else {
    $page = 1;
}
$receptMap = new ReceptMap();
$count = $receptMap->count();
$recepts = $receptMap->findAll($page*$size-$size, $size);
$header = 'Список рецептов ';
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

            <a class="btn btn-success" href="add-recept.php">Добавить рецепт</a>

            </div>
            <div class="box-body">
            <?php
            if ($recepts) {
            ?>
            <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
                <th>Название</th>
                <th>Описание</th>
                <th>Имя автора</th>
                <th>операции</th>
                <th>Группа</th>
                <th>Поставщик материалов</th>
            </tr>
            </thead>    
            <tbody>
            <?php
            foreach ($recepts as $recept) {
            echo '<tr>';
            echo '<td><a href="view-recept.php?id='.$recept->recept_id.'">'.$recept->name.'</a> '. '<a href="add-recept.php?id='.$recept->stanok_id.'"><i class="fa fa-pencil"></i></a></td>';
            echo '<td>'.($recept->opisanie).'</td>';
            echo '<td>'.($recept->user_id).'</td>';
            echo '<td>'.($recept->operation_id).'</td>';
            echo '<td>'.($recept->group_id).'</td>';
            echo '<td>'.($recept->postavshik_id).'</td>';
            echo '</tr>';
            }
            ?>
            </tbody>
            </table>
            <?php } else {
            echo 'Ни одного рецепта не найдено';
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