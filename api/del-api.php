<?php
    $p_id = $_POST['id'];

    require_once("dbtools.inc.php");

    $link = create_connection(); 

    $sql = "DELETE FROM userdata WHERE id = '$p_id'";
    if(isset($p_id)){
        //delete需要再判斷mysqli_affected_rows數目, 才可確認是否刪除成功
        if(execute_sql($link, "member", $sql) &&  mysqli_affected_rows($link) == 1){
            echo '{
                "state": true,
                "message": "delete success" 
            }';
        }else{
            echo '{
                "state": false,
                "message":"delete failure"  
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