<?php
    $p_username = $_POST['username'];
    $p_password = $_POST['password'];
    $p_email = $_POST['email'];

    require_once("dbtools.inc.php");

    $link = create_connection(); 

    $sql = "INSERT INTO user(Username, Password, Email) Values('$p_username', md5('$p_password'), '$p_email')";
    //註冊資料不許為空
    if(isset($p_username) && isset($p_password) && isset($p_email)){
        if(execute_sql($link, "test01", $sql)){
            echo '{
                "state": true,
                "message": "insert ok!" 
            }';
        }else{
            echo '{
                "state": false,
                "message":'.mysqli_error($link).' 
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