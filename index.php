<?php
include("admin/db/db.php");

//------------select places to display in home page/index.php-----------
$sql="SELECT * FROM place order by plc_id desc LIMIT 0,1";
$res=mysql_query($sql);
//$res_data=mysql_fetch_array($res);


//------------select places to display in home page/index.php-----------
$sql_dt="SELECT * FROM place order by plc_id desc LIMIT 2,2";
$res_dat=mysql_query($sql_dt);

//------------select places to display in home page/index.php-----------
$sql_dt_tw="SELECT * FROM place order by plc_id desc LIMIT 4,1";
$res_dat_tw=mysql_query($sql_dt_tw);

//------------select places to display in home page/index.php-----------
$sql_dt_fr="SELECT * FROM place order by plc_id desc LIMIT 2,3";
$res_dat_fr=mysql_query($sql_dt_fr);

if(isset($_POST['Submit']))
{
//$username=$_POST['username'];
//$password=$_POST['password'];
$status="registered";
$sts_up="updated";
 

 $sql_login=mysql_query("select * from visitor_register where vis_user='".$_POST['username']."' and vis_pass='".md5($_POST['password'])."' ") ;
$res_login=mysql_fetch_array($sql_login);
if($res_login>0)
{
session_start();
$_SESSION['id']=$res_login['vis_id'];
$_SESSION['username']=$res_login['vis_user'];
header("location:tourist_attraction.php");

}
else
{
	echo "<script>alert('Login Failed')</script>";
header("Refresh:0; url=index.php#login");
	
}

	
}

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

<script src="js/jquery1.11.0min.js"></script>
    <script src="js/vendor/modernizr-2.6.2.min.js"></script>

