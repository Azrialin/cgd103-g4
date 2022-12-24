<?php 
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

require_once("./connect_cgd103g4.php");
$memId=$_REQUEST['memId'];
$sql = "select * from product_orders join order_items on (product_orders.product_orders_id = order_items.product_orders_id) join product on (order_items.prod_id = product.prod_id) where mem_num = {$memId}";
$products = $pdo->query($sql);
$prodRows = $products->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($prodRows);
?>

