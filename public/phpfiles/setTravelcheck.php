<?php
    header('Access-Control-Allow-Origin:*');
    header("Content-Type:application/json;charset=utf-8");
    try{
      
      require_once("./connect_cgd103g4.php");
    //sql 指令
      $sql = "insert into `package_order` (`package_order_no`, `group_id`, `package_order_date`, `package_ticket_amount`, `package_pay_status`, `package_total`, `package_no_fk`, `package_said`, `mem_no`) values (
          null, 
          :group_id, 
          current_date(), 
          :package_ticket_amount,
          :package_pay_status, 
          :package_total, 
          :package_no_fk, 
          :package_said,
          :mem_no)";
      //編譯, 執行
      $items = $pdo->prepare($sql);
        
      
      $items->bindValue(":group_id", $_POST["group_id"]);
      $items->bindValue(":package_ticket_amount", $_POST["package_ticket_amount"]);
      $items->bindValue(":package_pay_status", $_POST["package_pay_status"]);
      $items->bindValue(":package_total", $_POST["package_total"]);
      $items->bindValue(":package_no_fk", $_POST["package_no_fk"]);
      $items->bindValue(":package_said", $_POST["package_said"]);
      $items->bindValue(":mem_no", $_POST["mem_no"]);
      //-------------------------------

    
      $items->execute();

      $msg = "新增成功";
    }catch (PDOException $e){
      $msg = "錯誤行號 : ".$e->getLine().", 錯誤訊息 : ".$e->getMessage();
    }

    echo json_encode($msg);
?>