</head>
<body>
    <!--[if lt IE 7]>
    <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
    <![endif]-->

    <style>
	img
	{
	border-radius: 7%;  
	}
	</style>
    <header class="site-header">
        <div class="top-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="top-header-left">
                            <a href="register.php" style="background-color:#2a80b9; color:#FFF">Sign Up</a>
                            <a href="#login" style="background-color:#2a80b9; color:#FFF">Log In</a>
                        </div> <!-- /.top-header-left -->
                    </div> <!-- /.col-md-6 -->
                    <div class="col-md-6 col-sm-6">
                        <div class="social-icons">
                            <ul>
                                <li><a href="www.facebook.com" class="fa fa-facebook"></a></li>
                                
                                <li><a href="www.twitter.com" class="fa fa-twitter"></a></li>
                                <li><a href="www.linkedin.com" class="fa fa-linkedin"></a></li>
                            </ul>
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
                                <li><a href="about_us.php">About Us</a></li>
                                <li><a href="admin/index.php">Admin Login</a></li>
                                
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
                                <li><a href="index.php#login">Tourist Attraction</a></li>
                                <!--<li><a href="product-detail.html">Details</a></li>
                                <li><a href="contact.html">Contact</a></li>-->
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
    
    
    
    
    

    <div class="content-section">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                <?php while($res_data_dis=mysql_fetch_array($res)) { ?>
                
                <div class="product-item-2">
                    <div class="product-item-1">
                        <div class="product-thumb">
                            <img src="admin/upload/<?php echo $res_data_dis['plc_photo_bg']; ?>" alt="Product Title" style="height:450px; width:350px;">
                        </div> 
                        <div class="product-content overlay">
                            
                            <span class="price" style="font-weight:1000; color:#2a80b9;"><?php echo $res_data_dis['plc_name']; ?></span>
                      <a href="index.php#login" style="color:#2a80b9"><p><?php echo substr($res_data_dis['description'],0,120); ?></p></a><a href="#">read more....</a>
                      
                      <h5><a href="index.php#login" style="font-weight:800">Add Comment</a></h5>
                            <span class="tagline" style="font-weight:600"><a href="index.php#login">Rate Place</a></span>
                        </div> 
                    </div> 
                    </div>
                    <?php } ?>
                    
                </div> 
                
                
                
                
                
                
                <div class="col-md-5">
                
                
                    <div class="product-holder">
                    <?php while($res_sec_data=mysql_fetch_array($res_dat)) { ?>
                        <div class="product-item-2">
                        
                            <div class="product-thumb">
                            
                                <img src="admin/upload/<?php echo $res_sec_data['plc_photo_bg']; ?>" alt="Product Title" style="height:250px; width:460px;">
                                 
                            </div>
                            
                            <div class="product-content overlay">
                            
                                <h5><a href="#" style="font-weight:800; color:#2a80b9"><?php echo $res_sec_data['plc_name']; ?></a></h5>
                                <span class="tagline" style=" color:#2a80b9"><a href="index.php#login" style="color:#2a80b9"><p><?php echo substr($res_sec_data['description'],0,120); ?></p></a><a href="#" style="color:#09F">read more....</a></span>
                               <h5><a href="index.php#login" style="font-weight:800">Add Comment</a></h5>
                            <span class="tagline" style="font-weight:600"><a href="index.php#login">Rate Place</a></span> 
                                
                            </div> 
                        </div> 
                         <?php } ?>
                        
                        
                        <div class="clearfix"></div>
                    </div> 
                   
                    
                </div> 
                
                
                
                
                
                
                <div class="col-md-4">
                <?php while($res_th_data=mysql_fetch_array($res_dat_tw)) { ?>
                <div class="product-item-2">
                    <div class="product-item-3">
                        <div class="product-thumb">
                            <img src="admin/upload/<?php echo $res_th_data['plc_photo']; ?>" alt="" style="height:400px; width:350px;">
                        </div> 
                        <div class="product-content overlay">
                            <!--<div class="row">
                                <div class="col-md-6 col-sm-6">-->
                                    <h5><a href="#" style="color:#2a80b9"><?php echo $res_th_data['plc_name']; ?></a></h5>
                                    <!--<span class="tagline"><?php echo $res_th_data['plc_name']; ?></span>-->
                                    <!--<span class="price">$20.00</span>-->
                                    <a href="index.php#login" style="color:#2a80b9"><p><?php echo substr($res_th_data['description'],0,180); ?></p></a><a href="#">read more....</a>
                                    
                                    <h5><a href="index.php#login" style="font-weight:800">Add Comment</a></h5>
                            <span class="tagline" style="font-weight:600"><a href="index.php#login">Rate Place</a></span>
                                </div> 
                                
                                
                      
                        
                         
                    </div>
                    </div> 
                    
                    
                </div>
                <?php } ?> 
            </div> 
            <div class="row">
            <?php while($res_fr_data=mysql_fetch_array($res_dat_fr)) { ?>
                <div class="col-md-4 col-sm-6 col-xs-12">
                
                
                    <div class="product-item-4">
                    
                        <div class="product-thumb">
                            <img src="admin/upload/<?php echo $res_fr_data['plc_photo_bg']; ?>" alt="Product Title" style="height:250px; width:450px;">
                        </div> 
                        <div class="product-content overlay">
                            <h5><a href="#" style="font-weight:800; color:#2a80b9"><?php echo $res_fr_data['plc_name']; ?></a></h5>
                            
                            <a href="index.php#login" style="color:#2a80b9"><p><?php echo substr($res_fr_data['description'],0,100); ?></p></a><a href="#" style="color:#2a80b9">read more....</a>
                            
                            <h5><a href="index.php#login" style="font-weight:800">Add Comment</a></h5>
                            <span class="tagline" style="font-weight:600"><a href="index.php#login"  >Rate Place</a></span>
                        </div> 
                        
                    </div> 
                    
                    
                </div> 
                <?php } ?>
                
               
                
            </div> 
        </div> 
    </div> <!-- /.content-section -->
   

    <footer class="site-footer">
        <div class="our-partner">
            <div class="container">
                <div class="row">
                
                
                
                     
                    
                    
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </div> <!-- /.our-partner -->
        <div class="main-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="footer-widget">
                            <h3 class="widget-title">About Us</h3>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi, debitis recusandae.
                            <ul class="follow-us">
                                <li><a href="www.facebook.com"><i class="fa fa-facebook"></i>Facebook</a></li>
                                <li><a href="www.twitter.com"><i class="fa fa-twitter"></i>Twitter</a></li>
                            </ul> <!-- /.follow-us -->
                        </div> <!-- /.footer-widget -->
                    </div> <!-- /.col-md-3 -->
                    <div class="col-md-3">
                        <div class="footer-widget">
                            <h3 class="widget-title">Why Choose Us?</h3>
                            Kool Store is free responsive eCommerce template provided by templatemo website. You can use this layout for any website.
                            <br><br>Tempore cum mollitia eveniet laboriosam corporis voluptas earum voluptate. Lorem ipsum dolor sit amet.
                            <br><br>Credit goes to <a rel="nofollow" href="http://unsplash.com">Unsplash</a> for all images.
                        </div> <!-- /.footer-widget -->
                    </div> <!-- /.col-md-3 -->
                    <div class="col-md-2">
                        <div class="footer-widget">
                            <h3 class="widget-title">Useful Links</h3>
                            <ul>
                                <li><a href="#">Our Places</a></li>
                                <li><a href="#">Useful link</a></li>
                                <li><a href="#"></a></li>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Help</a></li>
                            </ul>
                        </div> <!-- /.footer-widget -->
                    </div> <!-- /.col-md-2 -->
                    <div class="col-md-4">
                    
                    
                    
                    <div id="login">
                        <div class="footer-widget">
                            <h3 class="widget-title">Login</h3>
                            <div class="newsletter">
                                <form action="#" method="post">
                                    <p>Login for rate your place and view comments</p>
                                    <label>Username</label><p><input type="text" title="username" name="username" placeholder="Your Username Here"></p>
                                    
                                    <label>Password</label><p><input type="password" title="password" name="password" placeholder="Your Password Here"></p>
                                    
                                    <input type="submit" class="s-button" value="Submit" name="Submit">
                                </form>
                            </div> <!-- /.newsletter -->

                        </div> 
                        </div>
                        
                        
                        
                        
                        <!-- /.footer-widget -->
                    </div> <!-- /.col-md-4 -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </div> <!-- /.main-footer -->
        <div class="bottom-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <span>Copyright &copy; 2084 <a href="#">Tourism</a>  <a href="http://www.templatemo.com"></a></span>
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