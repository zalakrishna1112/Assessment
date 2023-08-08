<?php

class model 
{ 
	public $conn="";
	function __construct()
	{
		$this->conn=new mysqli('localhost','root','','test2');	
	}
	
	function insert($tbl,$data)
	{
		$key_arr=array_keys($data);
		$col=implode(",",$key_arr);
		
		$value_arr=array_values($data);
		$value=implode("','",$value_arr);
		
		$ins="insert into $tbl($col) values('$value')";  // query
		$run=$this->conn->query($ins);  // run query
		return $run;
	}
	function select($tbl)
	{
		$sel="select * from $tbl";  // query
		$run=$this->conn->query($sel);  // run query
		while($fetch=$run->fetch_object())  // data fetch from query
		{
			$arr[]=$fetch;
		}
		if(!empty($arr))
		{
			return $arr;
		}
	}
	
	
	function selectSerach($tbl1,$tbl2,$on1,$tbl3,$on2,$tbl4,$on3,$col,$value)
	{
		$sel="select * from $tbl1 join $tbl2 on $on1 join $tbl3 on $on2 join $tbl4 on $on3 where $col LIKE '$value%' ; ";  // query
		$run=$this->conn->query($sel);  // run query
		while($fetch=$run->fetch_object())  // data fetch from query
		{
			$arr[]=$fetch;
		}
		if(!empty($arr))
		{
			return $arr;
		}
	}
	
	function select_where_login($tbl,$where)
	{
		$sel="select * from $tbl where 1=1";  // 1=1 means query continue
		$i=0;
		$col=array_keys($where);// array("0"=>"unm","1"=>"pass")  
		$value=array_values($where);// array("0"=>"rajesh","1"=>"1234")  
		foreach($where as $w)
		{
			echo $sel.=" and $col[$i]='$value[$i]'";
			$i++;
		}
		$run=$this->conn->query($sel);
		return $run;
		
	}
	
	
	function select_where($tbl,$where)
	{
		$sel="select * from $tbl where 1=1";  // 1=1 means query continue
		$i=0;
		$col=array_keys($where);// array("0"=>"unm","1"=>"pass")  
		$value=array_values($where);// array("0"=>"rajesh","1"=>"1234")  
		foreach($where as $w)
		{
			echo $sel.=" and $col[$i]='$value[$i]'";
			$i++;
		}
		$run=$this->conn->query($sel);
		while($fetch=$run->fetch_object())  // data fetch from query
		{
			$arr[]=$fetch;
		}
		if(!empty($arr))
		{
			return $arr;
		}
	}
	
	
	function select_join4($tbl1,$tbl2,$on1,$tbl3,$on2,$tbl4,$on3)
	{
		$sel="select * from $tbl1 join $tbl2 on $on1 join $tbl3 on $on2 join $tbl4 on $on3";  // 1=1 means query continue
		$run=$this->conn->query($sel);  // run query
		while($fetch=$run->fetch_object())  // data fetch from query
		{
			$arr[]=$fetch;
		}
		if(!empty($arr))
		{
			return $arr;
		}
	}
	function delete_where($tbl,$arr)
	{
		$col_arr=array_keys($arr);
		$value_arr=array_values($arr);
		$sel="delete from $tbl where 1=1"; // query continue
		// loop $arr 
		$i=0;
		foreach($arr as $w)
		{
			 $sel.=" and $col_arr[$i]='$value_arr[$i]'";
			$i++;	
		}
		$run=$this->conn->query($sel);	 // run query database
		return $run;
	}
    
	function update($tbl,$arr,$where)
	{
		$col_arr=array_keys($arr);
		$value_arr=array_values($arr);
		$upd="update $tbl set "; // query continue
		$j=0;
		
		$count=count($arr); // count arr value
		foreach($arr as $w)
		{
			if($count==$j+1)
			{
				$upd.=" $col_arr[$j]='$value_arr[$j]'";
			}
			else
			{
				$upd.=" $col_arr[$j]='$value_arr[$j]',";
				$j++;
			}			
		}
		$wcol_arr=array_keys($where);
		$wvalue_arr=array_values($where);
		$upd.=" where 1=1"; // query continue
		// loop $where 
		$i=0;
		foreach($where as $w)
		{
			echo $upd.=" and $wcol_arr[$i]='$wvalue_arr[$i]'";
			$i++;	
		}
		 
		$run=$this->conn->query($upd);	 // run query database
		return $run;
	}
	function select_search($tbl,$col,$search)
    {
        $sel="select * from $tbl where $col like '$search%'"; // query
        $run=$this->conn->query($sel);   // run query database
        while($fetch=$run->fetch_object())
        {
            $arr[]=$fetch;
        }
        return $arr;
    }

	
}
$obj=new model;


?>