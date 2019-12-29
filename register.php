<?php
include("admin/db/db.php");

//-----------declration
$success="";
$res="";
$sql="";
$error_name="";
$error_email="";
$error_username="";
$error_password="";
//--------------------register
if(isset($_POST['register']))
{
	
$name=$_POST['name'];
$email=$_POST['email'];
$cat=$_POST['cat'];
$username=$_POST['name'];
$pass=md5($_POST['pass']);
$status="registered";
//$date=  date("Y-m-d", strtotime($dat));

if($_FILES['photo']['size']>0)
{
$file=$_FILES['photo']['tmp_name'];
$image=$_FILES["photo"] ["name"];
move_uploaded_file($_FILES["photo"]["tmp_name"],"admin/upload/" . $_FILES["photo"]["name"]);
$photo=$_FILES["photo"]["name"];	
}
else
{
$photo="no image uploaded";	
}
if(!empty($name) && !empty($email) && !empty($username) && !empty($pass))
{
$check = mysql_query("SELECT vis_user FROM visitor_register WHERE  vis_user = '{$username}';");	
if (mysql_num_rows($check) == 0) {	
$sql="insert into visitor_register(vis_name,vis_email,vis_image,vis_gender,vis_user,vis_pass,vis_status) values('".$name."','".$email."','".$photo."','".$cat."','".$username."','".$pass."','".$status."')";
}
else
{
echo "<script>alert('Already Registered Registered')</script>";	
}
$res=mysql_query($sql);


if($res>0)
{
	echo "<script>alert('Successfully Registered')</script>";
	$success="successfully registered";
}
}
else
{
echo "<script>alert('Please fill the form')</script>";
if($name=="")
{
$error_name="Fill your name";	
}
else
if($email=="")
{
$error_email="Fill your email";	
}
else
if($username=="")
{
$error_username="Fill your username";	
}
else
if($pass=="")
{
$error_password="Fill your password";	
}


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

    <script src="js/vendor/modernizr-2.6.2.min.js"></script>

</head>
<body>
<style>
.newsletter p {
    
    color: white;
}
label {
    color: white;
}
#cat
{
    background: #fff;
    border: 1px solid #ddd;
    padding: 12px 15px;
	width: 60%;
}
#img {
	background: #fff;
    border: 1px solid #ddd;
    padding: 12px 15px;
	width: 60%;
}
input[type="file"] {
    
    margin-top: -40px;
}
</style>
    <!--[if lt IE 7]>
    <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
    <![endif]-->

    
    <header class="site-header">
        <div class="top-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="top-header-left">
                            <a href="register.php" style="background-color:#2a80b9; color:#FFF">Sign Up</a>
                            <a href="index.php#login" style="background-color:#2a80b9; color:#FFF">Log In</a>
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
                            <li><a href="index.php">Home</a></li>
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

    <div class="content-section" >
    
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <!--<div class="product-item-1">
                        <div class="product-thumb">
                            <img src="images/gallery-image-1.jpg" alt="Product Title">
                        </div> 
                        <div class="product-content">
                            <h5><a href="#">Kool Shirt</a></h5>
                            <span class="tagline">Partner Name</span>
                            <span class="price">$25.00</span>
                            <p>Doloremque quo possimus quas necessitatibus blanditiis excepturi. Commodi, sunt asperiores tenetur deleniti labore!</p>
                        </div> 
                    </div>--> <!-- /.product-item -->
                </div> <!-- /.col-md-3 -->
                
                
                <div class="col-md-5">
                    <div class="product-holder">
                         <!-- /.product-item-2 -->
                         
                         
                         
                         <div class="newsletter" >
                        
                                <form action="" method="post" enctype="multipart/form-data">
                           <div id="reg" style="color:#900; font-size:18px;"><?php echo $success; ?></div>
                           



                                    <p>Sign up for feedbacks and rate your comments.</p>
                                    <div id="reg" style="color:#900; font-size:18px;"><?php echo $error_name; ?></div>
                                    <label>Name</label><p><input type="text" title="Name" name="name" placeholder="Your Name Here"></p>
                                    
                                    <div id="reg" style="color:#900; font-size:18px;"><?php echo $error_email; ?></div>
                                    <label >Email</label><p><input type="email" title="Email" name="email" placeholder="Your Email Here"></p>
                                    
                                    <p><label >Image</label></p>
                                    <label id="img">Image</label><p><input type="file" title="Photo" name="photo" placeholder="Your Photo Here" ></p>
                                    
                                    <label id="gend">Gender</label><p>
                                    <select name="cat" id="cat" class="postform">
                                            <!--<option value="-1">- Select -</option>-->
                                            
                                            <option class="male" value="male">Male</option>
                                            <option class="female" value="female">Female</option>
                                        </select>
                                        </p>
                                        
                                       <div id="reg" style="color:#900; font-size:18px;"><?php echo $error_username; ?></div>
                                       <label>Username</label><p><input type="text" title="Username" name="username" placeholder="Your Username Here"></p>
                                       
                                       <div id="reg" style="color:#900; font-size:18px;"><?php echo $error_password; ?></div>
                                       <label>Password</label><p><input type="password" title="Password" name="pass" placeholder="Your Password Here"></p>
                                        
                                    <input type="submit" class="s-button" value="Submit" name="register">
                                    <input type="button" class="" value="Login" name="login" onClick="window.location.href='index.php#login'" style="width:100px; float:right">
                                </form>
                            </div>
                         
                         
                         
                         
                         
                         <!-- /.product-item-2 -->
                        <div class="clearfix"></div>
                    </div> <!-- /.product-holder -->
                </div> <!-- /.col-md-5 -->
                
                
                
                
                
                
                <div class="col-md-4">
                    <!--<div class="product-item-3">
                        <div class="product-thumb">
                            <img src="images/featured/6.jpg" alt="">
                        </div> 
                        <div class="product-content">
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <h5><a href="#">Name Of Shirt</a></h5>
                                    <span class="tagline">Partner Name</span>
                                    <span class="price">$20.00</span>
                                </div> 
                                <div class="col-md-6 col-sm-6">
                                    <div class="full-row">
                                        <label for="cat">Gender:</label>
                                        <select name="cat" id="cat" class="postform">
                                            <option value="-1">- Select -</option>
                                            <option class="level-0" value="49">Female</option>
                                            <option class="level-0" value="56">Male</option>
                                        </select>
                                    </div>
                                    <div class="full-row">
                                        <label for="cat1">Size:</label>
                                        <select name="cat1" id="cat1" class="postform">
                                            <option value="-1">- Select -</option>
                                            <option class="level-0" value="49">Small</option>
                                            <option class="level-0" value="49">Medium</option>
                                            <option class="level-0" value="56">Large</option>
                                            <option class="level-0" value="56">X-Large</option>
                                        </select>
                                    </div>
                                    <div class="full-row">
                                        <label for="cat2">Color:</label>
                                        <select name="cat2" id="cat2" class="postform">
                                            <option value="-1">- Select -</option>
                                            <option class="level-0" value="2">Blue</option>
                                            <option class="level-0" value="3">Red</option>
                                            <option class="level-0" value="1">Pink</option>
                                            <option class="level-0" value="4">Black</option>
                                            <option class="level-0" value="4">Wlack</option>
                                        </select>
                                    </div>
                                </div> 
                                <div class="col-md-12 col-sm-12">
                                    <div class="button-holder">
                                        <a href="#" class="red-btn"><i class="fa fa-angle-down"></i></a>
                                    </div> 
                                </div> 
                            </div> 
                        </div> 
                    </div>--> <!-- /.product-item-3 -->
                </div> <!-- /.col-md-4 -->
            </div> <!-- /.row -->
             <!-- /.row -->
        </div> <!-- /.container -->
    </div> <!-- /.content-section -->
    
    
    
    
    

     <!-- /.content-section -->

    
    
    
    
    
    
    
    
    
     

    <footer class="site-footer">
         <!-- /.our-partner -->
        <!--<div class="main-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="footer-widget">
                            <h3 class="widget-title">About Us</h3>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi, debitis recusandae.
                            <ul class="follow-us">
                                <li><a href="#"><i class="fa fa-facebook"></i>Facebook</a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i>Twitter</a></li>
                            </ul> 
                        </div> 
                    </div> 
                    <div class="col-md-3">
                        <div class="footer-widget">
                            <h3 class="widget-title">Why Choose Us?</h3>
                            Kool Store is free responsive eCommerce template provided by templatemo website. You can use this layout for any website.
                            <br><br>Tempore cum mollitia eveniet laboriosam corporis voluptas earum voluptate. Lorem ipsum dolor sit amet.
                            <br><br>Credit goes to <a rel="nofollow" href="http://unsplash.com">Unsplash</a> for all images.
                        </div> 
                    </div> 
                    <div class="col-md-2">
                        <div class="footer-widget">
                            <h3 class="widget-title">Useful Links</h3>
                            <ul>
                                <li><a href="#">Our Shop</a></li>
                                <li><a href="#">Partners</a></li>
                                <li><a href="#">Gift Cards</a></li>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Help</a></li>
                            </ul>
                        </div> 
                    </div> 
                    <div class="col-md-4">
                        <div class="footer-widget">
                            <h3 class="widget-title">Our Newsletter</h3>
                            <div class="newsletter">
                                <form action="#" method="get">
                                    <p>Sign up for our regular updates to know when new products are released.</p>
                                    <label>Name</label><p><input type="text" title="Email" name="email" placeholder="Your Email Here"></p>
                                    <input type="text" title="Email" name="email" placeholder="Your Email Here">
                                    <input type="file" title="Email" name="email" placeholder="Your Email Here" style="background-color:#FFF; width:192px; margin-top:5px;">
                                    <input type="submit" class="s-button" value="Submit" name="Submit">
                                </form>
                            </div> 

                        </div> 
                    </div> 
                </div> 
            </div> 
        </div>--> <!-- /.main-footer -->
        
        
        
        
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