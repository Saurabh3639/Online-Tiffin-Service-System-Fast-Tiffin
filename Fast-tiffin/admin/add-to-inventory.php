<?php
    session_start();
    error_reporting(0);
    include('includes/dbconnection.php');
    if (strlen($_SESSION['otssaid']==0)) {
    header('location:logout.php');
    } else{
        if(isset($_POST['submit']))
    {
        $adminid=$_SESSION['otssaid'];
        
        $name=$_POST['name'];
        $description=$_POST['description'];
        $cost=$_POST['cost'];
        $date=$_POST['date'];


        $sql="insert into tblinventory(name,description,cost,date)values(:name,:description,:cost,:date)";
            $query = $dbh->prepare($sql);
            $query->bindParam(':name',$name,PDO::PARAM_STR);
            $query->bindParam(':description',$description,PDO::PARAM_STR);
            $query->bindParam(':cost',$cost,PDO::PARAM_STR);
            $query->bindParam(':date',$date,PDO::PARAM_STR);

            $query->execute();
            $LastInsertId=$dbh->lastInsertId();
        if ($LastInsertId>0) {
            echo '<script>alert("inventory detail has been added.")</script>';
            echo "<script>window.location.href ='add-to-inventory.php'</script>";
        }
        else
        {
            echo '<script>alert("Something Went Wrong. Please try again")</script>';
        }

        }
    
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
   
    <title>Fast-Tiffin.com - Add to Inventory</title>
    <link href="dist/css/style.min.css" rel="stylesheet">
   </head>

<body>
  
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
   
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->

     <?php include_once('includes/header.php');?>  
     <?php include_once('includes/sidebar.php');?>

        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Add to Inventory</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="dashboard.php" class="text-muted">Home</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">Add to Inventory</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
       
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Add to Inventory</h4>
                                <form action="" method="post" enctype="multipart/form-data">
                                    
                                    <div class="form-body">

                                         <div class="form-group row">
                                            <label class="col-md-2">Name: </label>
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        <div class="form-group">
                                                          <input type="text" class="form-control" id="" name="name" value="" required='true'>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="form-group row">
                                            <label class="col-md-2">Description: </label>
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        <div class="form-group">
                                                           <textarea type="text" class="form-control" id="" name="description" value="" required='true'></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="form-group row">
                                            <label class="col-md-2">Cost per kg: </label>
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        <div class="form-group">
                                                            <input type="number" class="form-control" id="" name="cost" value="" required='true'>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                           <div class="form-group row">
                                            <label class="col-md-2">Purchased Date: </label>
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        <div class="form-group">
                                                            <input type="date" class="form-control" id="" name="date" value="" required="true">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                  
                                    <div class="form-actions">
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-info" name="submit">Submit</button>&nbsp;&emsp;&nbsp;&emsp;
                                            <a href="inventory.php" class="btn btn-primary">Back</a>
                                        </div>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          
          <?php include_once('includes/footer.php');?>
        
        </div>
 
    </div>
   
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="dist/js/app-style-switcher.js"></script>
    <script src="dist/js/feather.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <!-- themejs -->
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    
</body>
</html>
<?php }  ?>