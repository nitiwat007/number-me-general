<?php

//=============== select ================== 
function select($db, $table, $condition) {
    $query = "select * from $table $condition";
    //echo $query."<br>";
    $result = $db->Execute($query);
    if ($result === false) {
        //echo "error ";
    }
    $db->disconnect;
    return $result;
}

?>