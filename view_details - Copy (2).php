<?php
include("admin/db/db.php");
session_start();
if(isset($_SESSION['username']) || ($_SESSION['id']))
{

$place_id=$_GET['pl'];
//----------------------display all places for rate
$sql="select * from place where plc_id='".$place_id."'";
$res=mysql_query($sql);
$data_result = '';
		   while($row=mysql_fetch_array($res))
		    {
			   
		    $data_result[] = array("plc_id"=>$row['plc_id'], "plc_name"=>$row['plc_name'],"plc_photo"=>$row['plc_photo'],"plc_photo_bg"=>$row['plc_photo_bg'],"plc_gu_name"=>$row['plc_gu_name'],"contact"=>$row['contact'],"near_place"=>$row['near_place'],"description"=>$row['description']);
		    }
//-----------------like--------			

if(isset($_POST['like']))
{
	
$like=1;
$dislike=0;
$comment="no comments";
$plc_id=$_POST['place_id'];
$vis_id=$_POST['vis_id'];
$date=date("Y-m-d");
$status="inserted";

$check = mysql_query("SELECT * FROM comment WHERE  plc_id = '{$plc_id}' and vis_id='{$vis_id}';");

if (mysql_num_rows($check) > 0) 
{
	$sql_up="update comment set chk_like='".$like."', chk_dislike='".$dislike."' where plc_id='".$plc_id."' and vis_id='".$vis_id."'";
	$res_up=mysql_query($sql_up);
	
}
else
{
$sql="insert into comment(chk_like,chk_dislike,comment,plc_id,vis_id,date,status) values('".$like."','".$dislike."','".$comment."','".$plc_id."','".$vis_id."','".$date."','".$status."')";
$res=mysql_query($sql);	
}

}
//-----------------dislike--------	
if(isset($_POST['dislike']))
{
$dislike=1;
$like=0;
$comment="no comments";
$plc_id=$_POST['place_id'];
$vis_id=$_POST['vis_id'];
$date=date("Y-m-d");
$status="inserted";	
$check = mysql_query("SELECT * FROM comment WHERE  plc_id = '{$plc_id}' and vis_id='{$vis_id}';");

if (mysql_num_rows($check) > 0) 
{
	$sql_up="update comment set chk_like='".$like."', chk_dislike='".$dislike."' where plc_id='".$plc_id."' and vis_id='".$vis_id."'";
	$res_up=mysql_query($sql_up);
}
else
{
$sql="insert into comment(chk_like,chk_dislike,comment,plc_id,vis_id,date,status) values('".$like."','".$dislike."','".$comment."','".$plc_id."','".$vis_id."','".$date."','".$status."')";
$res=mysql_query($sql);		
}
	
}


//----------------display like or dislike----
$sql_dis="select * from comment where plc_id='".$place_id."' and vis_id='".$_SESSION['id']."'";
$res_dis=mysql_query($sql_dis);
$dat_dis=mysql_fetch_array($res_dis);
if($dat_dis['chk_like']>0)
{
$likee='<i class="fa fa-thumbs-o-up"></i>';	
}
else if($dat_dis['chk_dislike']>0)
{
$likee='<i class="fa fa-thumbs-o-down"></i>';	
}
else
{
	$likee='';
	?>
	<style type="text/css">#hidee{
        display:none;
		}
		</style>
<?php         
}

//-------------------total like-----------------
 $sql_total="SELECT (SELECT count(*)  FROM comment where chk_like='1' and plc_id='".$place_id."') as chklike ,(SELECT count(*)  FROM comment where chk_dislike='1' and plc_id='".$place_id."') as dislikee ";
$res_total=mysql_query($sql_total);
$dis_count=mysql_fetch_array($res_total);


//-----------------post ur rate---------------


if(isset($_POST['rate']))
{
$place_id=$_POST['place_id'];
$vis_id=$_POST['vis_id'];
$comment=$_POST['comment'];
$date=date("Y-m-d");
$status="inserted";	



$sql_rate="select * from comment where plc_id='".$place_id."' and vis_id='".$vis_id."'";
$res_rat=mysql_query($sql_rate);
$get_rate=mysql_fetch_array($res_rat);
if($get_rate>0)
{
$sql_up_cmt="update comment set comment='".$comment."' where plc_id='".$place_id."' and vis_id='".$vis_id."'";
$res_up_cmt=mysql_query($sql_up_cmt);	
}
else
{
$sql_ins="insert into comment(chk_like,chk_dislike,comment,plc_id,vis_id,date,status) values('0','0','".$comment."','".$place_id."','".$vis_id."','".$date."','".$status."')";
$rate=mysql_query($sql_ins);	
}
	
}





