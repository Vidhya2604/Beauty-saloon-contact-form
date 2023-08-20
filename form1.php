<!DOCTYPE html>
<html>
    <head>
        
        <title>Contact form for beauty saloon</title>
        <style>
            *
            {
                padding: 0;
                margin: 0;
                font-family: sans-serif;
            }
            body{
               
               
                background-image: url(images/beauty.jpeg);
                background-repeat:no-repeat;
                background-size: 100%;
                color: white;
                
            }

            .form
            {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                width: 500px;
            }
            .form h1{
                color: rgb(255, 35, 138);
                font-size: 50px;
                font-weight: bold;
                text-align: center;
                text-transform: uppercase;
                margin: 40px 0;
            }
            .form h3{
                font-size: 25px;
                margin: 15px 0;
            }
            .form input{
                font-size: 16px;
                padding: 15px 10px;
                width: 100%;
                border: 0;
                border-radius: 5px;
                outline: none;
                color: black;
            }
            .form button
            {
                font-size: 18px;
                color: white;
                font-weight: bold;
                margin: 20px 0;
                padding: 10px 15px;
                width: 40%;
                border: 0;
                border-radius: 5px;
                background-color: gray;
     
            }
            .form button:hover
            {
                color: pink;
            }
            .butter
            {
                float:right;
    
            }
            .red
            {
                font-size: 15px;
                font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
                color: red;
            }
            
        </style>
       
    </head>

    <body>
    <?php
    $nameerror=$phnoerror=$emailerror=$subjecterror=$messageerror="";
    $name=$phno=$email=$subject=$message="";
if($_SERVER["REQUEST_METHOD"] == "POST"){


     if(empty($_POST["name"]))
    {   
        $nameerror="please enter your  name";
    }
    
    else{
        
        $name=$_POST["name"];
        if(!preg_match("/^[a-zA-Z]+$/",$name))
        {
            $nameerror="please enter valid name";
        }
        
    }
    if(empty($_POST["phno"])){
       $phnoerror="phone number is required";
    }
    else{
        
        $phno=$_POST["phno"];
        if(!preg_match("/^[6-9]{1}[0-9]{9}+$/",$phno))
        {
            $phnoerror="please enter a valid number";
        }
    }
    if(empty($_POST["email"])){
        $emailerror="email address is required";
    }
    else{
        
        $email=$_POST["email"];
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $emailerror="enter a valid email address";
        }
    }
    if(empty($_POST["subject"])){
        $subject="";
    }
    else{
        
        $subject=$_POST["subject"];
        
    }
    if(empty($_POST["message"])){
       $message="";
    }
    else{
        
        $message=$_POST["message"];
    }
    
   
    if(!empty($name && $phno && $email && $subject && $message)){
    $con = mysqli_connect("localhost","root","","test");
    $sqli = "insert into contact_form value('$name','$phno','$email','$subject','$message')";
        if(mysqli_query($con, $sqli) || !empty('but2')){
             echo "detailes are registered successfully";
             header("location:form1.php");
             exit();
}
       else{
             header("location:form1.php");
             echo "something wrong";
             exit();
    }
}
}
?>
        <div class="form">
        <h1>PHP Beauty Saloon</h1>
        
        <form name="Contact_form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >

        <h3>Full Name</h3>
        <input type="text" name="name" value = <?php  echo $name; ?>>
        <span class="red">* <?php echo $nameerror ?></span>

        <h3>Phone Number</h3>
        <input type="number" name="phno"  maxlength="10" value = <?php  echo $phno; ?>>
        <span class="red">* <?php echo $phnoerror ?></span>

        <h3>Email</h3>
        <input type="email" name="email" value = <?php  echo $email; ?> >
        <span class="red">* <?php echo $emailerror ?></span>

        <h3>Subject</h3>
        <input type="text" name="subject"  value = <?php  echo $subject; ?>>
       

        <h3>Message</h3>
        <input type="text" name="message" value= <?php  echo $message; ?> ><br>
        

        
        <br><button type ="reset" name="but1">Clear</button>
        <button type ="submit"  name="but2" class="butter">Submit</button>
       
                </form>
            </div>
    </body>
</html>