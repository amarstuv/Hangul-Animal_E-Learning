<?php 

    require_once 'action/db_connect.php';

    session_start();

    if(isset($_SESSION['role'])) {

        if($_SESSION['role'] == 1) {
            header('location:home.php');
        } else {
            header('location:home.php');
        }
    }

    $error = array();

    if($_POST){

        $username = $_POST['username'];
        $password = $_POST['password'];

        if(empty($username)||empty($password)){

            if($username == ""){
                $error[] = "Username is required";
            }

            if($password == ""){
                $error[] = "Password is required";
            }
        } else {

            $sql = "SELECT * FROM user where username ='$username' AND password = '$password'";
            $result = $connect->query($sql);

            if($result->num_rows == 1){
                $value = $result->fetch_assoc();

                $role = $value['Role'];
                $userID = $value['user_ID'];

                //set session
                $_SESSION['userID'] = $userID;
                $_SESSION['role'] = $role;
                $_SESSION['name'] = $value['Name'];

                header('location:home.php');
                
            } else {

                $error[] = "Incorrect username & password combination";
            }
        }
    }

?>
<!DOCTYPE html>
<html>
	<head>
        <?php include('header.php')?>
		<title>Login | Hangul Animal Learning</title>
	</head>

	<body id='login-body' class="bg-light">

        <div class="card col-md-6 offset-md-3 text-center bg-primary mb-4">
            <h3 class="he3-responsive text-white">Hangul Animal Learning</h3>
        </div>
		<div class="card col-md-4 offset-md-4 mt-4">
            <div class="card-header-edge text-white">
                <strong>Login</strong>
            </div>
            <div class="messages">
                <?php if($error) {
                    foreach ($error as $key => $value) {
                        echo '<div class="alert alert-warning" role="alert">
                        <i class="glyphicon glyphicon-exclamation-sign"></i>
                        '.$value.'</div>';                                      
                    }
                }?>
            </div>
            <div class="card-body">
                     <form id="login-frm" method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                        <fieldset>
                            <div class="form-group">
                                <input type="username" name="username" class="form-control" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" placeholder="Password">
                            </div> 
                            <div class="form-group text-right">
                                <button class="btn btn-primary btn-block" name="submit">Login</button>
                            </div>
                        </fieldset>
                    </form>
                    <div class="form-group text-right">
                        <button class="btn btn-danger btn-block" data-toggle="modal" data-target="#register">Register</button>
                    </div>
            </div>
        </div>

        <div class="modal fade" id="register" tabindex="=1" role="dialog">
            <div class="modal-dialog modal-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModallabel">Register</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    
                    <form id="registerForm" method="POST" action="action/register.php" autocomplete="off">
                        <div class="modal-body">
                            <div class="msgRegister"></div>
                            <div class="form-group">
                                <label>Name</label>
                                <input type="hidden" name="id">
                                <input type="text" class="form-control" name="Fname" id="Fname">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" id="email">
                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control" name="username" id="username">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" id="password">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" id="registerBtn" class="btn btn-success" data-loading-text="Loading..." autocomplete="off">Register</button>
                        </div>    
                    </form>    
                </div>
            </div>
        </div>
        <script src="js/register.js"></script>

	</body>
</html>