//--------------------display rate-------------


//echo $sql_dis_rate="select distinct comment from comment where LIKE %' + aw + '%' and plc_id='".$place_id."' and vis_id='".$_SESSION['id']."'";
$sql_dis_rate="select comment,cmt_rating from comment where  plc_id='".$place_id."' and vis_id='".$_SESSION['id']."'";
$res_dis_rate=mysql_query($sql_dis_rate);
$ftc_rate=mysql_fetch_array($res_dis_rate);

//--------------------------5 star-----------


if($ftc_rate['cmt_rating']==5)
{
	?>
    <style type="text/css">#one,#two,#three,#four,#five{
        color:#ec3309;
		}
		</style>
    <?php
}
//--------------------------4 star-----------

else if($ftc_rate['cmt_rating']==4)
{
	?>
    <style type="text/css">#one,#two,#three,#four{
        color:#ec3309;
		}
		</style>
    <?php
}
//--------------------------3 star-----------

else if($ftc_rate['cmt_rating']==3)
{
	?>
    <style type="text/css">#one,#two,#three{
        color:#ec3309;
		}
		</style>
    <?php
}
//--------------------------3 star-----------

else if($ftc_rate['cmt_rating']==2)
{
	?>
    <style type="text/css">#one,#two{
        color:#ec3309;
		}
		</style>
    <?php
}
//--------------------------3 star-----------

else if($ftc_rate['cmt_rating']==1)
{
	?>
<style type="text/css">#one{
        color:#ec3309;
		}
		</style>
    <?php
}
//--------------------------3 star-----------

else if($ftc_rate['cmt_rating']==0)
{
	?>
<style type="text/css">#one,#two,#three,#four,#five{
        color:#2a80b9;
		}
		</style>
    <?php
}



//-------------------------rate by star---------------
if(isset($_POST['rate_one']))
{
 $_POST['rate_one'];
 $place_id=$_POST['place_id'];
 $vis_id=$_POST['vis_id'];
 $date=date("Y-m-d");
 $status="inserted";
 
 $sql_rate="select * from comment where plc_id='".$place_id."' and vis_id='".$vis_id."'";
$res_rat=mysql_query($sql_rate);
$get_rate=mysql_fetch_array($res_rat);
if($get_rate>0)
{
 
 $sq_up="update comment set cmt_rating='".$_POST['rate_one']."' where plc_id='".$place_id."' and vis_id='".$vis_id."'";exit;
$res_up=mysql_query($sq_up);
header("Refresh:0;");
}
else
{
	
 $sql_ins="insert into comment(chk_like,chk_dislike,comment,plc_id,vis_id,date,status,cmt_rating) values('0','0','No COMMENTS','".$place_id."','".$vis_id."','".$date."','".$status."','".$_POST['rate_one']."')";
$rate=mysql_query($sql_ins);
header("Refresh:0;");	
}

}


if(isset($_POST['rate_two']))
{
 $_POST['rate_two'];
 $place_id=$_POST['place_id'];
 $vis_id=$_POST['vis_id'];
 $date=date("Y-m-d");
 $status="inserted";
 
 $sql_rate="select * from comment where plc_id='".$place_id."' and vis_id='".$vis_id."'";
$res_rat=mysql_query($sql_rate);
$get_rate=mysql_fetch_array($res_rat);
if($get_rate>0)
{
 
 $sq_up="update comment set cmt_rating='".$_POST['rate_two']."' where plc_id='".$place_id."' and vis_id='".$vis_id."'";
$res_up=mysql_query($sq_up);
header("Refresh:0;");
}
else
{
	
 $sql_ins="insert into comment(chk_like,chk_dislike,comment,plc_id,vis_id,date,status,cmt_rating) values('0','0','No COMMENTS','".$place_id."','".$vis_id."','".$date."','".$status."','".$_POST['rate_two']."')";
$rate=mysql_query($sql_ins);
header("Refresh:0;");	
}

	
}


