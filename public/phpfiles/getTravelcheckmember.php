<?php 

header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");

require_once("./connect_cgd103g4.php");
$sql = "select * from `member`;";

$packorders = $pdo->query($sql);

$packorderRows = $packorders->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($packorderRows);
?>
