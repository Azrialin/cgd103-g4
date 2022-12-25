<?php 
// session_start();
header('Access-Control-Allow-Origin:*');
header("Content-Type:application/json;charset=utf-8");
require_once("./connect_cgd103g4.php");
$memId = $_REQUEST['memId'];
$sql = "select * from `member` where mem_no = $memId";

$packorders = $pdo->query($sql);

$packorderRows = $packorders->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($packorderRows);
?>