if(isset($_POST['rate_three']))
{
 $_POST['rate_three'];	
$place_id=$_POST['place_id'];
$vis_id=$_POST['vis_id'];
$date=date("Y-m-d");
 $status="inserted";
 
 $sql_rate="select * from comment where plc_id='".$place_id."' and vis_id='".$vis_id."'";
$res_rat=mysql_query($sql_rate);
$get_rate=mysql_fetch_array($res_rat);
if($get_rate>0)
{

$sq_up="update comment set cmt_rating='".$_POST['rate_three']."' where plc_id='".$place_id."' and vis_id='".$vis_id."'";
$res_up=mysql_query($sq_up);
header("Refresh:0;");
}
else
{
	
 $sql_ins="insert into comment(chk_like,chk_dislike,comment,plc_id,vis_id,date,status,cmt_rating) values('0','0','No COMMENTS','".$place_id."','".$vis_id."','".$date."','".$status."','".$_POST['rate_three']."')";
$rate=mysql_query($sql_ins);
header("Refresh:0;");	
}


}

if(isset($_POST['rate_four']))
{
 $_POST['rate_four'];
$place_id=$_POST['place_id'];
$vis_id=$_POST['vis_id'];


$date=date("Y-m-d");
 $status="inserted";
 
 $sql_rate="select * from comment where plc_id='".$place_id."' and vis_id='".$vis_id."'";
$res_rat=mysql_query($sql_rate);
$get_rate=mysql_fetch_array($res_rat);
if($get_rate>0)
{

 $sq_up="update comment set cmt_rating='".$_POST['rate_four']."' where plc_id='".$place_id."' and vis_id='".$vis_id."'";
$res_up=mysql_query($sq_up);
header("Refresh:0;");
} 
else
{
	
 $sql_ins="insert into comment(chk_like,chk_dislike,comment,plc_id,vis_id,date,status,cmt_rating) values('0','0','No COMMENTS','".$place_id."','".$vis_id."','".$date."','".$status."','".$_POST['rate_four']."')";
$rate=mysql_query($sql_ins);
header("Refresh:0;");	
}


}


if(isset($_POST['rate_five']))
{
 $_POST['rate_five'];
$place_id=$_POST['place_id'];
$vis_id=$_POST['vis_id'];

$date=date("Y-m-d");
 $status="inserted";
 
 $sql_rate="select * from comment where plc_id='".$place_id."' and vis_id='".$vis_id."'";
$res_rat=mysql_query($sql_rate);
$get_rate=mysql_fetch_array($res_rat);
if($get_rate>0)
{
$sq_up="update comment set cmt_rating='".$_POST['rate_five']."' where plc_id='".$place_id."' and vis_id='".$vis_id."'";
$res_up=mysql_query($sq_up);
header("Refresh:0;");	
}
else
{
	
 $sql_ins="insert into comment(chk_like,chk_dislike,comment,plc_id,vis_id,date,status,cmt_rating) values('0','0','No COMMENTS','".$place_id."','".$vis_id."','".$date."','".$status."','".$_POST['rate_five']."')";
$rate=mysql_query($sql_ins);
header("Refresh:0;");	
}


}


//-------------------------overall rating----------------
$sql_total_rate="";
$res_total="";
$total_rt="";
$sql_total_rate="select SUM(cmt_rating) as sum_rat ,count(cmt_rating) as tot_count from comment where plc_id='".$place_id."'";
$res_total=mysql_query($sql_total_rate);
$total_rt=mysql_fetch_array($res_total);
//echo $total_rt['sum_rat'];
//echo $total_rt['tot_count'];
  $average=$total_rt['sum_rat']   / $total_rt['tot_count'];
//--------------------select all comments about this place


$sel_cmt="select cmt_id,comment,vis_id from comment where plc_id='".$place_id."'";
$res_cmd=mysql_query($sel_cmt);
$sel_dis="";
while($row=mysql_fetch_array($res_cmd))
{
$sel_dis[]=array("cmt_id"=>$row['cmt_id'],"comment"=>$row['comment'],"vis_id"=>$row['vis_id']);
}

//-----------------------end-------------------
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



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/normalize.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/templatemo-misc.css">
    <link rel="stylesheet" href="css/templatemo-style.css">
    <link rel="stylesheet" href="css/font-awesome_rating.min.css">

