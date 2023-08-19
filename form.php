<?php
$con = mysqli_connect('localhost','root','','form');
if(isset($_POST['but2'])){

$name = $_POST['fullname'];
$phoneno= $_POST['phno'];
$emailid = $_POST['email'];
$subjects = $_POST['subject'];


$sqli=mysqli_query($con, "INSERT INTO contact_form value('$name','$phoneno','$emailid','$subjects,)");
if($sqli)
{
    echo "user data added successfully";
}
else{
echo "connection failed";
}
}
?>