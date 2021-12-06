<?php
session_start();
?>
<?php  // creating a database connection 


   $db_sid = 
   "(DESCRIPTION =
    (ADDRESS = (PROTOCOL = TCP)(HOST = DESKTOP-9DR3CSO)(PORT = 1521))
    (CONNECT_DATA =
      (SERVER = DEDICATED)
      (SERVICE_NAME = daniyal)
    )
  )";            // Your oracle SID, can be found in tnsnames.ora  ((oraclebase)\app\Your_username\product\11.2.0\dbhome_1\NETWORK\ADMIN) 
  
   $db_user = "system";   // Oracle username e.g "scott"
   $db_pass = "dani1239";    // Password for user e.g "1234"
   $con = oci_connect($db_user,$db_pass,$db_sid); 
   if($con) 
      {  } 
   else 
      { die('Could not connect to Oracle: '); } 
      
	  $login_id=$_SESSION['login'];

	 $q = "select * from workout_plan where login_id='$login_id'";
	 $query_id = oci_parse($con, $q); 		
	 $r = oci_execute($query_id); 
	 $rs_arr = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS);
	 //echo"<br>"; 	 
	 //print_r($rs_arr); 
	 echo"<hr>"; 
	 //while($row = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS)) 
	 //{ 
	
		//echo $row['DATE_TIME']."   ".$row['BMI']."   ".$row['MUSCLE_SIZE']."   ".$row['FATS']."   ".$row['CARBS']."    ".$row['PROTEINS']."    ".$row['ACHIEVED']."<br>"; 
	 //}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Logs</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
      integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb"
      crossorigin="anonymous"
    />
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	
	
	
	
  </head>
  <body>
   
 <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <div class="row">
          <div
            class="col-7 col-sm-5 col-md-3 col-lg-12 offset-sm-4 offset-md-4 offset-lg-0"
          >
		   <div class="text-center">
                <p>...</p>
                <button class="btn btn-success" name ='back'>Back</button>
              </div>
			   <?php
			   
			   
			    $q = "select * from workout_plan where login_id='$login_id'";
				$query_id = oci_parse($con, $q); 		
				$r = oci_execute($query_id); 
				//$rs_arr = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS);
				
				//print_r($rs_arr);
				 while($row = oci_fetch_array($query_id, OCI_BOTH+OCI_RETURN_NULLS)) 
				{ 
					//print_r($row);
					echo '<h1 class="mb-5 right"><b>'.$row['DAY'].'</b></h2><h5 class="mb-5 right"> FATS: '.$row['FATS'].'</h5>  '.'<h5 class="mb-5 right"> PROTEINS: '.$row['PROTEINS'].'</h5>  '.'<h5 class="mb-5 right"> CARBS: '.$row['CARBS'].'</h5><br>'; 
					$var=$row['DAY'];
					$qq = "select * from exercise_plan where login_id='$login_id' AND day ='$var'";
					$query_id1 = oci_parse($con, $qq); 		
					$r2 = oci_execute($query_id1);
					while($row1 = oci_fetch_array($query_id1, OCI_BOTH+OCI_RETURN_NULLS))
					{
						
					echo '<h3> <u><b>Exercise:</b></u>      '.$row1['EX_NAME'].'     <u><b>Muscle:</b></u>     '.$row1['MUSCLE_NAME'].'       <u><b>Duration:</b></u>        '.$row1['WORKOUT_TIME'].'     <u><b>Equipment:</b></u>      '.$row1['EQUIP_NAME'].'</h3><br>'; 	
						
					}
					
				
				
				}	
				
			   
			   
			   ?>
			
			</div>
        </div>
      </div>
    </div>

</body>
</html>

