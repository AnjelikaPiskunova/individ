<?php
require_once 'autoload.php';
if (isset($_POST['product_id'])) {
   // print_r($_POST);
    $product = new Product();
    $product->product_id = Helper::clearInt($_POST['product_id']);
    $product->name = Helper::clearString($_POST['name']);
    $product->recept_id = Helper::clearInt($_POST['recept_id']);
    



    if ((new ProductMap())->save($product)) {
        header('Location: view-product.php?id='.$product->product_id);
    } else {
        if ($product->product_id) {
    header('Location: add-product.php?id='.$product->product_id);
        } else {
            header('Location: add-product.php');
        }
    }
}