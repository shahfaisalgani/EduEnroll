<?php
session_start();
error_reporting(0);
include("includes/config.php");
if(isset($_POST['submit']))
{
    $regno=$_POST['regno'];
    $password=md5($_POST['password']);
$query=mysqli_query($con,"SELECT * FROM students WHERE StudentRegno='$regno' and password='$password'");
$num=mysqli_fetch_array($query);
if($num>0)
{
$_SESSION['login']=$_POST['regno'];
$_SESSION['id']=$num['studentRegno'];
$_SESSION['sname']=$num['studentName'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=1;
$log=mysqli_query($con,"insert into userlog(studentRegno,userip,status) values('".$_SESSION['login']."','$uip','$status')");
header("location:http:change-password.php");
}else{
$_SESSION['errmsg']="Invalid Reg no or Password";
header("location:http:index.php");
}
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Student Login</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <style>
  p{
    color: aliceblue;
    margin-top: 27rem;
    font-size: 40px;
    font-family: 'Times New Roman', Times, serif;
   
  }
  @media screen and (max-width: 600px) {
        p{
          margin-top: 19rem;
          margin-left: 10rem;
          font-size: 20px;
        }
      }
      .fram{
        min-width: 300px;
        width: 150px; 
        min-height: 250px;
        float:right;
        margin-top: -100px;
        margin-right: 50px;
      }
      @media screen and (max-width: 600px) {
        .fram{
          margin-top: 100px;
          float:right;
          margin-right: 6px;
        }
      }
     
</style>
</head>
<body>
    <?php include('includes/header.php');?>

<section class="menu-section">
<div class="dec">
        <br>
        <img src="h.jfif" style="width:50px;height:50px;float:left;margin-left: 9px;border-radius:40px;margin-top: -13px;">
        <h>WELCOME TO HOME BOOKING</h>
      
        <p>
          Do Booking Your Dream Home<br>
          And Complete Your Dream
        </p>
        <iframe src='https://webchat.botframework.com/embed/homeapplangservice-bot?s=QTo3OW4B30Q.vXQpz9bd3j7p1OAQ06NvjoRRPaAmuPkRD1XT7AJQvtQ' class="fram"></iframe>
      </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                             <li><a href="index.php">Home </a></li>
                             <li><a href="admin/">Admin Login </a></li>
                              <li><a href="index.php">Student Login</a></li>
        

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Please Login To Enter </h4>

                </div>

            </div>
             <span style="color:red;" ><?php echo htmlentities($_SESSION['errmsg']); ?><?php echo htmlentities($_SESSION['errmsg']="");?></span>
            <form name="admin" method="post">
            <div class="row">
                <div class="col-md-6">
                     <label>Enter Reg no : </label>
                        <input type="text" name="regno" class="form-control"  />
                        <label>Enter Password :  </label>
                        <input type="password" name="password" class="form-control"  />
                        <hr />
                        <button type="submit" name="submit" class="btn btn-info"><span class="glyphicon glyphicon-user"></span> &nbsp;Log Me In </button>&nbsp;
                </div>
                </form>
                <div class="col-md-6">
                    <div class="alert alert-info">
                
                         <strong> Latest News / Updates</strong>
                         <marquee direction='up'  scrollamount="2" onmouseover="this.stop();" onmouseout="this.start();">
                        <ul>
                            <?php
$sql=mysqli_query($con,"select * from news");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>
                            <li>
                              <a href="news-details.php?nid=<?php echo htmlentities($row['id']);?>"><?php echo htmlentities($row['newstitle']);?>-<?php echo htmlentities($row['postingDate']);?></a>
                            </li>
                           <?php } ?> 
                     
                        </ul>
                    </marquee>
                       
                    </div>
                                    </div>

            </div>
        </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->
    <?php include('includes/footer.php');?>
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
</body>
</html>
