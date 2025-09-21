<?php
class AuthForms {
    public function registerForm($config, $utils) {
        $validationErrors = $utils->getMsg('errors'); 
        echo $utils->getMsg('msg');
?>
        <h2>Create Your Account</h2>
        <form action="" method="post" autocomplete="off">
            <div class="mb-3">
                <label for="user_fullname" class="form-label">Full Name</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="user_fullname" 
                    name="fullname" 
                    maxlength="50" 
                    placeholder="Enter full name" 
                    value="<?php echo isset($_SESSION['fullname']) ? $_SESSION['fullname'] : ''; unset($_SESSION['fullname']); ?>" 
                    required
                >
                <?php 
                    if (isset($validationErrors['fullname_error'])) {
                        echo "<div class='alert alert-danger'>{$validationErrors['fullname_error']}</div>";
                    }
                ?>
            </div>

            <div class="mb-3">
                <label for="user_email" class="form-label">Email</label>
                <input 
                    type="email" 
                    class="form-control" 
                    id="user_email" 
                    name="email" 
                    maxlength="100" 
                    placeholder="Enter email address" 
                    value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; unset($_SESSION['email']); ?>" 
                    required
                >
                <?php 
                    if (isset($validationErrors['mailFormat_error'])) {
                        echo "<div class='alert alert-danger'>{$validationErrors['mailFormat_error']}</div>";
                    }
                    if (isset($validationErrors['mailDomain_error'])) {
                        echo "<div class='alert alert-danger'>{$validationErrors['mailDomain_error']}</div>";
                    }
                ?>
            </div>

            <div class="mb-3">
                <label for="user_pass" class="form-label">Password</label>
                <input 
                    type="password" 
                    class="form-control" 
                    id="user_pass" 
                    name="password" 
                    placeholder="Enter password" 
                    value="<?php echo isset($_SESSION['password']) ? $_SESSION['password'] : ''; unset($_SESSION['password']); ?>" 
                    required
                >
                <?php 
                    if (isset($validationErrors['password_length_error'])) {
                        echo "<div class='alert alert-danger'>{$validationErrors['password_length_error']}</div>";
                    }
                ?>
            </div>

            <?php echo $this->formButton('Sign Up', 'signup'); ?> 
            <a href="signin.php">Already registered? Log in</a>
        </form>
<?php
    }

    private function formButton($label, $fieldName) {
        return "<button type='submit' class='btn btn-primary' name='$fieldName'>$label</button>";
    }

    public function loginForm() {
?>
        <h2>Log Into Your Account</h2>
        <form action="" method="post">
            <div class="mb-3">
                <label for="login_email" class="form-label">Email</label>
                <input type="email" class="form-control" id="login_email" name="email">
            </div>

            <div class="mb-3">
                <label for="login_pass" class="form-label">Password</label>
                <input type="password" class="form-control" id="login_pass" name="password">
            </div>

            <?php echo $this->formButton('Sign In', 'signin'); ?> 
            <a href="signup.php">Need an account? Register</a>
        </form>
<?php
    }
}
