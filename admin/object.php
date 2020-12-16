<?php 

include 'class.php';


$obj = new query();
$result=$obj->get_data('state','','','','','');
echo '<pre>';
print_r($result);


?>