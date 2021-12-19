<?php get_header('auth');?>
<div class="form-container sign-up-container">
    <form action="<?=url('admin/register_store')?>" method="post" id="admin_register">
        <h1>Create Super Admin</h1>
        <select class="role" name="role" id="admin_role" form="admin_register">
            <option value= 'Admin'>Admin</option>
            <option value='Modarator'>Modarator</option>
            <option value='Employee'>Worker</option>
        </select>
        <input type="text" name="name" placeholder="Enter Your Name"/>
        <span><?=isset($_SESSION['errors']['name'])? $_SESSION['errors']['name']:null;?></span>

        <input type="email" name="email" placeholder="Enter Your  Email"/>
        <span><?=isset($_SESSION['errors']['email'])? $_SESSION['errors']['email']:null;?></span>

        <input type="tel" name="mobile" placeholder="Enter Your  Mobile"/>
        <span><?=isset($_SESSION['errors']['mobile'])? $_SESSION['errors']['mobile']:null;?></span>

        <input type="password" name="password" placeholder="Enter Your Password"/>
        <span>
            <?php
                if(isset($_SESSION['errors']['password'])){
                    echo $_SESSION['errors']['password'];
                }
                else{
                    if(isset($_SESSION['errors']['minimum'])){
                        echo $_SESSION['errors']['minimum'];
                    }
                }
            ?>
        </span>
        <input type="password" name="confirm_password" placeholder="Enter Your Confirm Password"/>
        <span>
            <?php
                if(isset($_SESSION['errors']['notmatched'])){
                    echo $_SESSION['errors']['notmatched'];
            }
            ?>
        </span>
        <button type="submit" value="submit">Sign Up</button>
    </form>
</div>
<?php get_footer('auth');?>


