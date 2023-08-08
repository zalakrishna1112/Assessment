<?php

include('model.php');


class control extends model
{
	
	function __construct() // magic function call automatecaly
	{
		
		session_start();
		model::__construct();
		$page_url=$_SERVER['PATH_INFO'];	 //http://localhost/Riddhi_php/project/web/control.php
		
		switch($page_url)
		{
			
			case '/index':
				/* $slot = "";
				$date="";
				$time="";
				if($_SERVER['REQUEST_METHOD']=='POST'){
					$slot=$_POST['slot'];

				}
				date_default_timezone_set('asia/calcutta');
				$date=date('Y-m-d ');
				$time=date('Y-m-d H:i:s', strtotime($date));
				$arr=array("date"=>$date,"time"=>$time,"slot"=>$slot);
				$res=$this->insert('users',$arr);
				if($res)
				{
					echo 1; */
					/* echo"
					<script>
						alert('booking sucess');
					</script>
					"; */
				/* }else{
					echo 0;
				} */


			include_once('index.php');
			break;

			case '/ajax-insert':
				$slot = "";
				$date="";
				$time="";
				if($_SERVER['REQUEST_METHOD']=='POST'){
					$slot=$_POST['slot'];

				}
				date_default_timezone_set('asia/calcutta');
				$date=date('Y-m-d ');
				$time=date('Y-m-d H:i:s', strtotime($date));
				$time=date('Y-m-d H:i:s', strtotime($date));

				$arr=array("date"=>$date,"time"=>$time,"slot"=>$slot);
				$res=$this->insert('users',$arr);
				if($res)
				{
					echo 1;
				}else{
					echo 0;
				}
			break;
			
			
			case '/ajax-load':
				
				// Include necessary files and initialize the database connection
				
				// Assuming $this->select('users') retrieves the users' data from the database
				$user_arr = $this->select('users');
				
				// Check if any data is retrieved
				if (!empty($user_arr)) {
					$output = '<table border="1" width="100%" cellspacing="0" cellpadding="10px">
						<tr>
							<th width="60px">ID</th>
							<th>time</th>
							<th>date</th>
							<th>slot</th>


							<th width="90px">Edit</th>
							<th width="90px">Delete</th>
						</tr>';
				
					foreach ($user_arr as $data) {
						$output .= "<tr class='row_data{$data->id}' data-row_id='{$data->id}'>
							<td align='center'>{$data->id}</td>
							<td>{$data->time}</td>

							<td>{$data->date}</td>
							<td>{$data->slot}</td>

							<td align='center'><button class='edit-btn'data-edit_id'{$data->id}'>Edit</button></td>
							<td align='center'><button class='delete-btn' data-delete_id='{$data->id}'>Delete</button></td>
						</tr>";
					}
				
					$output .= '</table>';
				
					echo $output;
				} else {
					echo '<h2>No record found.</h2>';
				}
				break;
				case '/delete':					
					if(isset($_REQUEST['dataId'])){
						$dataId = $_REQUEST['dataId']; // Use $_REQUEST instead of $_POST
						$where = array("id" => $dataId);
						$res = $this->delete_where('users', $where);
						if ($res) {
							echo "1";
						} else {
							echo "0";
						}
					}
					
					break;
					case '/loadupdate':
						$where = array("id" => $dataId);
						$res = $this->select_where('users', $where);
						$fetch = $res->fetch_object();
						$output .= "<tr>
							<td width='90px'>halfday</td>
							<td>
								<label id='slot-label'>Slot:</label>
								<select id='slot' class='form-control'>"; 
								
						// Fetch data for the options
						$slotOptions = array(
							"morning" => "Morning (8AM to 12PM)",
							"Afternoon" => "Afternoon (12PM to 4PM)",
							"Evening" => "Evening (4PM to 8PM)",
							"night" => "Night (8PM to 12AM)"
						);
					
						foreach ($slotOptions as $value => $label) {
							$selected = ($value == $fetch->slot) ? "selected" : ""; // Check if option should be selected
							$output .= "<option value='$value' $selected>$label</option>";
						}
						
						$output .= "</select>
							</td>
							<td>
								<button id='edit-submit' value='save' class='btn btn-primary'>Book Room</button>
							</td>
						</tr>";
					
						echo $output;
						break;
					


      
	break;
                    

					case'/update':
						if(isset($_REQUEST['dataId'])){
							$dataId=$_REQUEST['dataId'];
							$where=array("id"=>$dataId);
							$res=$this->select_where('users',$where);
                            $fetch=$res->fetch_object();
							if(isset($_REQUEST['edit-submit'])){
                              $slot=$_POST['slot'];
							  $arr=array("slot"=>$slot);
							  $res=$this->update('users',$arr,$where);
							  if($res)
							  {
								echo 1;
							  }else{
								echo 0;
							  }
							}

						}
						break;
				

				
			
		}	
	}
}

$obj=new control;

?>