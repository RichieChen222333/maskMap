<?php
    //cookie_uid 用來比對是否已登入
    $p_cookie_uid = $_POST['cookie_uid'];


    require_once("dbtools.inc.php");

    $link = create_connection(); 

    $sql = "SELECT * FROM userdata WHERE Uid = '$p_cookie_uid'";
    if(isset($p_cookie_uid)){
        $result = execute_sql($link, "member", $sql);

        //用來輸出json 以便顯示登入資訊
        $myarray = array();
        $myarray = mysqli_fetch_assoc($result);


        if(mysqli_num_rows($result) == 1){
            echo '{
                "state": true,
                "message": "username already login",
                "data" : '.json_encode($myarray).' 
            }';
        }else{
            echo '{
                "state": false,
                "message": "username does not login" 
            }';            
        }
    }

?>