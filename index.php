<?php
 session_start();
 require_once "functions.php" ;
 $con=connect_my_db();   
 $uname=$_POST['user'];
 $pwd=$_POST['pass'];
 $sql="select * from users where email='$uname' AND pwd='$pwd' limit 1";

 if(isset($_POST['login']))
  {
    if(mysqli_error($con))
    echo "<br>Error = ".mysqli_error($con);
    $result=mysqli_query($con,$sql);
    $login=mysqli_num_rows($result)==1;
    if($login)
      {
        $userinfo=mysqli_fetch_assoc($result);
        $_SESSION['userid']=$userinfo['id'];
        $_SESSION['user']=$_POST['desg'];
        header("location:orders.php");
        exit();
      } 
    if(!$login)
      {
        echo '<script type="text/javascript"> alert("You Have Entered Incorrect Email/Password !!!"); </script>'; 
      }
  }
  if(isset($_POST['ordernow']))
  {
    $name=$_POST['name'];
    $event=$_POST['event'];
    $date=$_POST['date'];
    $guests=$_POST['guests'];
    $phno=$_POST['phno'];
    $message=$_POST['message'];

    $order = "INSERT INTO orders(`name`,`event`,`date`,`guests`,`phno`,`message`) VALUES ('$name','$event','$date','$guests','$phno','$message')";
    $order=mysqli_query($con,$order);
    if(!$order)
    {
        echo mysqli_error($con);
    }
  }
  ?>
  <html>
    <head>
        <title>our royal caterers </title>
        <style>
            body,html{background-color:rgb(30,10,10); margin:0; overflow-x:hidden; background-image:url('bg.jpg'); background-repeat:no-repeat; background-size:100%;position:center; height:100%;width:100%;}
            .none{padding:2%;}
            .row{width:100%;}
            .orc{font-size:large;}
            .col-15{width:15%; float:left;}
            .col-15r{width:17%; float:right;}
            .col-60{width:60%; float:left;}            .left{float;}
            .info{color:white;text-align:left; padding:1%; background-color:rgba(000,000,000,0.700);z-index:2; }
            h4{color:white;text-align:left;}
            .login{border-color:#CBB26A; border-radius:25px; padding:5%; background:inherit; color:white;}
            .login:hover{color:chartreuse; cursor:pointer;}
            /* navbar */
            .navbarlog { text-align:center; overflow: hidden; padding:1%; background-color:rgba(000,000,000,0.600); box-shadow: 0px 8px 16px 0px rgba(0,0,0,1.0);}
            .navbar{ text-align:center; overflow: hidden; padding:2%; background-color:rgba(000,000,000,0.600); box-shadow: 0px 8px 16px 0px rgba(0,0,0,1.0);}
            .navbarorc{ text-align:center; overflow: hidden; padding:1%; background-color:rgba(000,000,000,0.600); box-shadow: 0px 8px 16px 0px rgba(0,0,0,1.0);}
            .navbarorc a { font-size: 16px; color:white; text-align: center; padding: 14px 16px; text-decoration: none; }
            .navbar a { font-size: 16px; color:white; text-align: center; padding: 14px 16px; text-decoration: none; }
            .navbar a:hover {color:#CBB26A;}
            /* closable tabs */
            input[type=text],[type=number],input[type=password], select, textarea { width: 50%; padding: 12px; border: 1px rgb(255, 81, 0);box-shadow: 0px 1px 2px 0px rgba(0,0,0,1.0); border-radius: 4px; }
            u{color:blue;}
            .box{background-image:url('login.jpg');background-repeat:no-repeat;background-size:100%; height:100%; width:100%; top:0%; z-index:10; position:absolute; padding:3%; color:white; font-size:20px; background-color:rgba(000,000,000,1.0); box-shadow: 0px 8px 16px 0px rgba(0,0,0,1.0); border-radius:15px;}
            .boxg{background-size:100%; height:100%; width:100%; top:0%; z-index:10; position:absolute; padding:3%; color:white; font-size:20px; background-color:rgba(000,000,000,0.9); box-shadow: 0px 8px 16px 0px rgba(0,0,0,1.0); border-radius:15px;}
            .boxe{background-image:url('bg5.jpg');background-repeat:no-repeat; background-size:100%; background-position:center; width:100%; top:0%; z-index:10; position:absolute; padding:3%; color:white; font-size:20px; background-color:rgba(000,000,000,1.0); box-shadow: 0px 8px 16px 0px rgba(0,0,0,1.0); border-radius:15px;}
            .btn{background-color:inherit; color:black; font-size:16px; border:inherit;}
            .col-25 { float: left; width: 15%; margin-top: 10px;padding:1%;}
            .col-75 { float: left; width: 75%; margin-top: 6px; }
            .con{width:15%; padding:1%; background-color:rgb(255, 0, 0); color:white; border:none; border-radius:15px; box-shadow:0px 3px 8px 0px rgba(0,0,0,1.0);}
            .con:hover{ background-color:blue; font-size:16px; color:white; box-shadow: 0px 8px 16px 0px rgba(0,0,0,1.0);}
            .conhead{ color:white; border:15px;}
            .left{ float:left; }          .right{ float:right; }
            .loghead{padding:1%; color:#CBB26A; border:15px;}
            .mybtn{width:25%; padding: 2%; background-color:red; color:white; border:none; border-radius:15px; box-shadow:0px 3px 8px 0px rgba(0,0,0,1.0);}
            .mybtn:hover{ background-color:blue; color:white; box-shadow: 0px 8px 16px 0px rgba(0,0,0,1.0);}
            .padding{padding-left:5%; padding-top:5%;}         .padtop{ padding-top:30%; }   .padrit{padding-right:5%; padding-top:2%;}  .padleft{padding-left:5%; padding-top:2%;} 
            .padl{padding-left:40%; padding-top:20%; padding-right:15%;}
            span{cursor:pointer;}
            /* footer */
            .subpart{display: flex; }
            .subpart .field:first-child{ margin-right: 10px; }
            .subpart .field:last-child{ margin-left: 10px; }
            .footer{width:100%; padding-top:5%; font-size:large; padding-bottom:5%; background-color:rgba(000,000,000,0.600); color:white; border-radius:5px;}
            .footer a{text-decoration:none; color:white;  cursor:pointer;}
            .footer a:hover{color:#CBB26A;}
            .colmn{width:32%; padding:2%;}
            .copy{text-align:center; width:100%; text-align:center; padding-top:1%; padding-bottom:1%; background-color:rgba(000,000,000,0.600); color:white; border-radius:5px;}
            .copy a{text-decoration:none; color:white;}
            .copy a:hover{color:#CBB26A;}
            /*scrollbar */
            ::-webkit-scrollbar {width: 0px;} /* width */
            ::-webkit-scrollbar-track { box-shadow: inset 0 0 5px inherit; border-radius: 10px; }/* Track */
            ::-webkit-scrollbar-thumb { background: inherit; border-radius: 10px; }/* Handle */
            ::-webkit-scrollbar-thumb:hover { background: inherit; }/* Handle on hover */
        </style>
    </head>    
    <body>
        <!-- -------------------------       navbar start       ------------------------------ -->
            <div class="bg">
                <div class="none"></div>
                    <center>
                        <div class="row">
                            <div class="navbarorc col-15">
                                <a class="left" href=""><b class="orc">Our Royal Caterers</b></a>
                            </div>
                            <div class="navbar col-60" >
                                <a href="about.html">About Us</a> 
                                <a href="menu.html"> Menu</a>                            
                                <a href="events.html"> Events</a>
                                <a onclick="openTabs('Gallery')">Gallery</a>   
                                <a href="contact.php">Contact Us</a>                                              
                            </div>
                            <div class="navbarlog col-15r">
                                <button onclick="openTabs('login')" class="login">Admin Login</button>
                                <button onclick="openTabs('order')" class="login">Book an Event</button>
                            </div>
                        </div>    
                    </center>                 
            </div>   
        <!-- -------------------------        navbar end        ------------------------------ -->
        <!-- -------------------------      gallery start       ------------------------------ -->
            <div id="Gallery" class="boxg tabs" style="display:none">
                <span  onclick="this.parentElement.style.display='none'" class="left">&#10060;</span><br><br>
                    <center><h1>Gallery</h1></center><hr>
                <?php
                    $imagesDirectory = "gallery/";
                    
                    if(is_dir($imagesDirectory))
                    {
                        $opendirectory = opendir($imagesDirectory);
                        
                        while (($image = readdir($opendirectory)) !== false)
                        {
                            if(($image == '.') || ($image == '..'))
                            {
                                continue;
                            }
                            
                            $imgFileType = pathinfo($image,PATHINFO_EXTENSION);
                            
                            if(($imgFileType == 'jpg') || ($imgFileType == 'png'))
                            {
                                echo "<img src='gallery/".$image."' width='200'> ";
                            }
                ?>  &nbsp; &nbsp;  &nbsp;  &nbsp; 
                <?php
                        }
                        closedir($opendirectory);
                    }
                ?>
            </div>    
        <!-- -------------------------       gallery end        ------------------------------ -->  
        <!-- -------------------------       login  start       ---------------------------    -->
            <center>
                <div id="login" class="box tabs" style="display:none">
                    <span class="left" onclick="closetabs();"> &#10060; </span>
                    <header class="loghead">
                        <h1>Log In</h1> 
                    </header>  <hr class="hr">
                    <form method="POST">
                        <div class="padding">            
                            <label for="user">Username :</label>            
                            <input type="text" id="user" name="user" placeholder="User Name" />
                        </div>
                        <div class="padding">
                            <label for="pass">Password :</label>
                            <input type="text" id="pass" name="pass" placeholder="Password" />
                        </div>
                        <div class="padding">
                            <input type="submit" class="mybtn" value="Login" name="login">
                        </div>
                        <br>
                    </form>    
                </div>
            </center>
        <!-- -------------------------       login  end         ---------------------------    -->
        <!-- -------------------------       event  start       ---------------------------    -->
            <center>
                <div id="order" name="order" class="boxe tabs" style="display:none">
                    <span class="left" onclick="closetabs();"> &#10060; </span>
                    <header class="loghead">
                        <h1>Book an Event Now</h1> 
                    </header>  <hr class="hr">
                    <form method="post"><br>
                    <div class="row">
                        <div class="col-25">
                            <label for="name">Full Name</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="name" name="name" placeholder="Your full name..">
                        </div>                        
                    </div><br><br><br>
                    <div class="row">
                        <div class="col-25">
                            <label for="event">Event</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="event" name="event" placeholder="Type of event ..">
                        </div>
                    </div><br><br><br>
                    <div class="row">
                        <div class="col-25">
                            <label for="eventdate">Date of Event</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="date" name="date" placeholder="Date of event ..">
                        </div>
                    </div><br><br><br>
                    <div class="row">
                        <div class="col-25">
                            <label for="guest">No of Guests</label>
                        </div>
                        <div class="col-75">
                            <input type="number" id="guests" name="guests" placeholder="No of Guests ..">
                        </div>
                    </div><br><br><br>
                    <div class="row">
                        <div class="col-25">
                            <label for="pno">Phone Number</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="phno" name="phno" placeholder="Your phone number ..">
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
                        <input type="submit" class="con" style="float:left;" value="Book now" name="ordernow" />
                    </div>                
                </form>   
                </div>
            </center>
        <!-- -------------------------       event  end         ---------------------------    -->
        <!-- -------------------------       info  start        ---------------------------    -->  
            <div class="none"></div>
            <div class="none"></div>
            <div class="none"></div>

            <div class="info">
                <h4>Formal vegetarian meals</h4>
                <p>
                    are usually served in a particular order and required to be consumed in a particular order as well.<br>
                    These meals are served on Plantain leaves or Mutuka leaves, dry Tendu-like leaves staples together into big circular discs. <br>
                    First accompaniments are served which includes a variety of Palya, Kosambari, sweet-savory gojju, hot spicy chutney Pickles,<br>
                    bajji, bonda, vada, Papads. The first course alternated between sweets and rice preparation.<br>
                </p>
                <p>
                    The second course is a set of curries to be consumed with rice.
                    It generally starts with Tovve, a mild lentil dish laced with ghee, Majjige Huli, vegetables simmered in a mild yogurt<br>
                    sauce, followed by Huli, lentils and vegetables spiced and tempered with ghee, mustard, asafoetida and curry leaves.<br> 
                    This is followed by Tili Saaru which is a thin lentil stock spiced and laced with ghee and curry leaves. <br>
                    The final course of the meal is rice and curd with pickles.
                </p>
                <p>
                    Buttermilk is also served to be consumed at the end of the meal.
                </p>
                <p>
                    A typical simple household meal consists of pickle, salad (kosambri), vegetable dish (palle) or lentil dish (kaal),<br>
                    chutneys, curd, bread (chapati, rotti etc), dessert (this does not have to be eaten at the end), rice and different <br>
                    curries/soups (saar) and finally curd rice. 
                </p>
            </div> 
            <div class="none"></div>
        <!-- -------------------------        info  end         ---------------------------    --> 
        <!-- -------------------------       footer  start      ---------------------------    --> 
            <div class="footer subpart">
                <div class="colmn">
                    <h4>Contact</h4><br>
                    <p><b>Address :</b> Our Royal Caterers,<br>
                       &emsp;&emsp;&emsp;&emsp; opposite to murudeshwar arch,<br>
                       &emsp;&emsp;&emsp;&emsp; near railway station<br>
                       &emsp;&emsp;&emsp;&emsp; murudeshwar,bhatkal tq,<br>
                       &emsp;&emsp;&emsp;&emsp; Uttara Kannada,Karnataka ,India
                    </p>
                    <p><b>E-mail :</b> ourroyalcaterers@gmail.com</p>
                    <p>&nbsp;<b>Ph-no :</b> 9876543210</p>   
                </div>
                <div class="colmn">
                    <h4>Account</h4><br>
                    <a href="menu.html"> Menu</a><br>                            
                    <a href="events.html"> Events</a><br>
                    <a href="gallery.php">Gallery</a><br>
                </div>  
                <div class="colmn">
                    <h4>Information</h4><br>
                    <a href="about.html">About Us</a><br>                    
                    <a href="contact.php">Contact Us</a><br>
                    <a href="pp.html">Privacy Policy</a><br>
                    <a href="tc.html">Terms & Conditions</a><br>
                </div>                          
            </div><br><br>
            <div class="copy">
                <p >&copy; Copyrights <a href=""><b>Our Royal Caterers</b></a>. All Rights Reserved. </p>
            </div>  
            <div class="none"></div>

        <!-- -------------------------       footer  end        ---------------------------    --> 
    </body>
    <script>
         // closable tabs 

      function closetabs(tabsName) 
      {
        var i;
        var x = document.getElementsByClassName("tabs");
        for (i = 0; i < x.length; i++) 
        {
          x[i].style.display = "none";  
        }
        document.getElementById("bokon").style.display = "block";
      }
      
      function openTabs(tabsName) 
      {
        var i;
        var x = document.getElementsByClassName("tabs");
        for (i = 0; i < x.length; i++) 
        {
          x[i].style.display = "none";  
        }
        document.getElementById(tabsName).style.display = "block"; 
      }

     // modal login 
     
        <?php 
        if ($error)
        {
          echo"alert('$error');";
        } ?>
    </script>    
</html>