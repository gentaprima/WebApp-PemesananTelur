<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Forgot Password | Bootstrap Based Admin Template - Material Design</title>
    <!-- Favicon-->
    <link rel="icon" href="<?= base_url() ?>assets/dashboard/favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?= base_url() ?>assets/dashboard/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?= base_url() ?>assets/dashboard/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?= base_url() ?>assets/dashboard/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?= base_url() ?>assets/dashboard/css/style.css" rel="stylesheet">
</head>

<?php if($this->session->flashdata('text')){ ?>
    <p style="display:none;" id="text"><?= $this->session->flashdata('text'); ?></p>
    <p style="display:none;" id="icon"><?= $this->session->flashdata('icon'); ?></p>
    <p style="display:none;" id="title"><?= $this->session->flashdata('title'); ?></p>
<?php } ?>
<body class="fp-page">
    <div class="fp-box">
        <div class="logo">
            <a href="javascript:void(0);">PT. <b>MOELADI</b></a>
            <!-- <small>Admin BootStrap Based - Material Design</small> -->
        </div>
        <div class="card">
            <div class="body">
                <form id="forgot_password" action="<?= base_url() ?>users/resetpassword/" method="POST">
                    <div class="msg">
                    Masukkan alamat email Anda yang dulu Anda daftarkan. Kami akan mengirimi Anda email dengan nama pengguna dan link untuk mereset kata sandi Anda.
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" placeholder="Email" required autofocus>
                        </div>
                    </div>

                    <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">RESET MY PASSWORD</button>

                    <div class="row m-t-20 m-b--5 align-center">
                        <a href="<?= base_url() ?>">Sign In!</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="<?= base_url() ?>assets/dashboard/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?= base_url() ?>assets/dashboard/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?= base_url() ?>assets/dashboard/plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="<?= base_url() ?>assets/dashboard/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="<?= base_url() ?>assets/dashboard/js/admin.js"></script>
    <script src="<?= base_url() ?>assets/dashboard/js/pages/examples/forgot-password.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        var alert = document.getElementById("text");
        if(alert != null){
            var text = document.getElementById("text").innerHTML
            var title = document.getElementById("title").innerHTML;
            var icon = document.getElementById("icon").innerHTML;
            swal({
                title: title,
                text: text,
                icon: icon,
                button: "OK",
                });
        }
    </script>
</body>

</html>