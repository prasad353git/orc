<?php
 session_start();
 require_once "functions.php" ;
 $con=connect_my_db();

 if(isset($_POST['contact']))
  {
    $name=$_POST['name'];
    $pno=$_POST['pno'];
    $message=$_POST['message'];

    $insert = "INSERT INTO messages(`name`,`pno`,`messages`) VALUES ('$name','$pno','$message')";
    $insert=mysqli_query($con,$insert);
    if(!$insert)
    {
        echo mysqli_error($con);
    }
  }
  ?>
<html>
<head>
    <title>Contact Us</title>
    <style>
        body{ padding-bottom:2%;margin:0; background-image:url('bg2.jpg'); background-repeat:no-repeat; background-size:cover;position:center; height:100%;width:100%;}
        /* closable tabs */
        input[type=text],input[type=password], select, textarea{ width: 50%; padding: 12px; border: 1px rgb(255, 81, 0);box-shadow: 0px 1px 2px 0px rgba(0,0,0,1.0); border-radius: 4px; }
        u{color:blue;}
        .box{top:0%; z-index:10; position:absolute; padding-top:1%; padding-right:3%; padding-bottom:3%; padding-left:3%; width:93%; height:90%; color:Black; font-size:20px; background: inherit;  border-radius:15px;}
        .btn{background-color:inherit; color:black; font-size:16px; border:inherit;}
        .col-25 { float: left; width: 15%; margin-top: 10px; }
        .col-75 { float: left; width: 75%; margin-top: 6px; }
        .con{width:15%; padding:1%; background-color:rgb(255, 0, 0); color:white; border:none; border-radius:15px; box-shadow:0px 3px 8px 0px rgba(0,0,0,1.0);}
        .con:hover{ background-color:blue; font-size:16px; color:white; box-shadow: 0px 8px 16px 0px rgba(0,0,0,1.0);}
        .conhead{ color:white; border:15px;}
        .left{ float:left; }          .right{ float:right; } .yellow{color:yellow;}
        .loghead{padding:0.5%; color:white; border:15px;}
        label{color:white; }
        .mybtn{width:25%; padding: 2%; background-color:rgb(255, 0, 0); color:white; border:none; border-radius:15px; box-shadow:0px 3px 8px 0px rgba(0,0,0,1.0);}
        .mybtn:hover{ background-color:blue; font-size:16px; color:white; box-shadow: 0px 8px 16px 0px rgba(0,0,0,1.0);}
        .padding{padding-left:5%; padding-top:5%;}         .padtop{ padding-top:30%; }   .padrit{padding-right:5%; padding-top:2%;}  .padleft{padding-left:5%; padding-top:2%;} 
        .padl{padding-left:40%; padding-top:20%; padding-right:15%;}
        span{cursor:pointer;}
    </style>    
</head>    
<body>
    <center>
        <div id="contactus" class="box tabs">
            <header class="conhead">
            <span class="left" onclick="closetabs();"> &#10060; </span>
                <h1>Contact Us</h1>
            </header>
            <label class="yellow"> Email : ourroyalcaterers@gmail.com </label>
            <hr class="hr">

            <form method="post"><br>
                <div class="row">
                    <div class="col-25">
                        <label for="name">Name</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="name" name="name" placeholder="Your name..">
                    </div>
                    
                </div><br><br><br>
                <div class="row">
                    <div class="col-25">
                        <label for="pno">Phone Number</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="pno" name="pno" placeholder="Your pno ID..">
                    </div>
                </div><br><br><br>                
                <div class="row">
                    <div class="col-25">
                        <label for="message">Message</label>
                    </div>
                    <div class="col-75">
                        <textarea id="message" name="message" placeholder="Write Message Here.." style="height:100px"></textarea>
                    </div>
                </div><br><br><br>            
                <div class="padding">
                    <input type="submit" class="con" style="float:left;" value="Submit" name="contact">
                </div>                
            </form>
        </div>
    </center>
</body>
<script>
    function closetabs() 
    {
        location.replace("index.php")
    }
</script>    
</html>