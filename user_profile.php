<?php
include("admin/db/db.php");
session_start();
if(isset($_SESSION['username']) || ($_SESSION['id']))
{
//------------------------------------profile
$prof="select vis_image from visitor_register where vis_id='".$_SESSION['id']."'";
$res_prf=mysql_query($prof);
$profile=mysql_fetch_array($res_prf);
//----------------------display all places for rate
$sql="select * from visitor_register where vis_id='".$_SESSION['id']."'";
$res=mysql_query($sql);
$dat_ds=mysql_fetch_array($res);

//----------------------display like---------


?>

<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
<!-- 
Kool Store Template
http://www.templatemo.com/preview/templatemo_428_kool_store
-->
    <meta charset="utf-8">
    <title>Tourism</title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">

    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800" rel="stylesheet">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/normalize.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/templatemo-misc.css">
    <link rel="stylesheet" href="css/templatemo-style.css">

    <script src="js/vendor/modernizr-2.6.2.min.js"></script>

</head>
<body>
    <!--[if lt IE 7]>
    <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
    <![endif]-->

    
    <header class="site-header">
        <div class="top-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="top-header-left">
                             <a href="logout.php" style="background-color:#2a80b9; color:#FFF">Logout</a>
                        </div> <!-- /.top-header-left -->
                    </div> <!-- /.col-md-6 -->
                    <div class="col-md-6 col-sm-6">
                        <div class="social-icons" style="">
                        <style>
						.top-header .social-icons {
                          margin-top: 12px;
						  margin-right: 215px;
                         }
						 .avatar {
                          vertical-align: middle;
                          width: 30px;
                          height: 28px;
                          border-radius: 50%;
                          }
						</style>
                         <?php if($profile['vis_image']=="no image uploaded") {  ?>
                        <img src="images/usuario-masculino-imagem-no-perfil_318-37825.jpg" alt="Avatar" class="avatar">
                        
                        <?php }  else { ?>
                        <img src="admin/upload/<?php  echo $profile['vis_image']; ?>" alt="Avatar" class="avatar">
                        <?php } ?>
                        <span style="color:#2a80b9; font-size:16px;"> <?php echo $_SESSION['username'] ?></span>
                         
                         
                         |  <a href="user_profile.php" style="color:#F00; bold; font-size:16px;">Profile</a>
                           
                            <!--<ul >
                            
                            <div id="profile" >
                             
                              </div>  
                                
                            </ul>-->
                            <div class="clearfix"></div>
                        </div> <!-- /.social-icons -->
                    </div> <!-- /.col-md-6 -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </div> <!-- /.top-header -->
        <div class="main-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-8">
                        <div class="logo">
                           <h1><a href="#">Tourism-</a></h1><h7>Promote tourism through comments and reviews</h7>
                        </div> <!-- /.logo -->
                    </div> <!-- /.col-md-4 -->
                    <div class="col-md-8 col-sm-6 col-xs-4">
                        <div class="main-menu">
                            <a href="#" class="toggle-menu">
                                <i class="fa fa-bars"></i>
                            </a>
                            <ul class="menu">
                                <li><a href="admin/logout_one.php">Admin Login</a></li>
                            </ul>
                        </div> <!-- /.main-menu -->
                    </div> <!-- /.col-md-8 -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </div> <!-- /.main-header -->
        <div class="main-nav">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-7">
                        <div class="list-menu">
                            <ul>
                                <li><a href="tourist_attraction.php">Home/ Tourist Attraction</a></li>
                                <!--<li><a href="user_profile.php">User Profile</a></li>-->
                            </ul>
                        </div> <!-- /.list-menu -->
                    </div> <!-- /.col-md-6 -->
                    <div class="col-md-6 col-sm-5">
                        <div class="notification">
                            <span>Comment your reviews and rate places</span>
                        </div>
                    </div> <!-- /.col-md-6 -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </div> <!-- /.main-nav -->
    </header> <!-- /.site-header -->

     <!-- /.content-section -->

     <!-- /.content-section -->
     
     
     
     
    
    

    <footer class="site-footer">
         <!-- /.our-partner -->
        <div class="main-footer">
            <div class="container">
                <div class="row">
                    
                    <div class="col-md-3">
                        <div class="footer-widget">
                            <h3 class="widget-title">My Details</h3>
                            <ul style="font-size:14px; ">User :  <?php echo $dat_ds['vis_user']; ?></ul>
                            <br>
                            <ul style="font-size:14px; ">Name :  <?php echo $dat_ds['vis_name']; ?></ul>
                            <br>
                            <ul style="font-size:14px; ">Email :  <?php echo $dat_ds['vis_email']; ?></ul>
                            <br>
                           <ul style="font-size:14px; "> Gender :  <?php echo $dat_ds['vis_gender']; ?></ul>
                            
                            
                            <br><br> <a rel="nofollow" href="profile_edit.php?idd=<?php echo rand(0,10000) ;?>&& usr=<?php echo $dat_ds['vis_id']; ?>" style="color:#F00; font-size:14px">Edit Profile</a> 
                        </div> <!-- /.footer-widget -->
                    </div> <!-- /.col-md-3 -->
                     <!-- /.col-md-2 -->
                    <div class="col-md-3">
                        <div class="footer-widget">
                            <h3 class="widget-title">Profile Pic</h3>
                            <div class="newsletter">
                            <div class="profile_pic" style="height:150px; width:100px;">
             <img src="admin/upload/<?php echo $dat_ds['vis_image']; ?>" style="height:150px; width:200px;">
                             </div>
                            </div> 

                        </div> 
                    </div> 
                    
                   
                   
                   <div class="col-md-1">
                         
                    </div>
                    
                    
                    
                    
                   
                   
                   
                   
                   
                    
                    
                    
                    
                    <!-- /.col-md-4 -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </div> <!-- /.main-footer -->
        <div class="bottom-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <span>Copyright &copy; 2084 <a href="#">Company Name</a> | Design: <a href="http://www.templatemo.com">templatemo</a></span>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium, expedita soluta mollitia accusamus ut architecto maiores cum fugiat. Pariatur ipsum officiis fuga deleniti alias quia nostrum veritatis enim doloremque eligendi?</p>
                    </div> <!-- /.col-md-12 -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </div> <!-- /.bottom-footer -->
    </footer> <!-- /.site-footer -->

    
    <script src="js/vendor/jquery-1.10.1.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.1.min.js"><\/script>')</script>
    <script src="js/jquery.easing-1.3.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>


</body>
</html>
<?php
}
else
{
header("location:index.php");	
}
?>