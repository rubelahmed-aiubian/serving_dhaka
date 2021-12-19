<?php get_header('auth'); ?>
    <div class="form-container sign-in-container">
        <form id="loginForm" action="<?= url('auth/login_check') ?>" method="post">
            <h1>Sign in</h1>
            <input type="email" name="email" placeholder="Email"/>
            <span id="email_error"></span>
            <input type="password" name="password" placeholder="Password"/>
            <span id="password_error"></span>
            <button type="submit">Sign In</button>
            <a href="<?= url('auth/forgot') ?>">Forgot your password?</a>
        </form>
    </div>
    <script>
        jQuery(function ($) {
            $('#loginForm').submit(function (e) {
                e.preventDefault();
                const form = $(this);
                $.ajax(form.attr('action'), {
                    type: form.attr('method'),
                    data: form.serialize(),
                    success(res) {
                        location.href = res;
                    },
                    error(error) {
                        const msg = error.responseJSON;
                        if (msg.password) {
                            $('#password_error').text(msg.password)
                        }
                        // if (msg.email) {
                        //     $('#email_error').text(msg.email)
                        // }
                    }
                })
            });
        })
    </script>
<?php get_footer('auth'); ?>