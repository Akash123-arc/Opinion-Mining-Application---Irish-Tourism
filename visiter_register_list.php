<?php
include("db/db.php");
session_start();
if(isset($_SESSION['username']) || ($_SESSION['id']))
{
$ses_id=$_SESSION['id'];

//-----------------------------------display data list of logo aND MAP
$sql_list="select * from  visitor_register";
$res_list=mysql_query($sql_list);


//-------------approval------

/*if(isset($_POST['approve']))
{
$approve_id=$_POST['approve_id'];
$status="approved";	
$sql_edit="UPDATE admin SET ad_status='".$status."' WHERE ad_id='".$approve_id."'";
$res=mysql_query($sql_edit);
header("Refresh:0; ");
}*/

//-------------delete------
if(isset($_POST['delete']))
{
$cont_del=$_POST['cont_del'];
$sql="delete from admin where ad_id='".$cont_del."'";
$res_del=mysql_query($sql);
header("Refresh:0; ");
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Tourism Admin</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/text.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/layout.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/nav.css" media="screen" />
    <!--[if IE 6]><link rel="stylesheet" type="text/css" href="css/ie6.css" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" type="text/css" href="css/ie.css" media="screen" /><![endif]-->
    <link href="css/table/demo_page.css" rel="stylesheet" type="text/css" />
    <!-- BEGIN: load jquery -->
    <script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-ui/jquery.ui.core.min.js"></script>
    <script src="js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.slide.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.mouse.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.sortable.min.js" type="text/javascript"></script>
    <script src="js/table/jquery.dataTables.min.js" type="text/javascript"></script>
    <!-- END: load jquery -->
    <script type="text/javascript" src="js/table/table.js"></script>
    <script src="js/setup.js" type="text/javascript"></script>
    <script type="text/javascript">

        $(document).ready(function () {
            setupLeftMenu();

            $('.datatable').dataTable();
			setSidebarHeight();


        });
    </script>
</head>
<body>
    <div class="container_12">
        <div class="grid_12 header-repeat">
            <div id="branding">
                <div class="floatleft" style="font-size:25px; color:#FFF">
                    Tourism</div>
                <div class="floatright">
                    <div class="floatleft">
                        <img src="img/img-profile.jpg" alt="Profile Pic" /></div>
                    <div class="floatleft marginleft10">
                        <ul class="inline-ul floatleft">
                            <li> </li>
                            <li><a href="#"></a></li>
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                        <br />
                        <span class="small grey">  </span>
                    </div>
                </div>
                <div class="clear">
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
        <div class="grid_12">
            <ul class="nav main">
                <li class="ic-dashboard"><a href="dashboard.php"><span>Dashboard</span></a> </li>
                
                
                <li class="ic-form-style"><a href="javascript:"><span>Add Places</span></a>
                    <ul>
                        <li><a href="products.php">Add Places</a> </li>
                        <li><a href="display_products.php">Edit Places</a> </li>
                       
                    </ul>
                </li>
                
                <!--<li class="ic-form-style"><a href="javascript:"><span>About Us</span></a>
                    <ul>
                        <li><a href="add_about_details.php">Add About details</a> </li>
                        <li><a href="add_about_display.php">Edit details</a> </li>
                         <li><a href="about_testimonials.php">Add Testimonials</a> </li>
                        <li><a href="about_testimonials_display.php">Edit Testimonials</a> </li>
                        
                    </ul>
                </li>-->
                
                
                 <li class="ic-form-style"><a href="javascript:"><span>Place Ratings</span></a>
                    <ul>
                        
                        <li><a href="rating.php"> Ratings</a> </li>
                        
                    </ul>
                </li>
                
                  <li class="ic-form-style"><a href="javascript:"><span>Change Password </span></a>
                    <ul>
                        <!--<li><a href="add_contact_details.php">Add Contact details</a> </li>-->
                        <li><a href="user_list.php">Admin List</a> </li>
                        <li><a href="user_list.php">User List</a> </li>
                        
                    </ul>
                </li>
                
                
                
                

            </ul>
        </div>
        <div class="clear">
        </div>
        
        <div class="grid_10_12" >
            <div class="box round first grid">
                <h2>
                    Tables & Grids</h2>
                <div class="block" style="overflow-x:scroll;">
                    
                    
                    
                    <table class="data display datatable" id="example" >
					<thead>
						<tr>
                        	<th>Name</th>
                            <th>Email</th>
                            <th>Photo</th>
							<th>Username</th>
                            <th>Gender</th>
                            <th>username</th>
                            
                            
                            <th>Delete</th>
							
						</tr>
					</thead>
					<tbody>
                    <?php
					while($disp=mysql_fetch_array($res_list))
					{
					?>
						<tr class="odd gradeX">
							<td><?php echo $disp['vis_name']; ?></td>
                            <td><?php echo $disp['vis_email']; ?></td>
                            <td><img src="admin/upload/<?php echo $disp['vis_image']; ?>" style="height:250px; width:250px;" /></td>
                            <td><?php echo $disp['vis_gender']; ?></td>
                            <td><?php echo $disp['vis_user']; ?></td>
                            
                            
                            
                            
                           
                            <!--<td><?php //echo $disp['con_pass']; ?></td>-->
							
                            
							
                            
                            
							<td class="center">
                            <form method="post">
                            <input type="hidden" name="cont_del" value="<?php echo $disp['vis_id']; ?>" />
                            <input type="submit" name="delete" value="Delete" />
                            </form>
                            </td>
						</tr>
                    <?php
					}
					?>
						
						
					</tbody>
				</table>
                    
                    
                    
                </div>
                <br />
        <br />
        <br />
        <br />
            </div>
            
        </div>
        
        <div class="clear">
        
    </div>
    </div>
        
    <div class="clear">
    </div>
    
    <div id="site_info">
        <p>
            Copyright <a href="#">  © 2018 Tourism Admin</a>. All Rights Reserved.
        </p>
    </div>
</body>
</html>
<?php
}
else
{
header("location:index.php");	
}
?>