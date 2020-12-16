<?php
include 'include/connection.inc.php';

function get_table_data($table_name,$candition){
    include 'include/connection.inc.php';
 //SELECT * FROM TABLE='TABLE_NAME' WHERE CANDITION='CONDITION'   
    $sql="SELECT * from $table_name";
    $result=$con->query($sql);
    if($result){
        $row=mysqli_num_rows($result);
        if($row!=0){
            $arr=array();
            while($fetch=mysqli_fetch_assoc($result)){
              $arr[]=$fetch;
            }
            return($arr);
        }
    }
}



?>