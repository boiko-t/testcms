<?php
/**
 * Created by PhpStorm.
 * User: tayab
 * Date: 21.06.2017
 * Time: 12:22
 */
?>
<div class="banner two">
    <div class="container">
        <h2 class="inner-tittle">Log in to your account</h2>
    </div>
</div>
<!--//end-banner-->
<!--account-->
<div class="account">
    <div class="container">
        <div class="account-bottom">
            <div class="col-md-6 col-md-offset-4">
                <form method="post">
                    <div class="account-top heading">
                        <h3>REGISTERED CUSTOMERS</h3>
                    </div>
                    <div class="address">
                        <span>Username</span>
                        <input type="text" name="username" value="<?=$username?>">
                    </div>
                    <div class="address">
                        <span>Password</span>
                        <input type="password" name="password">
                    </div>
                    <div class="address row">
                        <div class="col-md-6">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" value="rememberMe">
                                Remember me
                            </label>
                        </div>
                        <div class="col-md-3 col-md-offset-3">
                            <input type="submit" value="Login">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<script>
    window.onload = function () {
        <?php
        if ($error)
            echo "triggerErrorModal('$error');"
        ?>
    }
</script>