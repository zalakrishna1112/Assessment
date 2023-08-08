<?php
include_once('model.php');
class control extends model
{
        function __construct()
		{
			session_start();
			model::__construct();

			$path=$_SERVER['PATH_INFO'];

			switch ($path)
			
		     
			 {
				case '/index':
					include_once('index.php');
					break;

				case '/index2':
					
						include_once('index2.php');
						break;

				case '/delete_book':
							include_once('delete_book.php');
							break;
						
				case '/serach_book':
							include_once('serach_book.php');
							break;

				case '/viewbook':
					$book_arr=$this->select('books');

								include_once('viewbook.php');
								break;

				case '/edit_book':
					include_once('edit_book.php');
									break;

				case '/change_pass':
					include_once('change_pass.php');
					break;
				
				case '/forms':
					if(isset($_REQUEST['submit']))
				{
					$book_name=$_REQUEST['book_name'];
                    $author=$_REQUEST['author'];
                    $quantity=$_REQUEST['quantity'];
                	$price=$_REQUEST['price'];
                    $category=$_REQUEST['category'];

					date_default_timezone_set('asia/calcutta');
				    $created_at=date('Y-m-d H:i:s');
				    $upadte_at=date('Y-m-d H:i:s');

					$arry=array("book_name"=>$book_name,"author"=>$author,"quantity"=>$quantity,"price"=>$price	,"category"=>$category,"created_at"=>$created_at,"upadte_at"=>$upadte_at);
                    $res=$this->insert('books',$arry);
                    if($res)
                    {
                        echo "
                        <script>
                        alert('employee is add');
                        window.location='forms';
                        </script>
                        ";
                    }
                    else
                    {
                        echo "
						<script>
                        alert('empployee not add');
                        window.location='add_emp';
                        </script>
						";
                    }
                }
				
						include_once('forms.php');
						break;
					
							default:
			echo "<h1>Page Not Found</h1>";
			break;
		}
	
		}
	}	

$obj=new control;
?>