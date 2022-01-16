<?php
require "confReader.php";
function renderMenu($page)
{
    $name = "PAGE".$page;
    $menu = file_get_contents("renders/menu.html");
    $menu = str_replace($name, $name." active",$menu);
    $menu = str_replace("APPNAME", getName(), $menu);
    echo $menu;

}
function renderLinks(){
    echo file_get_contents("renders/links.html");
}
function renderTitle($name){
    echo "<title>".$name." - ".getName()."</title>";
}
function renderName(){
    echo getName();
}
function renderProductInCart($order, $image, $title, $price)
{
    $product = file_get_contents("renders/cartProduct.html");
    $product = str_replace(["ORDER", "IMAGE", "PRICE", "TITLE"], [$order, $image, $price, $title], $product);
    echo $product;
}
function renderProduct($id,$url,$image,$title,$price){
    $product = file_get_contents("renders/product.html");
    $product = str_replace(["ID","URL", "IMAGE", "PRICE", "TITLE"], [$id, $url, $image, $price, $title], $product);
    echo $product;
}