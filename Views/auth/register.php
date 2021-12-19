<?php get_header('auth');?>
    <div class="form-container sign-up-container">
        <form action="<?=url('auth/register_store')?>" method="post">
            <h1>Create Account</h1>
            <input type="text" name="name" placeholder="Enter Your Name"/>
            <span><?=isset($_SESSION['errors']['name'])? $_SESSION['errors']['name']:null;?></span>
            <input type="tel" name="mobile" placeholder="Enter Your  Mobile"/>
            <span><?=isset($_SESSION['errors']['mobile'])? $_SESSION['errors']['mobile']:null;?></span>
            <input type="email" name="email" placeholder="Enter Your  Email"/>
            <span><?=isset($_SESSION['errors']['email'])? $_SESSION['errors']['email']:null;?></span>
            <input type="text" name="location" placeholder="Enter Your  Location"/>
            <span><?=isset($_SESSION['errors']['location'])? $_SESSION['errors']['location']:null;?></span>
            <input type="password" name="password" placeholder="Enter Your Password"/>
            <span><?=isset($_SESSION['errors']['password'])? $_SESSION['errors']['password']:null;?></span>
            <input type="password" name="confirm_password" placeholder="Enter Your Confirm Password"/>
            <span><?=isset($_SESSION['errors']['confirm_password'])? $_SESSION['errors']['confirm-password']:null;?></span>
            <button type="submit" value="submit">Sign Up</button>
        </form>
    </div>
<?php get_footer('auth');?>


