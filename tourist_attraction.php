
<?php
include("admin/db/db.php");
session_start();
if(isset($_SESSION['username']) || ($_SESSION['id']))
{
	

//------------------------------------profile
$prof="select vis_image from visitor_register where vis_id='".$_SESSION['id']."'";
$res_prf=mysql_query($prof);
$profile=mysql_fetch_array($res_prf);
/*if($profile['vis_image']=="no image uploaded")
{
	echo "no";
}
else
{
	echo "yes";
}*/
//-----------search place------------------------
if(isset($_POST['search']))
{
 $srch_field=$_POST['srch_field'];	
 $sql="select * from place where plc_name like '%".$srch_field."%' order by plc_id  desc";
$res=mysql_query($sql);	
}
else
{
//----------------------display all places for rate
$sql="select * from place order by plc_id  desc";
$res=mysql_query($sql);
}
//----------------------display like---------


?>
<style>


</style>

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
<!--------------------------------pagination script--------------------->
 <style>
#page_navigation a{
	padding:3px;
	border:1px solid #2d3e50;
	margin:2px;
	color:black;
	text-decoration:none;
	
}
.active_page{
	background:#39F;
	color:white !important;
}
</style>
<script>

             

             
			 
              $(document).ready(function(){  
    //how much items per page to show  
    var show_per_page = 12;  
    //getting the amount of elements inside content div  
    var number_of_items = $('#content').children().size();  
    //calculate the number of pages we are going to have  
    var number_of_pages = Math.ceil(number_of_items/show_per_page);  
  
    //set the value of our hidden input fields  
    $('#current_page').val(0);  
    $('#show_per_page').val(show_per_page);  
  
    //now when we got all we need for the navigation let's make it '  
  
    /* 
    what are we going to have in the navigation? 
        - link to previous page 
        - links to specific pages 
        - link to next page 
    */  
    var navigation_html = '<a class="previous_link" href="javascript:previous();">Prev</a>';  
    var current_link = 0;  
    while(number_of_pages > current_link){  
        navigation_html += '<a class="page_link" href="javascript:go_to_page(' + current_link +')" longdesc="' + current_link +'">'+ (current_link + 1) +'</a>';  
        current_link++;  
    }  
    navigation_html += '<a class="next_link" href="javascript:next();">Next</a>';  
  
    $('#page_navigation').html(navigation_html);  
  
    //add active_page class to the first page link  
    $('#page_navigation .page_link:first').addClass('active_page');  
  
    //hide all the elements inside content div  
    $('#content').children().css('display', 'none');  
  
    //and show the first n (show_per_page) elements  
    $('#content').children().slice(0, show_per_page).css('display', 'block');  
  
});  
  
function previous(){  
  
    new_page = parseInt($('#current_page').val()) - 1;  
    //if there is an item before the current active link run the function  
    if($('.active_page').prev('.page_link').length==true){  
        go_to_page(new_page);  
    }  
  
}  
  
function next(){  
    new_page = parseInt($('#current_page').val()) + 1;  
    //if there is an item after the current active link run the function  
    if($('.active_page').next('.page_link').length==true){  
        go_to_page(new_page);  
    }  
  
}  
function go_to_page(page_num){  
    //get the number of items shown per page  
    var show_per_page = parseInt($('#show_per_page').val());  
  
    //get the element number where to start the slice from  
    start_from = page_num * show_per_page;  
  
    //get the element number where to end the slice  
    end_on = start_from + show_per_page;  
  
    //hide all children elements of content div, get specific items and show them  
    $('#content').children().css('display', 'none').slice(start_from, end_on).css('display', 'block');  
  
    /*get the page link that has longdesc attribute of the current page and add active_page class to it 
    and remove that class from previously active page link*/  
    $('.page_link[longdesc=' + page_num +']').addClass('active_page').siblings('.active_page').removeClass('active_page');  
  
    //update the current page input field  
    $('#current_page').val(page_num);  
}  
      
	  
	///////---------------pagination end--------------------------------------------



