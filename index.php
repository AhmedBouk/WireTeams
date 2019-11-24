<?php include('incs/pdo.php');
      include('incs/functions.php');
      include('incs/header.php');
      include('incs/inscription.php');
      include('incs/connexion.php'); ?>




<section class="formulaire">
    <div class="lr-wrapper" align="center">
        <div class="lr-content">
            <div class="lr-head">
                <div class="lr-l_b" id="login" onClick>
                    <div></div>
                    <span>Login</span>
                </div>
                <div class="lr-r_b" id="register">
                    <div></div>
                    <span>SignUp</span>
                </div>
            </div>
            <div class="lr-main">
                <form method="post" id="l-f" action="" >

                    <label for="login"></label>
                    <input type="text" id="username_login" name="login" class="l-username" placeholder="Username"/>

                    <label for="password"></label>
                    <input type="password" id="password_login" name="password" class="l-password" placeholder="Password"/>

                    <label for="coonect_submit"></label>
                    <input type="submit" name="coonect_submit" class="l-submit" value="Login"/>
                </form>
                <form method="post" id="r-f" action="" >
                    <label for="email"></label>
                    <input type="email" id="r-email" class="r-email" name="email" placeholder="Email"/>

                    <label for="pseudo"></label>
                    <input type="text" id="username_register" name="pseudo" class="r-username" placeholder="Username"/>

                    <label for="password"></label>
                    <input type="password" id="password_register" name="password" class="r-password" placeholder="Password"/>

                    <label for="password2"></label>
                    <input type="password"  name="password2" class="r-password" placeholder="Password"/>

                    <input type="submit" name="register_submit" class="r-submit" value="Sign Up"/>
                </form>
            </div>
        </div>
    </div>
</section>


<?php include('incs/footer.php'); ?>
