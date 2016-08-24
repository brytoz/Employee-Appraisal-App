<?php 
							include"connect.php";
							$query="select * from employee";
							$data=sqlsrv_query($conn,$query);
							while($row=sqlsrv_fetch_array($data))
							{
								echo $row[i];
							}

							?>