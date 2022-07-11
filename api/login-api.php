<?php
    $p_username = $_POST['username'];
    $p_password = $_POST['password'];
    $p_password = md5($p_password);

    require_once("dbtools.inc.php");

    $link = create_connection(); 

    $sql = "SELECT * FROM userdata WHERE Username = '$p_username' && Password = '$p_password'";
    $result = execute_sql($link, "member", $sql);

    if(mysqli_num_rows($result) == 1){
        //以date()為基數產生hash
        $today = date("m.d.y.h:i:s"); // e.g. "03.10.01"
        $uid = substr(hash('md5', $today), 0, 32); // Hash it

        $sql = "UPDATE userdata SET Uid='$uid', State = true WHERE Username = '$p_username'";
        //登入成功後更新 Uid 和 State
        if(execute_sql($link, "member", $sql)){
            echo '{"state" : true,"message" : "login success","uid" : "'.$uid.'"}';        
        }else{
            echo '{"state":false,"message" : "login error - uid error: "'.mysqli_error($link).$sql.'}';
        }
    }else{
        echo '{"state":false,"message" : "login error: "'.mysqli_error($link).$sql.'}';
    }

?>