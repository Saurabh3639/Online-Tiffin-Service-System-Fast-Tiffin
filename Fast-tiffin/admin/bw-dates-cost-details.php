<?php
    session_start();
    error_reporting(0);
    include('includes/dbconnection.php');
    if (strlen($_SESSION['otssaid']==0)) {
    header('location:logout.php');
    } else{
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>

    <title>Fast-Tiffin.com - B/W Dates Order Report</title>
    <link href="assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="dist/css/style.min.css" rel="stylesheet">
   
</head>
<body>
  
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
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
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">B/W Dates Inventory Report</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="dashboard.php" class="text-muted">Home</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">B/W Dates Inventory Report</li>
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
                                <?php
                                    $fdate=$_POST['fromdate'];
                                    $tdate=$_POST['todate'];
                                ?>
                                <h5 align="center" style="color:blue">Inventory Report from <?php echo $fdate?> to <?php echo $tdate?></h5>
                             
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Name</th>
                                                <th>Description</th>
                                                <th>Cost per kg</th>
                                                <th>Purchased Date</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                                $sql="SELECT * from tblinventory where date between '$fdate' and '$tdate'";
                                                $query = $dbh -> prepare($sql);
                                                $query->execute();
                                                $results=$query->fetchAll(PDO::FETCH_OBJ);

                                                $cnt=1;
                                                if($query->rowCount() > 0)
                                                {
                                                foreach($results as $row)
                                                { 
                                            ?>
                                            <tr>
                                                <td><?php echo htmlentities($cnt);?></td>
                                                <td><?php echo htmlentities($row->name);?></td>
                                                <td><?php echo htmlentities($row->description);?></td>
                                                <td><?php echo htmlentities($row->cost);?></td>
                                                <td><?php echo htmlentities($row->date);?></td>
                                                
                                            </tr>
                                            <?php $cnt=$cnt+1;}} ?> 
                                        </tbody>
                                    </table>

                                    <div class="form-actions">
                                        <h5 class="form-title"><b>Total cost: <?php include_once('total-cost2.php');?></b></h5>
                                    </div>

                                </div>
                                
                                <div class="form-actions">
                                    <div class="text-center">
                                        <a href="bw-dates-cost.php" class="btn btn-primary">Back</a>
                                    </div>
                                </div>

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
    <!--This page plugins -->
    <script src="assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="dist/js/pages/datatable/datatable-basic.init.js"></script>
    
</body>
</html>
<?php }  ?>