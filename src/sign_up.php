<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Sign Up</title>
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
            <h1 class="mb-3 text-center">Join Fit Me Gymnastics</h1>
            <p class="lead">
              It's free and you don't have to share your address.
            </p>
            <form class="mb-3" action="./sign_up.php" method="POST">
              <div class="row">
                <div class="form-group col-12 col-sm-6">

                  <label for="firstName">First name:</label>
                  <input
                    type="text"
                    class="form-control"
                    placeholder="First name"
                    id="firstName"
                    name="firstName"
                  />
                </div>
                <div class="form-group col-12 col-sm-6">
                  <label for="lastName">Last name:</label>
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Last name"
                    id="lastName"
                    name ="lastName"
                  />
                </div>
              </div>
              <div class="form-group">
                <label for="email">Email:</label>
                <input
                  type="email"
                  class="form-control"
                  placeholder="example@example.com"
                  id="email"
                  name="email"
                  required
                />
              </div>
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
			  <div class="form-group">
                <label for="phone">Phone:</label>
                <input
                  type="number"
                  class="form-control"
                  id="phone"
                  name="phone"
                  required
                />
              </div>
              <div class="form-group">
                <label for="Weight">Weight:</label>
                <input
                  type="number"
                  class="form-control"
                  placeholder="in kgs"
                  id="weight"
                  name="weight"
                  required
                />
              </div>
              <div class="form-group">
                <label for="Height">Height:</label>
                <input
                  type="number"
                  class="form-control"
                  placeholder="in meters"
                  id="Height"
                  name="Height"
                  required
                />
              </div>
			  <div class="form-group">
                <label for="musclesize">Muscle Size:</label>
                <input
                  type="number"
                  class="form-control"
                  id="musclesize"
                  name="musclesize"
                  required
                />
              </div>
            
            
              <div class="form-check form-check-inline">
                <label class="form-check-label">
                  <input
                    type="radio"
                  
                    id="exampleRadios1"
                    class="form-check-input"
                    value="Male"
                    name="gender"
                    checked
                  />
                  Man
                </label>
              </div>
              <div class="form-check form-check-inline">
                <label class="form-check-label">
                  <input
                    type="radio"
                 
                    id="exampleRadios2"
                    class="form-check-input"
                    value="Woman"
                    name="gender"
                  />
                  Woman
                </label>
              </div>
              <button type="submit" class="btn btn-primary btn-block mb-3" name="B">
                Create account
              </button>
              <div class="alert alert-info small" role="alert">
                By clicking above you agree to our
                <a href="#" class="alert-link">Terms &amp; Conditions</a> and
                our <a href="#" class="alert-link">Privacy Policy</a>.
              </div>
              <div class="text-center">
                <p>or ...</p>
                <a href="./login.php" class="btn btn-success">Login</a>
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
		$firstname=$_POST["firstName"];
		$lastname=$_POST["lastName"];
		$email=$_POST["email"];
		$password=$_POST["password"];
		$Height=$_POST["Height"];
		$weight=$_POST["weight"];
		$gender=$_POST["gender"];
		$login=$_POST["login"];
		$phone=$_POST["phone"];
		$musclesize=$_POST["musclesize"];
		$bool=false;	
		
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
      $query="Select login_id from member where lOGIN_ID ='$login'";
	  $query=oci_parse($con, $query); 
	  $w=oci_execute($query);
	  $row = oci_fetch_array($query, OCI_BOTH+OCI_RETURN_NULLS);
	 
	  if (count($row)>1)
	  {
		  echo "ID already exists";
		  
	  }
	  else{
	
	 
	  
		$bmi=$weight/($Height * $Height);
		$_SESSION['bmi']=$bmi;
		$_SESSION['weight']=$weight;
	 $q = "insert into member values('$lastname','$firstname','$gender','$phone','$password','$bmi','$musclesize','$Height','$weight','$login','$email')";
	 $query_id = oci_parse($con, $q); 		
	 $r = oci_execute($query_id);
	 if ($r)	
		echo "Successful";
	else{
		echo "Unsuccessful";
	}
	  }
	 	
	}
	
	
	
	
	
	?>
	
	
	
	
	
  </body>
</html>