<script src="admin/js/jquery-1.6.4.min.js"></script>
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
                        <div class="social-icons">
                            <ul>
                                <li><a href="#" class="fa fa-facebook"></a></li>
                                <li><a href="#" class="fa fa-dribbble"></a></li>
                                <li><a href="#" class="fa fa-twitter"></a></li>
                                <li><a href="#" class="fa fa-linkedin"></a></li>
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
                                <li><a href="user_profile.php">User Profile</a></li>
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

    <div class="content-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 section-title">
                    <h2>PICS</h2>
                </div> <!-- /.section -->
            </div> <!-- /.row -->
            <div class="row">
            <?php foreach ($data_result as $data){?>
                <div class="col-md-6 col-sm-6">
                    <div class="product-item">
                        <div class="product-thumb">
                            <img src="admin/upload/<?php echo $data['plc_photo']; ?>" alt="Product Title" style="height:450px; width:580px">
                        </div> <!-- /.product-thum -->
                        <div class="product-content">
                            <h5>Different Views :  <?php echo $data['plc_name']; ?></h5>
                            <!--<span class="price">$40.00</span>-->
                        </div> <!-- /.product-content -->
                    </div> <!-- /.product-item -->
                </div> <!-- /.col-md-3 -->
                <?php } ?>
                
                
                <div class="col-md-6 col-sm-6">
                    <div class="product-item">
                        <div class="product-thumb">
                            <img src="admin/upload/<?php echo $data['plc_photo_bg']; ?>" alt="Product Title" style="height:450px; width:580px">
                        </div> <!-- /.product-thum -->
                        <div class="product-content">
                            <h5> Different Views :  <?php echo $data['plc_name']; ?></h5>
                            <!--<span class="price">$40.00</span>-->
                        </div> <!-- /.product-content -->
                    </div> <!-- /.product-item -->
                </div> <!-- /.col-md-3 -->
                
                
                 <!-- /.col-md-3 -->
                 <!-- /.col-md-3 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </div> <!-- /.content-section -->

    <div class="content-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 section-title">
                    <h2>DESCRIPTION</h2>
                </div> <!-- /.section -->
            </div> <!-- /.row -->
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="product-item-vote">
                        <div class="product-thumb">
                            <p style="text-align:justify;"><?php echo $data['description']; ?></p>
                        </div> <!-- /.product-thum -->
                        <div class="product-content">
                            <h5 style="color:#F33">Give like and rate your comments</h5>
                            <div id="hidee"><span class="tagline"><?php echo $_SESSION['username'] ?> you <?php echo $likee; ?> this place</span></div>
                            
                            
                            
                            
                            
                            <form method="post" action="">
                            <ul class="progess-bars">
                            <!------------------likeeeeee---------->
                            
                                <li>
                                    <div class="progress">
                                    <input type="hidden" name="place_id" value="<?php echo $data['plc_id']; ?>"/>
                                    <input type="hidden" name="vis_id" value="<?php echo $_SESSION['id']; ?>"/>
                                    
									
                   
                    Total Like : <i class="fa fa-thumbs-o-up"></i> : <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $dis_count['chklike']; ?>%"></div>
                                        <span><?php echo $dis_count['chklike'] ?> <i class="fa fa-heart"></i></span>
                                        
                                        <!--<i class="fa fa-thumbs-o-down">:<?php echo $dis_count['dislikee'] ?></i> :-->
                                        <span><input type="submit" name="like" value="Like" style="background:none; color:#09F"/></span>
                   <!--<span><input type="submit" name="dislike" value="Dislike" style="background:none; color:#F00"/></span>-->
                                    </div>
                                </li>
                                
                                <!------------------likeeeeee---------->
                                <!------------------rating---------->
                                <li>
                                    <div class="progress">
                                        Total Dislike : <i class="fa fa-thumbs-o-down"></i><div class="progress-bar comments" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $dis_count['dislikee']; ?>%"></div>
                                        <span class="comments"><?php echo $dis_count['dislikee']; ?><i class="fa fa-heart"></i></span>
                                        <span><input type="submit" name="dislike" value="Dislike" style="background:none; color:#F00"/></span>
                                    </div>
                                </li>
                                <!------------------rating---------->
                            </ul>
                            
                            </form>
                            
                            
                            
                            
                            
                            
                        </div> <!-- /.product-content -->
                    </div> <!-- /.product-item-vote -->
                </div> <!-- /.col-md-3 -->
                
                
                
                
                
                
                
                <div class="col-md-12 col-sm-12">
                    <div class="product-item-vote">
                         <!-- /.product-thum -->
                        <div class="product-content" >
             <h5 style="color:#F33">Rate Your comments by awesome / excellent /beautiful / good /  average </h5>
                            <!--<div id="hidee"><span class="tagline"><?php echo $_SESSION['username'] ?> you <?php echo $likee; ?> this place</span></div>-->
                            
                            
                            
                            
                            
                            <form method="post" action="">
                            </br>
                            <textarea name="comment" id="textarea" cols="45" rows="5" placeholder="Rate your star by above words!.." style="height:100px; width:550px;"></textarea>
                            </br>
                            <input type="hidden" name="place_id" value="<?php echo $data['plc_id']; ?>"/>
                                    <input type="hidden" name="vis_id" value="<?php echo $_SESSION['id']; ?>"/>
                               <div id="sub">
