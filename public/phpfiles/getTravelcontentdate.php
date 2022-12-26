<?php 

header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

require_once("./connect_cgd103g4.php");
$sql = "SELECT * FROM `travel_package` left join `package_group` on `travel_package`.package_no = `package_group`.package_no;";
$packorders = $pdo->query($sql);
$packorderRows = $packorders->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($packorderRows);
?>



