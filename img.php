<html>
<?php 
    session_start(); 
    require_once "functions.php" ;
    $con=connect_my_db();

    $result=mysqli_query($con,"SELECT * FROM users where id=".$_SESSION['userid']);
    
    if(mysqli_error($con))      
    echo "<br>Error = ".mysqli_error($con);

       if(isset($_POST['messages'])) 
        {
            header('Location: messages.php');
        }

      if(isset($_POST['orders'])) 
        {
            header('Location: orders.php');
        }
            
      if(isset($_POST['logout'])) 
      {
          session_destroy();
          header('Location: index.php');
      }
?>

    <head>
	<title>Upload Images</title>
	<style>
        a{color:white;}
        body,html{margin:0; background-image:url('bg.jpg'); background-repeat:no-repeat; background-size:cover;position:center; height:100%;width:100%;}
        fieldset{width:90%; border-radius:5px; border-color:#01FF00;}
        .bg{position:fixed; overflow-x:hidden; background-image:url('back.jpg'); background-repeat:no-repeat; background-size:cover;position:center; height:100%;width:100%;}
        .box{position:absolute; padding-left:3%;padding-right:3%;padding-bottom:3%; width:94%; color:white; font-size:20px; background-color:rgba(000,000,000,0.700); box-shadow: 0px 8px 16px 0px rgba(0,0,0,1.0); border-radius:15px;}
        .mybtn{width:10%; padding:1%; background-color:#7b3d11; color:white; border:none; border-radius:5px; box-shadow:0px 3px 8px 0px rgba(0,0,0,1.0);}
        .mybtn:hover{background-color:#F7642D; font-size:16px; color:white; box-shadow: 0px 8px 16px 0px rgba(0,0,0,1.0);}
        .h1{ color:white; border-radius:15px; text-align: center;}
        input[type=text],[type=number], select, textarea { width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 4px; resize: vertical; }
		input[type=file], select { width: 50%; padding: 12px; border: 1px rgb(255, 81, 0);box-shadow: 0px 1px 2px 0px rgba(0,0,0,1.0); border-radius: 4px; }
        .right{float:right;} .left{float:left;}       
        @media screen and (max-width: 600px) { .col-15, .col-65,input[type=submit],select { width: 100%;  margin-top: 10; } select{height:20%;} }
 	</style>
</head>
<body>
    <div class="bg">
        <div class="box">
            <h1 class="h1">Upload Images</h1>
            <form method="post">
                <div>
                    <br>
                    <input type="submit" value="messages" name="messages" class="mybtn left" />
                    <input type="submit" value="orders" name="orders" class="mybtn left" />
                    <input type="submit" value="logout" name="logout" class="mybtn right" />
                    <br><br><br><br>
                </div>
            </form>
            <center>
            <fieldset>
                <legend>Upload Images</legend>
                <?php    
                    if($result && mysqli_num_rows($result)>0)
                    {
                        $userinfo=mysqli_fetch_assoc($result);
                        
                        if($userinfo['desg']==1 || $userinfo['desg']==2)
                        {
                ?>  
                            <form method="POST" action="gallery.php" enctype="multipart/form-data">
                                <input type="file" name="file"/>
                                <input type="submit" value="Upload" class="mybtn" />
                            </form>
                        <?php  
                            $files = scandir("gallery");
                            for( $a = 2 ; $a < count($files); $a++)
                                {
                        ?>
                                    <p>
                                        <a href="delete.php?name=gallery/<?php echo $files[$a]; ?>" style="color: red;"> Delete</a>
                                        <a href="gallery/<?php echo $files[$a];?>" ><?php echo $files[$a];?></a>&nbsp&nbsp&nbsp&nbsp
                                    </p>
                    <?php
                                } 
                        }
                    }
                    ?> 
            </fieldset>
            </center>
        </div>
    </div>      
</body>   
</html>