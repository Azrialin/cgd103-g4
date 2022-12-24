<?php 
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

require_once("./connect_cgd103g4.php");
// $sql = "select * from package_order";
$memId=$_REQUEST['memId'];
$sql = "select *, departure_date from package_order join package_group on (package_order.group_id = package_group.group_id) join travel_package on (travel_package.package_no = package_group.package_no) where mem_no = {$memId}";
$products = $pdo->query($sql);
$prodRows = $products->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($prodRows);
?>
