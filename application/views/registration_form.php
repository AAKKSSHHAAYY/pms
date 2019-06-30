<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>

<head>
    <title>Login Page</title>
    <!--Made with love by Mutiullah Samim -->

    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!--Custom styles-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>Assests/css/login.css">
</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header Registration">
                    <h3>Registration Form</h3>
                </div>
                <?php
                echo "<div class='error_msg'>";
                echo  validation_errors('<p class="alert alert-danger">', '</p>');
                echo "</div><hr>";
                if (isset($messge)) {
                    echo $messge;
                }
                echo '<div class="card-body">';
                echo form_open('user_authentication/new_user_registration');
                echo form_label('Create Username : ', 'name', array('for' => 'name', 'class' => 'from-label'));
                echo "<br/>";
                ?>
                <div class="input-group form-group">
                    <?php
                    echo '<div class="input-group-prepend">';
                    echo '<span class="input-group-text"><i class="fas fa-user"></i></span>';
                    echo  '</div>';
                    echo '<input type="text" name="username" id="name" class="form-control" placeholder="username">';
                    ?>
                </div>
                <?php
                echo form_label('Email : ', 'mail', array('class' => 'from-label'));
                echo "<br/>";
                ?>
                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    </div>
                    <input type="email" name="email_value" id="mail" class="form-control" placeholder="e-mail">
                </div>
                <!-- Password box -->
                <?php echo form_label('Create password : ', 'name', array('for' => 'name', 'class' => 'from-label')); ?>
                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div>
                    <!-- <input type="password" class="form-control" placeholder="password"> -->
                    <input type="password" name="password" class="form-control" id="password" placeholder="password" />
                </div>

                <!-- conform password box -->
                <?php echo form_label('Confirm Password : ', 'name', array('for' => 'name', 'class' => 'from-label')); ?>
                <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div>
                    <!-- <input type="password" class="form-control" placeholder="password"> -->
                    <input type="password" name="password_confirm" class="form-control" id="password" placeholder="confirm password" />
                </div>
                <div class="form-group">
                    <input type="submit" value="Login" class="btn float-right login_btn">
                </div>
                <?php echo form_close(); ?>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-center links">
                    Have an account? <a href="<?php echo base_url() ?>">Login</a>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>