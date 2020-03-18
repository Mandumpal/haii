<?php 
class Database
{
	
	public $con;
	public function  __construct()
	{
		$this ->con=mysqli_connect("localhost","root","","parking");
	
	if(!$this->con)
	{
		echo 'Database Connection Error'.mysqli_connect_error($this->con);
	}
	
}
//insert
public function insert($table_name,$data)
{
	
	$string ="insert into ".$table_name." (";
	$string .=implode(",",array_keys($data)).') values(';
	echo $string .="'".implode("','",array_values($data))."')";
	
	if(mysqli_query($this->con,$string))
	{
		return true;
		
	}
	else
	{
		echo mysqli_error($this->con);
	}
}
//select to table
public function select($table_name)
{
	$array=array();
	$query="select * from ".$table_name."";
	$result=mysqli_query($this->con,$query);
	while( $row = mysqli_fetch_assoc($result))
	{
		$array[]=$row;
	}
	return $array;
}
//select to textbox
public function select_where($table_name,$where_condition)
{
	$condition='';
	$array=array();
	foreach($where_condition as $key=>$value)
	{
		 $condition .=$key ."=".$value."' AND";
		$condition=substr($condition,0,-5);
	}
	 $query="select * from ".$table_name." where ".$condition;
	$result=mysqli_query($this->con,$query);
	 $row = mysqli_fetch_object($result);
	
	return $row;

}
//update query
public function update($table_name,$fields,$where_condition)
{
	$query='';
	$condition='';
	foreach($fields as $key => $value)
	{
		$query.=$key."='".$value."',";
	}
	$query=substr($query,0,-2);
	foreach($where_condition as $key => $value)  
           {  
                $condition .= $key . "='".$value."' AND ";  
           }  
           $condition = substr($condition, 0, -5);
	$query = "UPDATE ".$table_name." SET ".$query."' WHERE ".$condition.""; 
	
           if(mysqli_query($this->con, $query))  
           {  
                return true;  
           }  
}

///delete query
 public function del($table_name, $where_condition)  
      {  
           $condition = '';  
           foreach($where_condition as $key => $value)  
           {  
                $condition .= $key . " = '".$value."' AND ";   
                $condition = substr($condition, 0, -5);  
                $query = "DELETE FROM ".$table_name." WHERE ".$condition."";  
                if(mysqli_query($this->con, $query))  
                {  
                     return true;  
                }  
           }  
      } 
//delete query end	  
}	
	
	
   ?>