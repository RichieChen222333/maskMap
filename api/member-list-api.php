<?php
    require_once("dbtools.inc.php");

    $link = create_connection(); 

    $sql = "SELECT * FROM userdata ORDER BY ID DESC";


    $result = execute_sql($link, "member", $sql);

    if(mysqli_num_rows($result) >0){
        $myarray = array();
        while($row = mysqli_fetch_assoc($result)){
            $myarray[] = $row;
        }
        echo '{
            "state": true,
            "data":' .json_encode($myarray).' 
        }';
    }else{
        echo '{
            "state": false,
            "message":"no data"  
        }';
    }        


    mysqli_close($link);
?>