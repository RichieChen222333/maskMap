<?php
    $p_id = $_POST['id'];
    $p_email = $_POST['email'];

    require_once("dbtools.inc.php");

    $link = create_connection(); 

    $sql = "UPDATE userdata SET Email='$p_email' WHERE ID = '$p_id'";
    if(isset($p_id)){
        //update需要再判斷mysqli_affected_rows數目, 才可確認是否更新成功
        if(execute_sql($link, "member", $sql) &&  mysqli_affected_rows($link) == 1){
            echo '{
                "state": true,
                "message": "update success" 
            }';
        }else{
            echo '{
                "state": false,
                "message":"update failure"  
            }';
        }        
    }else{
        echo '{
            "state": false,
            "message": "id cannt be null!" 
        }';
    }

    mysqli_close($link);
?>