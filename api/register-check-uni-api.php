<?php
    $p_username = $_POST['username'];

    require_once("dbtools.inc.php");

    $link = create_connection(); 

    $sql = "SELECT * FROM userdata WHERE Username = '$p_username'";
    if(isset($p_username)){
        $result = execute_sql($link, "member", $sql);

        if(mysqli_num_rows($result) == 1){
            echo '{
                "state": true,
                "message": "username already exist" 
            }';
        }else{
            echo '{
                "state": false,
                "message":"username does not exist"  
            }';
        }        
    }else{
        echo '{
            "state": false,
            "message": "column cannt null!" 
        }';
    }

    mysqli_close($link);
?>