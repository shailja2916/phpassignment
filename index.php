<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Source+Sans+Pro');
    </style>
    <link rel="stylesheet" media="all" type="text/css" href="Cs/bootstrap-3.3.7-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" media="all" type="text/css" href="stylee.css" />
    <script src="js/jquery-3.2.1.min.js"></script>  
</head>
<body>
 <?php
         $eerr = $fnerr  =$lnerr =$merr=$terr=" ";
        $email = $fname = $lname=$mob=$txt= "";
    
        $boolen  = false;
       
    
        if($_SERVER["REQUEST_METHOD"] == "POST")
     {
            
           if(empty($_POST["fname"]))
        {
                $fnerr = "** First  Name Required...!";
                $boolen  = false;
            }
       
          else{
                $name = validate_input($_POST["fname"]);
                $boolen  = true;
            }

       if(empty($_POST["lname"]))
        {
                $lnerr = "** Last  Name Required...!";
                $boolen  = false;
            }
          else{
                $name1 = validate_input($_POST["lname"]);
                $boolen  = true;
            }
            

            if(empty($_POST["email"])){
                $eerr = "** Email Required";
                $boolen  = false;
            }
          elseif(!filter_var($_POST["email"],FILTER_VALIDATE_EMAIL))
           {
                $eerr = "** Invalid Email";
                $boolen  = false;
            }
         else
         {
                $email = validate_input($_POST["email"]);
                $boolen  = true;
            }       

 if(empty($_POST["mob"])){
                $merr = "** Mobile Number Required";
                $boolen  = false;
            }
          elseif(preg_match("/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/", $mob)) 
           {
                $merr = "** Please enter a valid Phone Number";
                $boolen  = false;
            }
         else
         {
                $mob = validate_input($_POST["mob"]);
                $boolen  = true;
            }    
if(empty($_POST["txt"]))
          {
                $terr = "** Biography Required";
                $boolen  = false;
            }
          
         else
         {
                $txt = validate_input($_POST["txt"]);
                $boolen  = true;
            }       
if($boolen)
{
if(mail('shailja2916@gmail.com','Verification Mail',$_POST["fname"].$_POST["lname"].$_POST["email"].$_POST["mob"].$_POST["txt"]))
echo "THANK YOU";
else
echo "THANK YOU";
}
                   
        }  


       
        function validate_input($data)
       {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }   
            
    ?>

    <form method="post" enctype="multipart/form-data" action="<?php  echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="container">
            <div class="inner">

                <div class="title">
                    <h3></h3>
                </div>
                      
             <table>
	  

                     <div class="txt">
	 <label><b>First Name</b></label>

                    <input type="text" id="txtfname" name="fname" placeholder="">

                    <span id="c" class="glyphicon glyphicon-envelope"></span>
                     </div>
                     <span id="span"><?php echo $fnerr; ?></span>


                   <div class="txt1">
	<label><b>Last Name</b></label>
                    <input type="text" id="txtlname" name="lname" placeholder="">
                    <span id="c1" class="glyphicon glyphicon-envelope"></span>
                     </div>
                     <span id="span"><?php echo $lnerr; ?></span>
                       
                    <div class="txt2">
	<label><b>Email</b></label>
                        <input type="text" id="txtemail" name="email" placeholder="">
                        <span id="c2" class="glyphicon glyphicon-envelope"></span>
                    </div>
                        <span id="span"><?php echo $eerr; ?></span>

	<div class="txt3">
	<label><b>Mobile Number</b></label>
                        <input type="text" id="txtnum" name="mob" placeholder="">
                        <span id="c3" class="glyphicon glyphicon-envelope"></span>
                    </div>
                        <span id="span"><?php echo $merr; ?></span>


                    <div class="txt4">
	<label><b>Biography</b></label>
                   <textarea cols="20" rows="5"name="txt"  id="txts" maxlength="150" style="overflow:scroll;" WRAP ></textarea>
                    <span id="c4" class="glyphicon glyphicon-envelope"></span>
                    </div>
                        <span id="span"><?php echo $terr; ?></span>


                    <div class="btnsub">
                    <input type="submit" name="Submit" id="btnsub" value="Submit">
                    
                </div>           
                
              </div>            
            

        </div>      
    </form>

   
</body>
</html>