</script>

    <!--[if lt IE 7]>
    <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
    <![endif]-->

    
    <header class="site-header">
        <div class="top-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="top-header-left">
                            <!--<a href="#">Sign Up</a>-->
                            
                            <a href="logout.php" style="background-color:#2a80b9; color:#FFF">Logout</a>
                        </div> <!-- /.top-header-left -->
                    </div> <!-- /.col-md-6 -->
                    <div class="col-md-6 col-sm-3">
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
						  .img-circle {
							  border-radius: 50%;
						  }
						  img
						  {
							border-radius: 22%;  
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
    
    
    

    <div class="content-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 section-title">
                    <h2>Places</h2>
                    <div id="search" style="padding-right:1px;">
                    <form method="post" action="">
                    <label for="textfield">Search</label>
                    <input type="text" name="srch_field" id="textfield" style="width:250px;"value="" />
                    <input type="submit" name="search" id="button" value="Submit" />
                    </form>
                    </div>
                    
                </div> <!-- /.section -->
            </div> <!-- /.row -->
            <div class="row">
            
            
                 <!-- /.col-md-3 -->
               <!----pagination div------>

<!-- the input fields that will hold the variables we will use -->  
  <input type='hidden' id='current_page' />  
<input type='hidden' id='show_per_page' />
  
<!-- Content div. The child elements will be used for paginating(they don't have to be all the same,  
    you can use divs, paragraphs, spans, or whatever you like mixed together). '-->  
   
   <br clear="all"> 
 <br clear="all">
  
<div id='content'>

<!----pagination div end------>
                
                 <!-- /.col-md-3 -->
                
                
                
                
                
                 <!-- /.col-md-3 -->
                
                
                
                <?php while($res_dis=mysql_fetch_array($res)) {?>
                <?php 
				 $sql_cmt="SELECT (SELECT count(*)  FROM comment where chk_like='1' and plc_id='".$res_dis['plc_id']."') as chklike ,(SELECT count(*)  FROM comment where chk_dislike='1' and plc_id='".$res_dis['plc_id']."') as dislikee ";
				$dis_cmt=mysql_query($sql_cmt);
				
				?>
                
                <div class="col-md-3 col-sm-6">
                    <div class="product-item-vote">
                        <div class="product-thumb">
                        <div id="img_one">
                            <img src="admin/upload/<?php echo $res_dis['plc_photo']; ?>" alt="Product Title" style="height:250px; width:250px;" class="image left" >
                            </div>
                            <div id="img_sec">
                            <img src="admin/upload/<?php echo $res_dis['plc_photo_bg']; ?>" class="image left" alt="" style="height:250px; width:250px; display:none;" />
                            </div>
                            
                        </div> <!-- /.product-thum -->
                        <div class="product-content">
                            <h5><a href="view_details.php?idd=<?php echo rand(0,10000) ;?>&& pl=<?php echo $res_dis['plc_id']; ?>"><?php echo $res_dis['plc_name']; ?></a></h5>
                            <!--<span class="tagline">By: Rebecca</span>-->
                            <a href="view_details.php?idd=<?php echo rand(0,10000) ;?>&& pl=<?php echo $res_dis['plc_id']; ?>"><p><?php echo substr($res_dis['description'],0,100); ?></p></a><a href="view_details.php?idd=<?php echo rand(0,10000) ;?>&& pl=<?php echo $res_dis['plc_id']; ?>">read more....</a>
                            
                            
                            
                            
                            
                            <?php while($display=mysql_fetch_array($dis_cmt)) {?>
                            <ul class="progess-bars">
                            
                                <li>
                                
                                
                                    <div class="progress">
                                    
                                       Total Like:<i class="fa fa-thumbs-o-up"></i> <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $display['chklike']; ?>%"></div>
                                        
                                        <span><?php echo $display['chklike'] ?><i class="fa fa-heart"></i></span>
                                    </div>
                                    
                                    
                                </li>
                                <li>
                                    <div class="progress">
                                    Total Disike:<i class="fa fa-thumbs-o-down"></i><div class="progress-bar comments" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $display['dislikee']; ?>%"></div>
                                        <span class="comments"><?php echo $display['dislikee']; ?><i class="fa fa-heart"></i></span>
                                    </div>
                                    
                                </li>
                            </ul>
                            
                            <?php } ?>
                            
                            
                            
                            
                        </div> <!-- /.product-content -->
                    </div> <!-- /.product-item-vote -->
                </div> <!-- /.col-md-3 -->
                <?php } ?>
                
                
                
                
                
                
            </div> <!-- /.row -->
            
        </div> <!-- /.container -->
        
        
    </div> <!-- /.content-section -->
    
    
    <br clear="all">
<!----pagination div------>
<div class="container"> 
<div class="col-md-6"></div>
<div id='page_navigation'>
</div>  
</div>
</div>
<!----pagination div  end------>

    <footer class="site-footer">
         <!-- /.our-partner -->
         <!-- /.main-footer -->
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