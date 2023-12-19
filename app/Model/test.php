 <?php
namespace App\Model;
    require 'include/navbar.php';
    require 'include/sidebar.php';
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    ?>
 <!-- Start main left sidebar menu -->
 <?php
    if (isset($_POST['icat'])) {
        // print_r($_FILES['csv']['error']);
        // exit();

        if ($_FILES['csv']['error'] == 0) {


            $name = $_FILES['csv']['name'];
            // print_r($name);
            // exit();
            $arrayVar = explode(".", $_FILES['csv']['name']);
            $ext = end($arrayVar);
            // print_r('hello');
            // exit();
            $type = $_FILES['csv']['type'];
            $tmpName = $_FILES['csv']['tmp_name'];

            // check the file is a csv
            if ($ext === 'csv' || $ext === 'xlsx') {
                if (($handle = fopen($tmpName, 'r')) !== FALSE) {
                    // necessary if a large csv file
                    set_time_limit(0);

                    $row = 0;
                    fgets($handle);
                    // print_r($handle);
                    // exit();
                    while (($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
                        // number of fields in the csv
                        $col_count = count($data);
                        // print_r($data[1]);
                        // exit();
                        date_default_timezone_set('Asia/Kolkata');
                        $timestamp = date("Y-m-d");
                        // get the values from the csv
                        $counts = $mysqli->query("select * from tbl_medicine where mtitle='" . $data[1] . "'")->num_rows;

                        if ($counts != 0 || $data[0] === 'Code"') {
                        } else {
                           // $admindata = $mysqli->query("SELECT * FROM `admin`")->fetch_assoc();
                        $cat_id = $mysqli->query("select * from category where cat_name ='" . $data[6] . "'")->fetch_assoc();
                        //$cat_id = mysql_fetch_array($cat_id);
                        $brand_id = $mysqli->query("select * from tbl_brand where bname ='" . $data[30] . "'")->fetch_assoc();
                       // $brand_id = mysql_fetch_array($brand_id);

                           if($cat_id){

                               $cat_id = $cat_id;
                            //   print_r('hello');

                            //     exit();
                           }else{

                               $table = "category";
                            $field_values = array("cat_name", "cat_status", "cat_img");
                            $data_values = array("$data[6]", "1", "assets/img/istockphoto-1347590651-612x612.jpg");

                            $h = new Common();
                            $cat_id = $h->Insertdata_id($field_values, $data_values, $table);
                            //  print_r($cat_id);

                            //     exit();
                           }
                           if($brand_id){
                               $brand_id = $brand_id;
                           }else{
                               if($brand_id == null){
                                   $brand_id = 0;
                               }else{
                                   $table = "tbl_medicine";
                            $field_values = array("bname", "img", "status", "popular");
                            $data_values = array("$data[30]", "assets/category/catimg/1679316032.jpg", "1", "1");

                            $h = new Common();
                            $brand_id = $h->Insertdata_id($field_values, $data_values, $table);
                               }
                           }
                                //  print_r($cat_id);

                                // exit();
                            $rdate = date("Y-m-d H:i:s");
                            $table = "tbl_medicine";
                            $field_values = array("m_img", "mtitle", "mstatus", "mcat", "mdesc", "rdate", "mbrand","code");
                            $data_values = array("assets/img/istockphoto-1347590651-612x612.jpg", "$data[1]", "$data[2]", "$cat_id", "$data[12]", "$rdate", "$brand_id",$data[0]);

                            $h = new Common();
                            $product = $h->Insertdata_id($field_values, $data_values, $table);

                            $mtype = explode(',', $data[4]);
                            $mprice = explode(',', $data[6]);
                            $mdiscount = explode(',', $data[7]);
                            $mstock =  explode(',', $data[8]);
                            for ($i = 0; $i < count($mtype); $i++) {

                                $table = "tbl_medicine_attribute";
                                $field_values = array("pid", "price", "title", "discount", "ostock");
                                $data_values = array("$product", "$mprice[$i]", "$mtype[$i]", "0", "$mstock[$i]");
                                $check = $h->InsertData($field_values, $data_values, $table);
                            }



                            if ($product) {
    ?>
 <script src="assets/modules/izitoast/js/iziToast.min.js"></script>
 <script>
iziToast.success({
    title: 'Import Product Section!!',
    message: 'Import Product  Successfully!!',
    position: 'topRight'
});
 </script>

 <?php
    } else {

    ?>
 <script src="assets/modules/izitoast/js/iziToast.min.js"></script>
 <script>
iziToast.error({
    title: 'Operation DISABLED!!',
    message: 'For Demo purpose all  Insert/Update/Delete are DISABLED !!',
    position: 'topRight'
});
 </script>
 <?php
                            }
                        }
                    }
                }
            }
        }
        ?>

 <script>
setTimeout(function() {
    window.location.href = "product_import.php";
}, 3000);
 </script>
 <?php


    }
    ?>

 <?php
    if (isset($_POST['price'])) {
        // print_r($_FILES['csv']['error']);
        // exit();

        if ($_FILES['csv']['error'] == 0) {


            $name = $_FILES['csv']['name'];
            // print_r($name);
            // exit();
            $arrayVar = explode(".", $_FILES['csv']['name']);
            $ext = end($arrayVar);
            // print_r('hello');
            // exit();
            $type = $_FILES['csv']['type'];
            $tmpName = $_FILES['csv']['tmp_name'];

            // check the file is a csv
            if ($ext === 'csv' || $ext === 'xlsx') {
                if (($handle = fopen($tmpName, 'r')) !== FALSE) {
                    // necessary if a large csv file
                    set_time_limit(0);

                    $row = 0;
                    fgets($handle);
                    // print_r($handle);
                    // exit();
                    while (($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
                        // number of fields in the csv
                        $col_count = count($data);
                        // print_r($data[1]);
                        // exit();

                        $counts = $mysqli->query("select * from tbl_medicine where code ='" . $data[0] . "'")->fetch_assoc();
                        if ($counts != 0 || $data[0] === 'Code"') {
                        } else {
                           // $admindata = $mysqli->query("SELECT * FROM `admin`")->fetch_assoc();
                        $cat_id = $mysqli->query("select * from category where cat_name ='" . $data[6] . "'")->fetch_assoc();
                        //$cat_id = mysql_fetch_array($cat_id);
                        $brand_id = $mysqli->query("select * from tbl_brand where bname ='" . $data[30] . "'")->fetch_assoc();
                       // $brand_id = mysql_fetch_array($brand_id);

                            //  print_r($cat_id);

                                // exit();





                                $table = "tbl_medicine_attribute";
                                $field_values = array("price");
                                $data_values = array("$data[9]");
                                $check = $h->InsertData($field_values, $data_values, $table);




                            if ($product) {
    ?>
 <script src="assets/modules/izitoast/js/iziToast.min.js"></script>
 <script>
iziToast.success({
    title: 'Import Product Section!!',
    message: 'Import Product  Successfully!!',
    position: 'topRight'
});
 </script>

 <?php
    } else {

    ?>
 <script src="assets/modules/izitoast/js/iziToast.min.js"></script>
 <script>
iziToast.error({
    title: 'Operation DISABLED!!',
    message: 'For Demo purpose all  Insert/Update/Delete are DISABLED !!',
    position: 'topRight'
});
 </script>
 <?php
                            }
                        }
                    }
                }
            }
        }
        ?>

 <script>
setTimeout(function() {
    window.location.href = "product_import.php";
}, 3000);
 </script>
 <?php


    }
    ?>


 <!-- Start app main Content -->
 <div class="main-content">
     <section class="section">
         <div class="section-header">
             <h1>Upload Csv Product</h1>
         </div>
         <div class="card">
             <form method="post" enctype="multipart/form-data">
                 <div class="card-body">
                     <div class="form-body">
                         <div class="form-group">
                             <label for="cname">select A Csv</label>
                             <input type="file" name="csv" class="form-control" required>
                         </div>
                     </div>
                 </div>
                 <div class="card-footer text-left">
                     <button name="icat" class="btn btn-primary">Upload Csv</button>
                     <a href="importproduct.csv" target="_blank" class="btn btn-raised btn-raised btn-info"
                         id="download">Demo Csv</a>
                 </div>
             </form>
         </div>
 </div>

 <div class="main-content">
     <section class="section">
         <div class="section-header">
             <h1>Upload Csv Product Price</h1>
         </div>
         <div class="card">
             <form method="post" enctype="multipart/form-data">
                 <div class="card-body">
                     <div class="form-body">
                         <div class="form-group">
                             <label for="cname">select A Csv</label>
                             <input type="file" name="csv" class="form-control" required>
                         </div>
                     </div>
                 </div>
                 <div class="card-footer text-left">
                     <button name="price" class="btn btn-primary">Upload Csv</button>
                     <!--<a href="importproduct.csv" target="_blank" class="btn btn-raised btn-raised btn-info"-->
                     <!--    id="download">Demo Csv</a>-->
                 </div>
             </form>
         </div>
 </div>
 <div class="main-content">
     <section class="section">
         <div class="section-header">
             <h1>Upload Csv Product out of stock</h1>
         </div>
         <div class="card">
             <form method="post" enctype="multipart/form-data">
                 <div class="card-body">
                     <div class="form-body">
                         <div class="form-group">
                             <label for="cname">select A Csv</label>
                             <input type="file" name="csv" class="form-control" required>
                         </div>
                     </div>
                 </div>
                 <div class="card-footer text-left">
                     <button name="out_of_stock" class="btn btn-primary">Upload Csv</button>
                     <!--<a href="importproduct.csv" target="_blank" class="btn btn-raised btn-raised btn-info"-->
                     <!--    id="download">Demo Csv</a>-->
                 </div>
             </form>
         </div>
 </div>
 </section>
 </div>


 </div>
 </div>

 <?php require 'include/footer.php'; ?>
 </body>


 </html>