<!DOCTYPE html>
<html>
  <head>
    <title>Messages</title>
    <style>
      body,html{margin:0; background-image:url('bg.jpg'); background-repeat:no-repeat; background-size:cover;position:center; height:100%;width:100%;}
      table{border-radius:5px; border-color:blue; width:50%; color:white;}
      th,td{border-radius:5px; text-align:center; padding:0.1%; color:white;}
      th{padding:1%;}
      fieldset{width:90%; border-radius:5px; border-color:#01FF00;}
      .bg{position:fixed; overflow-x:hidden; background-image:url('back.jpg'); background-repeat:no-repeat; background-size:cover;position:center; height:100%;width:100%;}
      .box{position:absolute; padding-left:3%;padding-right:3%;padding-bottom:3%; width:94%; color:white; font-size:20px; background-color:rgba(000,000,000,0.700); box-shadow: 0px 8px 16px 0px rgba(0,0,0,1.0); border-radius:15px;}
      .mybtn{width:10%; padding:1%; background-color:#7b3d11; color:white; border:none; border-radius:5px; box-shadow:0px 3px 8px 0px rgba(0,0,0,1.0);}
      .mybtn:hover{background-color:#F7642D; font-size:16px; color:white; box-shadow: 0px 8px 16px 0px rgba(0,0,0,1.0);}
      .h1{ color:white; border-radius:15px; text-align: center;}
      input[type=text],[type=number], select, textarea { width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 4px; resize: vertical; }
      .del{background:#7b3d11; color:white;border:none;border-radius:15px; width:100%;height:150%;}
      .del[type=submit]:hover{background:red;}
      .right{float:right;} .left{float:left;}
      @media screen and (max-width: 600px) { .col-15, .col-65,input[type=submit] { width: 100%;  margin-top: 10; } select{height:20%;} }
    </style>
  </head>
<body>
  <div class="bg">
    <div class="box">
          <?php
            session_start(); 
            require_once "functions.php" ;
            $con=connect_my_db();
        
            $result=mysqli_query($con,"SELECT * FROM users where id=".$_SESSION['userid']);
            
            if(mysqli_error($con))      
            echo "<br>Error = ".mysqli_error($con);
        
            if(isset($_POST['logout'])) 
            {
                session_destroy();
                header('Location: indexday.php');
            }
              
            if($result && mysqli_num_rows($result)>0)
            {
              $userinfo=mysqli_fetch_assoc($result);
              
              if($userinfo['desg']==2)
              {
          
                $rec = mysqli_query($con,"SELECT * FROM messages"); 
                $msg = mysqli_fetch_array($rec);
                //------------------------delete message-------------------------------
                if(isset($_POST['mdelete']))
                {
                  $id = $_POST['mdelete'];
                  $del = mysqli_query($con,"delete from messages where id = $id");
                } 
                //----------------------------------------------------------------------

                if(isset($_POST['gallery'])) 
                {
                    header('Location: img.php');
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
          <br><h1 class="h1">All Messages</h1>
          <form method="post">
            <div>
              <br>
              <input type="submit" value="gallery" name="gallery" class="mybtn left" />
              <input type="submit" value="orders" name="orders" class="mybtn left" />
              <input type="submit" value="logout" name="logout" class="mybtn right" />
              <br><br><br><br>
            </div>
          </form>  
        <center>
          <form method='post'>
            <fieldset>
              <legend>Messages</legend>
              <table border="3" cellpadding=10>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <td style="font-weight:bold;">Message</th>
                    <th>Delete</th>
                  </tr> 
                <?php
                $records = mysqli_query($con,"SELECT * FROM messages"); // fetch data from database
                while($data = mysqli_fetch_array($records))
                {
                ?>
                    <tr>
                      <td><?php echo $data['name']; ?>&nbsp;&nbsp;&nbsp;</td>
                      <td><?php echo $data['pno']; ?>&nbsp;&nbsp;</td>
                      <td><?php echo $data['messages']; ?>&nbsp;&nbsp;</td>
                      <td><button name="mdelete" id="mdelete" value="<?php echo $data['id']; ?>" class="del">Delete</button></td>
                    </tr>	  
                <?php
                }
                ?>
              </table>
          </form>
              <?php mysqli_close($con);  // close connection ?>
          </fieldset>
        </center>  
      <?php
              }
          }
      ?>
    </div>
  </div>
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
</script>  
</html>