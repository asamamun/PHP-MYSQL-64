<?php
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
    header("location: admin/dashboard.php");
    exit;
}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    require "db.php";
    $email = $_POST['email'];
    $password = $_POST['password'];
    $selectQuery = "select * from users where email='$email' limit 1";
    $result = $conn->query($selectQuery);
    if($result->num_rows){
        $record = $result->fetch_assoc();
        // var_dump($record);
        if(password_verify($password,$record['password'])){
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $record['name'];
            $_SESSION['useremail'] = $record['email'];
            $_SESSION['role'] = $record['role'];
            $conn->close(); // Close before redirection
            if($record['role'] == "admin"){                
                header("location: admin/index.php");
                exit;
            }
            else{                
                header("location: index.php");
                exit;
            }
            
        }
        else{
            $_SESSION['message'] = "Invalid password";
            $conn->close(); // Close before redirection
            header("location: login.php");
            exit;
        }
    }
    else{
        $_SESSION['message'] = "Invalid email";
        $conn->close(); // Close before redirection
        header("location: login.php");
        exit;
    }
    $conn->close(); // Close before redirection
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" />

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100..900;1,100..900&display=swap');

:root {
    --bg: #c8c8d0;
    --primary-bg: #4253f0;
    --btn-primary: #4152ee;
    --label:#313131;
}
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
a{
    text-decoration: none;
}

h1,h2{
    font-family: "Public Sans", sans-serif;
    font-optical-sizing: auto;
    font-weight: 700;
    font-style: normal;
}
p{
    font-family: "Public Sans", sans-serif;
    font-optical-sizing: auto;
    font-weight: 400;
    font-style: normal;
}
label , button.btn{
    font-family: "Public Sans", sans-serif;
    font-optical-sizing: auto;
    font-weight: 600;
    font-style: normal;
}
.text-primary {
    color: #4152ee !important;
}


.btn-primary{
    background-color: var(--btn-primary) !important;
    border-radius: 8px;
    padding: 8px;
    font-size: 16px;
}

.fs-6{
    font-size: 14px !important;
}
/* login css  */
.logo{
    font-size: 20px;
    font-weight: bold; 
}
.form-label {
    font-size: 14px;
    color: var(--label);
}
.form-control {
    padding: 8px 20px;
    color: #7a869b;
    border-radius: 8px;
    font-size: 15px;
}
.form-control:focus{
    box-shadow: none;
}
.main-bg{
    background-color: var(--bg);
}
.login-card {
    background-color: #fff;
    border-radius: 20px;
}
.login-card .right{
    background-color: var(--primary-bg);
    height: 100%;
    border-radius: 20px;
}

@media only screen and (max-width:992px){
    .main-bg.vh-100{
        height: auto !important;
        padding: 20px 0;
    }
    .login-card{
        border-radius: 20px;
    }
}

@media only screen and (max-width:768px){
    .main-bg.vh-100{
        height: auto !important;
    }
    .left.w-75 {
        width: 85% !important;
    }
    
}

@media only screen and (max-width:550px){
    .main-bg.vh-100{
        padding :0;
    }
    .login-card{
        border-radius: 0px;
    }
}
    </style>
</head>
<body>


<div class="main-bg  vh-100 d-flex  justify-content-center align-items-center">
        <div class="container">
        <?php
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            $message
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>";
    unset($_SESSION['message']);
}
?>
            <div class="row justify-content-center align-items-center ">
                <div class="col-lg-11 px-0 login-card card">
                    <div class="row w-100 mx-auto">
                        <div class="col-lg-6 py-3 ">
                            <div class="left w-75 mx-auto">
                                <div class="brand py-3">
                                    <!-- <img src="" alt="LOgo"> -->
                                    <div class="logo text-primary ">LOGO</div>
                                </div>
                                <div class="py-lg-5 py-3">
                                    <div class="mb-4">
                                        <h1 class="fs-2">Login To Your Account</h1>
                                        <p class="fs-6">Enter Your Credentials to access your account</p>
                                    </div>
                                    <form method="post" action="<?= $_SERVER['PHP_SELF'] ?>">
                                        <div class="mb-3">
                                            <label for="email" class="form-label mb-2">User Name / Id</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                placeholder="Enter your email">
                                        </div>
                                        <div class="mb-3">
                                            <label for="password" class="form-label mb-2">Password</label>
                                            <a href=""
                                                class="text-primary fs-6 float-end fw-semibold ">Forgot Password
                                                ?</a>
                                            <div class="position-relative">
                                                <input type="password" class="form-control position-relative"
                                                    id="password" name="password" placeholder="Enter your password">
                                                <i
                                                    class="fas fa-eye position-absolute d-flex justify-content-center align-items-center end-0 pe-3 top-0 bottom-0"></i>
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="">
                                                <label class="form-check-label fs-6 text-secondary">
                                                    Stay Signed in
                                                </label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary w-100 mb-4">Login</button>
                                    </form>
                                    <p class="text-center fs-6">Don't have an Account ? <a href="">Create an
                                            account</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 py-3">
                            <div
                                class="right d-flex justify-content-center align-items-flex-start position-relative px-lg-5 py-lg-0 py-md-4 px-4 py-4 flex-column">
                                <div class="mb-lg-4 mb-3  pt-3">
                                    <h1 class="fs-4 text-white">Start Your Journey with us!</h1>
                                    <p class="fs-6 text-white mb-0">Lorem ipsum dolor sit amet consectetur adipisicing
                                        elit.
                                    </p>
                                </div>
                                
                                <div>
                                    <img src="https://deepa098.github.io/hosted--assets/Manage-everything-update.png" alt="image" class="img-fluid">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>