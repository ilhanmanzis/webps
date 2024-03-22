


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?= BASEURL; ?>/public/vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family-Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="<?= BASEURL; ?>/public/css/sb-admin-2.min.css">
    <link rel="icon" href="<?=BASEURL;?>/public/img/profile.png">
</head>
<body class="bg-gradient-primary"> 
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-done d-lg-black bg-color-white">
                                <img width="100%" height="100%" class="p-5" src="<?= BASEURL; ?>/public/img/profile.png" alt="">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">
                                            Silakan Login
                                        </h1>
                                    </div>
                                    <?php
                                        Flasher::flash();
                                    ?>
                                    <form action="<?=BASEURL;?>/admin/getadmin" method="post" class="user">
                                        <div class="form-group">
                                            <input type="text" name="username" autocomplete="off" required id="exampleInputUsername" class="form-control form-control-user" aria-destribedby="usernameHelp" placeholder="Enter Username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" required autocomplete="off" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block" name="login">
                                            Login
                                        </button>
                                    </form>

                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

    

<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="js/sb-admin-2.min.js"></script>
<script>
    $('input').attr('autocomplete','off');
</script>
</body>
</html>