<input type="submit" name="rate" value="Post" style="background:none; color:#F00;  width:550px; margin-top:12px;height:25px;"/>
</div>   
     
</form>
                            <ul class="progess-bars">
                            <!------------------likeeeeee---------->
                            
                                <li>
                                    <div class="progress">
                      <script>
					  $(document).ready(function ($){
					  
					  $('#one').attr('title', 'Click here to rate');
					  $('#two').attr('title', 'Click here to rate');
					  $('#three').attr('title', 'Click here to rate');
					  $('#four').attr('title', 'Click here to rate');
					  $('#five').attr('title', 'Click here to rate');
					  
		
					  });
					  </script>
                      <style>
					  #rating input[type="submit"] {
    margin-left: -21px;
	
}
					  </style>              
                                    
                         
				<form method="post" action="">					
<div id="rating" style="margin-top:-3px;">
Rating You give : 


<!--<a href="about_us.php"><span class="fa fa-star checked" id="one" style="font-size:20px;"></span></a>-->

 <!--<span class="fa fa-star checked" id="one" style="font-size:20px;"><input type="submit" name="rate_two" style="display:none" class="fa fa-star"></span>-->
 
<button class="btn" name="rate_one" value="1" type="submit" id="one"><i class="fa fa-star"></i></button>
<input type="hidden" name="place_id" value="<?php echo $data['plc_id']; ?>"/>
<input type="hidden" name="vis_id" value="<?php echo $_SESSION['id']; ?>"/>
<button class="btn" name="rate_two" value="2" type="submit" id="two"><i class="fa fa-star"></i></button>

<button class="btn" name="rate_three" value="3" type="submit" id="three"><i class="fa fa-star"></i></button>

<button class="btn" name="rate_four" value="4" type="submit" id="four"><i class="fa fa-star"></i></button>

<button class="btn" name="rate_five" value="5" type="submit" id="five"><i class="fa fa-star"></i></button>

<span class=" checked" id="one" style="font-size:15px;">Over All Rate : <?php echo round($average); ?></span>

 
</div>

</form>
                                        
                                        
                                        
                                    </div>
                                </li>
                               
                                <!------------------likeeeeee---------->
                                <!------------------rating---------->
                                
                                <!------------------rating---------->
                            </ul>
                            
                            
                            
                            
                            
                            
                            
                            
                        </div> <!-- /.product-content -->
                    </div> <!-- /.product-item-vote -->
                </div>
                
                
                
                
              <style>
.vertical-menu {
    width: 200px;
}

.vertical-menu a {
    background-color: #eee;
    color: black;
    display: block;
    padding: 12px;
    text-decoration: none;
}

.vertical-menu a:hover {
    background-color: #ccc;
}

.vertical-menu a.active {
    background-color: #4CAF50;
    color: white;
}
</style>  
                
                <div class="col-md-12 col-sm-12" >
                    <div class="product-item-vote">
                         <!-- /.product-thum -->
                        <div class="product-content">
             <h5 style="color:#F33">All Comments About This Place </h5>
                            
                            
             <div class="vertical-menu" style="overflow: scroll; width:auto; height:300px;">
  <!--<a href="#" class="active">Home</a>-->
  <?php foreach ($sel_dis  as $key =>$dat){ 
  $vis_id = $dat['vis_id'];
  
  ?>
  <?php
    $sq="select vis_user from  visitor_register where vis_id='".$vis_id."'";
  $rs=mysql_query($sq);
  while($dt_gt=mysql_fetch_array($rs))
  {
   ?>
  
  
  <a href="#"><?php echo $dt_gt['vis_user'];  ?>  :   <?php echo $dat['comment'];  ?></a>
  <?php } ?>
  <?php } ?>
  
  
</div>               
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                        </div> <!-- /.product-content -->
                    </div> <!-- /.product-item-vote -->
                </div>
                
                
                
                
                
                
                 <!-- /.col-md-3 -->
                 <!-- /.col-md-3 -->
                 <!-- /.col-md-3 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </div> <!-- /.content-section -->

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