<div class="banner two">
    <div class="container">
        <h2 class="inner-tittle">Make your account better</h2>
    </div>
</div>
<div class="account">
    <div class="container">
        <div class="account-bottom">
            <div class="col-md-6 col-md-offset-3">
                <form method="post">
                    <div class="account-top heading">
                        <h3>edit</h3>
                    </div>
                    <?php
                        echo "<div class='address'>
                            <span>Username</span>
                            <input type='text' name='username' value='$username'>
                        </div>
                        <div class='address'>
                            <span>First Name</span>
                            <input type='text' name='firstName' value='$firstName'>
                        </div>
                        <div class='address'>
                            <span>Last Name</span>
                            <input type='text' name='lastName' value='$lastName'>
                        </div>
                        <div class='address'>
                            <span>Email Address</span>
                            <input type='email' name='email' value='$email'>
                        </div>
                        <div class='address'>
                            <span>Password</span>
                            <input type='password' name='password'>
                        </div>
                        <div class='address'>
                            <span>Re-enter Password</span>
                            <input type='password' name='passwordConfirm'>
                        </div>" ?>
                        <div class='address new col-md-offset-9'>
                            <input type='submit' value='submit'>
                        </div>

                </form>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

