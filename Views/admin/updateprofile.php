<?php
    get_admin_sidebar();
    include "Model/Admin.php";
    $updateData = new Admin();
    foreach ($adminTempData = $updateData->get() as $data) {
        //statement
    }
//data check
$request[]='';
$check_errors[]='';
if (isset($_POST['submit']) == 'submit'){
        if ($_POST['name'] === '') {
            $check_errors['error_name']= 'Name can not be empty';
        } else {
            $request['name'] = $_POST['name'];
        }
        $request['mobile'] = $_POST['mobile'];

        if ($_POST['password'] !== '') {
            $request['password'] = $_POST['password'];
        } else {
            $check_errors['err_pass'] = 'Enter a valid password';
        }
        if (isset($_FILES['image'])) {
            $img_name = $_FILES['image']['name'];
            $img_size = $_FILES['image']['size'];
            $tmp_name = $_FILES['image']['tmp_name'];
            $error = $_FILES['image']['error'];

            if($error == 0){
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);

                $allowed_exs = array('jpg', 'jpeg', 'png');
                if(in_array($img_ex_lc,$allowed_exs)){
                    $image_new_name = uniqid('admin-',true).'.'.$img_ex;
                    $image_upload_path = $_SERVER["DOCUMENT_ROOT"].'/assets/images/uploads/'.$image_new_name;
                    $request['iamge'] = $tmp_name;
//                    move_uploaded_file($tmp_name,$image_upload_path);

                }
                else{
                    $check_errors['err_type'] = 'Upload a valid image (jpg,jpeg, png)';
                }
            }
            else{
                $check_errors['err_img'] = 'Error Occured When Uploading Image';
            }


            $allowed_exs = array("jpg", "jpeg", "png");

            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = 'assets/Images/' . $new_img_name;

                move_uploaded_file($tmp_name, $img_upload_path);
            }
        }
        if (count($check_errors)>=1) {
            $check_errors['err_occured'] = 'Something is not right';
        }
        else {
            echo"<pre>";
            print_r($request);
            echo"</pre>";
        }

        var_dump($check_errors);
        echo count($check_errors);
            $updateData->update($request);
}
?>
<h3 class="area_title">Update Profile</h3>
<div class="update_container">
    <div class="p_update">
        <form id="update_profile" action="<?=url('admindashboard/updateprofile')?>" method="post" enctype="multipart/form-data">

            <label for="name"><b>Name</b></label>
            <input type="text" name="name" value="<?=$data['name'];?>" id="name"/>
            <span class="update_profile_span"></span>

            <label for="mobile"><b>Phone Number</b></label>
            <input type="text" name="mobile" value="<?=$data['mobile'];?>" id="mobile"/>

            <label for="password"><b>Update Password</b></label>
            <input type="password" name="password" value="<?=$data['password'];?>" id="password"/>
            <span class="update_profile_span"></span>

            <label for="image"><b>Upload a photo</b></label>
            <input type="file" name="image" id="image"/>
            <span class="update_profile_span"></span>
            <span id="res_msg"></span>
            <button type="submit" name="submit" class="btn-save" value="submit">Update</button>
        </form>
    </div>
</div>

<script>
    jQuery(function ($) {
        $('#update_profile').submit(function (e) {
            e.preventDefault();
            const form = $(this);
            $.ajax(form.attr('action'), {
                type: form.attr('method'),
                data: form.serialize(),
                success() {
                    // location.href = res;
                    document.getElementById("res_msg").innerHTML = "Profile Updated Successfully.";
                },
                error() {
                    document.getElementById("res_msg").innerHTML = "Profile Not Updated.";
                }
            })
        });
    })
</script>

