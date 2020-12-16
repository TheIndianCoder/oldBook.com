<?php

class DataBase
{
  private $host;
  private $dbusername ; 
  private $dbpassword ;
  private $dbname;
# localhost Canactevity......
   public function database() 
  {
   
   $this->host='localhost';
   $this->dbusername='root';
   $this->dbpassword='';
   $this->dbname='bsdatabase'; 
    // Connect Database 
   $con= new mysqli($this->host , $this->dbusername,$this->dbpassword, $this->dbname);
   
   /*if($con->connect_error)
   {
      die('Connection failed:' . $con->connect_error);
   }
   echo "Connection Succesfully";
   */
   return $con;
  }
 
}

/**
 * 
 */
class query extends DataBase
{
   
   public function get_data($table_name='',$condition='',$like='',$orderd_by_filed='',$orderd_by_type='desc',$limit='')
   {
      $sql=" SELECT * FROM $table_name ";
         if($orderd_by_filed!='')
         {
         $sql.= " ORDER BY $orderd_by_filed $orderd_by_type ";
         }
         if($limit!='')
         {
         $sql.=" limit $limit ";
         }
      //die($sql);
      $result=$this->database()/* database function call*/->query($sql);
      if($result->num_rows > 0)
      {
         $data=array();
         while($fetch=$result->fetch_assoc())
         {
            $data[]=$fetch;
         }
         return $data;
      }else{
         return 0;
      }
   }
}
/*
Describe SQL Query......

select * from $table_name where $condition like $like orderd by $orderd_by_filed $orderd_by_type limit $limit;

*/

?>