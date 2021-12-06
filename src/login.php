<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>LOGIN</title>
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
  </head>
  <body>
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <div class="row">
          <div
            class="col-12 col-sm-8 col-md-6 col-lg-4 offset-sm-2 offset-md-3 offset-lg-4"
          >
            <h1 class="mb-3 text-center">FIT ME</h1>
            <p class="lead">
              ENTER INTO THE WORLD
            </p>
            <form class="mb-3" action="./login.php" method="POST">
             <div class="form-group">
                <label for="Login_ID">Login ID:</label>
                <input
                  type="text"
                  class="form-control"
                  placeholder="text"
                  id="login"
                  name="login"
                  required
                />
              </div>
              <div class="form-group">
                <label for="password">Password:</label>
                <input
                  type="password"
                  class="form-control"
                  id="password"
                  name="password"
                  required
                />
              </div>
	
              <button type="submit" class="btn btn-primary btn-block mb-3" name="B">
                LOGIN
              </button>
			    <div class="text-center">
                <p>or ...</p>
                <a href="./sign_up.php" class="btn btn-success">Sign Up</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
      src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
      integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
      integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
      integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
      crossorigin="anonymous"
    ></script>



	<?php
	
	if (isset($_POST["B"]))
	{
	$password=$_POST["password"];
	$login=$_POST["login"];
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
      $query="Select login_id from member where lOGIN_ID ='$login' AND password='$password'";
	  $query=oci_parse($con, $query); 
	  $w=oci_execute($query);
	  $row = oci_fetch_array($query, OCI_BOTH+OCI_RETURN_NULLS);
	   
	  $query1="Select first_name from member where lOGIN_ID ='$login'";
	  $query1=oci_parse($con, $query1); 
	  $w1=oci_execute($query1);
	  $row1 = oci_fetch_array($query1, OCI_BOTH+OCI_RETURN_NULLS);	
		
		
	  if (count($row)>1)
	  {
	
		  echo "LOGGED IN";
		  $_SESSION['name']=$row1[0];
		  $_SESSION['login']=$login;
		  header("Location: temp.php", true, 301);
		  
	  }
	  else{
		  echo "User not found";
	}
}
	?>

 </body>
</html>

