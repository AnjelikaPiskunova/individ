<?php
require_once 'autoload.php';
if (isset($_POST['recept_id'])) {
   // print_r($_POST);
    $recept = new Recept();
    $recept->recept_id = Helper::clearInt($_POST['recept_id']);
    $recept->name = Helper::clearString($_POST['name']);
    $recept->opisanie = Helper::clearString($_POST['opisanie']);
    $recept->user_id = Helper::clearInt($_POST['user_id']);
    $recept->operation_id = Helper::clearInt($_POST['operation_id']);
    $recept->group_id = Helper::clearInt($_POST['group_id']);
    $recept->postavshik_id = Helper::clearInt($_POST['postavshik_id']);
    



    if ((new ReceptMap())->save($recept)) {
        header('Location: view-recept.php?id='.$recept->recept_id);
    } else {
        if ($recept->recept_id) {
    header('Location: add-recept.php?id='.$recept->recept_id);
        } else {
            header('Location: add-recept.php');
        }
    }
}