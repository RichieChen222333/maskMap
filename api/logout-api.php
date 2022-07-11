<?php
    $p_id = $_POST['id'];
    require_once("dbtools.inc.php");

    $link = create_connection(); 
    //清空 Uid 和 State 表示登出
    $sql = "UPDATE userdata SET State = false, Uid = '' WHERE ID = '$p_id'";
    if(isset($p_id)){
        //update需要再判斷mysqli_affected_rows數目, 才可確認是否更新成功
        if(execute_sql($link, "member", $sql) &&  mysqli_affected_rows($link) == 1){
            echo '{
                "state": true,
                "message": "logout success" 
            }';
        }else{
            echo '{
                "state": false,
                "message":"logout failure"'.$sql.'  
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