<?php
$servername = "localhost";
$username = "regent";
$password = "regent";
$dbname = "regent";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// sql to create students table for regent
$sql = "CREATE TABLE students (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50) NOT NULL,
phone integer(30) NOT NULL,
gender VARCHAR(30) NOT NULL,
level integer(10) NOT NULL,
it_start VARCHAR(30) NOT NULL,
it_end VARCHAR(30) NOT NULL,
programme VARCHAR(70) NOT NULL,
index_no VARCHAR(30) NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table students created successfully";
} else {
   // echo "Error creating table: " . $conn->error;
}

$conn->close();

?>
<html>
<head>
  <meta charset="UTF-8">
  <meta content="Author" content="Isaac Oyelowo,Alex Onyeagwa,Mark Agazie,Bolade Soladoye,Samuel Effa">
  <title>Regent - Industrial Internship Application Form</title>



  <script src="js/modernizr.js" type="text/javascript"></script>


  
  <link rel='stylesheet' href='css/regent.min.css'>
  <link rel='stylesheet' href='css/include-theme.min.css'>
  <link rel='stylesheet' href='css/validator.min.css'>
  <link rel="stylesheet" href="css/jquery-ui.css">

  <script src="js/jquery-1.12.4.js"></script>
  <script src="js/jquery-ui.min.js"></script>
  <script>
  $( function() {
    $( "#startdate" ).datepicker({ minDate: +1, maxDate: "+1M +10D" }).attr('readonly', 'readonly');
    $( "#enddate" ).datepicker({ minDate: +30, maxDate: "+6M +10D" }).attr('readonly', 'readonly');
  } );
  </script>

  <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
  <div style='background:maroon;padding:20px 0px;'>
    <div class="container" style='width:341px;margin:0px auto'>
      <img src='images/logo.png' />
    </div>
  </div>
  <div class="container">

    <form class="form-horizontal" action="" method="post" id="contact_form">
<fieldset>

<!-- Form Name -->
<legend>Industrial Internship Application Form</legend>

<a href='it_form.doc'>Click here to download the INTERNSHIP EVALUATION FORM</a>

<div class="form-group">

  <?php
    if(isset($_POST['submit']))
    {
      $firstname = $_POST['first_name'];
      $lastname = $_POST['last_name'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];
      $gender = $_POST['gender'];
      $level = $_POST['level'];
      $startdate = $_POST['startdate'];
      $enddate = $_POST['enddate'];
      $programme = $_POST['programme'];
      $index_no = $_POST['index_no'];
      $reg_date = date('d/m/Y');

      $conn = new mysqli($servername, $username, $password, $dbname);
      // Check connection
      if ($conn->connect_error) 
      {
        die("Connection failed: " . $conn->connect_error);
      }

$sql = "INSERT INTO students (firstname, lastname, email, phone, gender, level, it_start, it_end, programme, index_no)
VALUES ('$firstname',
 '$lastname',
  '$email', 
  '$phone', 
  '$gender', 
  '$level', '$startdate', '$enddate', '$programme', '$index_no')";

if ($conn->query($sql) === TRUE) {
    echo "Hi ".$firstname. ", your IT letter has been created successfully and a copy has been emailed to you.";
  //  mail($to,$subject,$content); //Todo ; send IT letter email.
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
/*
$sql = "SELECT * FROM students";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. " - Email: " . $row["email"]. "<br>";
    }
} else {
    echo "0 results";
}
*/

$conn->close();


    }else{
    ?>
  <label class="col-md-4 control-label">First Name</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  name="first_name" placeholder="First Name" class="form-control"  type="text">
    </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label">Last Name</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="last_name" placeholder="Last Name" class="form-control"  type="text">
    </div>
  </div>
</div>


<!-- Text input-->
       <div class="form-group">
  <label class="col-md-4 control-label">E-Mail</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
  <input name="email" placeholder="E-Mail Address" class="form-control"  type="text">
    </div>
  </div>
</div>

<!-- Text input-->
       <div class="form-group">
  <label class="col-md-4 control-label">Index Number</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon glyphicon-list"></i></span>
  <input name="index_no" placeholder="Index Number" class="form-control"  type="text">
    </div>
  </div>
</div>

<!-- Select Basic -->
   
<div class="form-group"> 
  <label class="col-md-4 control-label">Programme</label>
    <div class="col-md-4 selectContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
    <select name="programme" class="form-control selectpicker" >
      <option value="">Please select your programme</option>
      <optgroup label="--Engineering">
      <option value="Instrumentation Engineering">Instrumentation Engineering</option>
      <option value="Telecoms Engineering">Telecoms Engineering</option>
      <option value="Computer Engineering">Computer Engineering</option>
      <optgroup label="--Informatics">
      <option value="Computer Science">Computer Science</option>
      <option value="Information System Sciences">Information System Sciences</option>
      <option value="Instructional Technology">Instructional Technology</option>
      <optgroup label="--Accounting and Finance">
      <option value="Accounting And Information Systems">Accounting And Information Systems</option>
      <option value="Banking and Finance">Banking and Finance</option>
      <option value="Economics with Computing">Economics with Computing</option>
      <option value="Business Administration (BBA) e-Commerce option">Business Administration (BBA) e-Commerce option</option>
      <optgroup label="--Management Studies">
      <option value="Management with Computing">Management with Computing</option>
      <optgroup label="--Theology and Ministry">
      <option value="Theology with Management">Theology with Management</option>
      <optgroup label="--Psychology and Human Development">
      <option value="Human Development and Psychology">Human Development and Psychology</option>
    </select>
  </div>
</div>
</div>


<!-- Text input-->
       
<div class="form-group">
  <label class="col-md-4 control-label">Phone #</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
  <input name="phone" placeholder="0275551212" class="form-control" type="text">
    </div>
  </div>
</div>

<!-- Select Basic -->
   
<div class="form-group"> 
  <label class="col-md-4 control-label">Gender</label>
    <div class="col-md-4 selectContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
    <select name="gender" class="form-control selectpicker" >
      <option value="">Please select your gender</option>
      <option value="male">Male</option>
      <option value="female">Female</option>
    </select>
  </div>
</div>
</div>

<!-- Select Basic -->
   
<div class="form-group"> 
  <label class="col-md-4 control-label">Level</label>
    <div class="col-md-4 selectContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-signal"></i></span>
    <select name="level" class="form-control selectpicker" >
      <option value="">Please select your level</option>
      <option value="100">100</option>
      <option value="200">200</option>
      <option value="300">300</option>
      <option value="400">400</option>
    </select>
  </div>
</div>
</div>

<!-- Text input-->
      
<div class="form-group">
  <label class="col-md-4 control-label">Intersnhip Start Date</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
  <input id="startdate" name="startdate" placeholder="Start Date" class="form-control" type="text">
    </div>
  </div>
</div>

<!-- Text input-->
 
<div class="form-group">
  <label class="col-md-4 control-label">Internship End Date</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
  <input id="enddate" name="enddate" placeholder="End Date" class="form-control"  type="text">
    </div>
  </div>
</div>





<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4">
    <input type="submit" name="submit" class="btn btn-warning" value="Submit">
  </div>
</div>

</fieldset>
</form>
</div><?php } ?>
    </div><!-- /.container -->
      


    <script src="js/index.js"></script>

<script src='js/validator.min.js'></script>

</body>
</html>
