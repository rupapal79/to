
<?php
//index.php

$error = '';
$name = '';
$email = '';
$message = '';

function clean_text($string)
{
 $string = trim($string);
 $string = stripslashes($string);
 $string = htmlspecialchars($string);
 return $string;
}

if(isset($_POST["submit"]))
{
 if(empty($_POST["name"]))
 {
  $error .= '<p><label class="text-danger">Please Enter your Name</label></p>';
 }
 else
 {
  $name = clean_text($_POST["name"]);
  if(!preg_match("/^[a-zA-Z ]*$/",$name))
  {
   $error .= '<p><label class="text-danger">Only letters and white space allowed</label></p>';
  }
 }
 if(empty($_POST["number"]))
 {
  $error .= '<p><label class="text-danger">Please Enter your numberr</label></p>';
 }
 else
 {
  $number = clean_text($_POST["number"]);
 }
 if(empty($_POST["message"]))
 {
  $error .= '<p><label class="text-danger">Message is required</label></p>';
 }
 else
 {
  $message = clean_text($_POST["message"]);
 }

 if($error == '')
 {
  $file_open = fopen("cse.csv", "a");
  $no_rows = count(file("cse.csv"));
  if($no_rows > 1)
  {
   $no_rows = ($no_rows - 1) + 1;
  }
  $form_data = array(
   'sr_no'  => $no_rows,
   'name'  => $name,
   'email'  => $number,
   'message' => $message
  );
  fputcsv($file_open, $form_data);
  $error = '<label class="text-success">Thank you for contacting us</label>';
  $name = '';
  $email = '';
  $subject = '';
  $message = '';
 }
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Feedback system</title>
<link href="css/style.css" rel="stylesheet">
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
</head>
<style>
body{
	background-color: #ccc
}
</style>
</head>
<body>

<div class="bg-image"></div>

<div class="bg-text">
  <h2>Techno International Batanagar</h2>
  <h1 style="font-size:50px">Smart Feedback System</h1>
  <p>Give your feedback</p>
</div>
<h1 align="center">Welcome</h1>
<h3 align="center"><pre>Feedback occurs when outputs of a system are routed back as inputs as part of a chain of cause-and-effect that forms a circuit or loop. 
                        The system can then be said to feed back into itself</pre></h3>

<div class="container">
   <h2 align="center">Computer Science Engineering</h2>
   <br />
   <div class="col-md-6" style="margin:0 auto; float:none;">
    <form method="post">
     <h3 align="center">Feedback</h3>
     <br />
     <?php echo $error; ?>
     <div class="form-group">
      <label>Faculty Name</label>
      <input type="text" name="name" placeholder="Enter Name" class="form-control" value="<?php echo $name; ?>" />
     </div>
     <div class="form-group">
      <label>Semester</label>
      <input type="number" name="number" class="form-control" placeholder="Enter number" <?php echo $name; ?>/>
     </div>
     <div class="form-group">
      <label>Enter Message</label>
      <textarea name="message" class="form-control" placeholder="Enter Message"><?php echo $message; ?></textarea>
     </div>
     <div class="form-group" align="center">
      <input type="submit" name="submit" class="btn btn-info" value="Submit" />
     </div>
    </form>
   </div>
  </div>



<br><h4 align="center">Contact us</h4>
<center><br><h3>Website</h3><a href="www.tib.edu.in"><b>www.tib.edu.in</b></a></center>
<br>
<br>
</body>
</html>
