<?php
    header('Access-Control-Allow-Origin:*');
    header("Content-Type:application/json;charset=utf-8");
    
	require_once("./connect_cgd103g4.php");
    // sql 指令
    $sql = "select * from `faq`";
    $faq = $pdo->query($sql);
    $faqs = $faq->fetchAll();
    $data=[];
    foreach($faqs as $i=> $page){
          $data[]=$page;
    }
    echo json_encode($data);
?>