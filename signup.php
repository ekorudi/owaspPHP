<?php
include "header-signup.php";
?>

<script src="https://www.google.com/recaptcha/api.js"></script>

<div class="login-clean">
    <form method="post" action="<?php echo $host;?>function/actSignup.php">
        <h2 class="sr-only">Login Form</h2>
        <!-- if signup failed -->
        <?php
            if(@$_GET['status'] == 'failed'){
        ?>
            <b style="display: block;position: relative;text-align:center; color: rgb(244,71,107)">Signup Failed</b>
        <?php } ?>
        <!--  -->
        <div class="illustration"><i class="fa fa-ticket"></i></div>
        <div class="form-group"><input class="form-control" type="text" name="fullname" required="required" placeholder="Nama Lengkap"></div>
        <div class="form-group"><input class="form-control" type="email" name="email" required="required" placeholder="Email"></div>
        <div class="form-group"><input class="form-control" type="password" name="password" required="required" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Password"></div>
        <div class="form-group"><button class="btn btn-primary btn-block recaptcha" data-sitekey="6LeY5DQfAAAAABxf9eSPGvPzYKylL_S68sLvtvmb" data-callback='onSubmit' data-action='submit' type="submit">Sign Up</button></div>
        <a class="forgot" href="#">Forgot your email or password?</a>
    </form>
</div>

<script>
    function onSubmit(token) {
        document.getElementById("demo-form").submit();
    }
</script>

<?php
include "footer.php";
?>
