<!DOCTYPE html>
<?php
//    include 'Model/Admin.php';
    include 'Model/Client.php';
    $model_client = new Client();
//    $model_admin = new Admin();
//
    $numberOfClient = 0;
    $numberOfModarator = 0;
    $numberOfemployee = 0;
    foreach ($clientTempData = $model_client->get() as $client){
        $numberOfClient++;
    }
//    foreach ($adminTempData = $model_admin->get() as $admin){
//        if($admin['role']==='Modarator'){
//            $numberOfModarator++;
//        }
//    }
?>
<?php get_admin_sidebar();?>

        <div class="content_col">
            <h3 class="area_title">Admin Dashboard</h3>
            <div class="inner_row">
                <div class="inner_col">
                    <h4>Total client</h4>
                    <?="<h1>".$numberOfClient."</h1>";?>
                </div>
                <div class="inner_col">
                    <h4>Total Modarator</h4>
                    <?="<h1>".$numberOfModarator."</h1>";?>
                </div>
            </div>

            <div class="inner_row">
                <div class="inner_col">
                    <h4>Total Employee</h4>
                    <?="<h1>".$numberOfModarator."</h1>";?>
                </div>
                <div class="inner_col">
                    <h4>Recent Activities</h4>
                    <table id="dash_data_table">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                        </tr>
                        <?php
                        foreach ($clientTempData = $model_client->get() as  $data){
                            echo"<tr><td>".$data['id']."</td><td>".$data['name']."</td><td>".$data['email']."</td></tr>";
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>