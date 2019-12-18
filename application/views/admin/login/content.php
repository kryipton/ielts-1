
<?php $this->load->view("admin/includes/header") ?>


<!-- Your custom styles (optional) -->
<style>
        html,
        body,
        header,
        .view {
            height: 100%;
        }
        @media (min-width: 560px) and (max-width: 740px) {
            html,
            body,
            header,
            .view {
                height: 650px;
            }
        }
        @media (min-width: 800px) and (max-width: 850px) {
            html,
            body,
            header,
            .view  {
                height: 650px;
            }
        }
    </style>

<body class="login-page">

<!-- Main Navigation -->
<header>

    <!-- Intro Section -->
    <section class="view intro-2">
        <div class="mask rgba-stylish-strong h-100 d-flex justify-content-center align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-6 col-md-10 col-sm-12 mx-auto mt-5">

                        <!-- Form with header -->
                        <div class="card wow fadeIn" data-wow-delay="0.3s">
                            <div class="card-body">

                                <!-- Header -->
                                <div class="form-header purple-gradient">
                                    <h3 class="font-weight-500 my-2 py-1"><i class="fas fa-user"></i> Admin Panel :</h3>
                                </div>

                                <form action="<?php echo base_url("Panel_admin_page_secure_login_page/login")?>" method="post">

                                    <!-- Body -->
                                    <div class="md-form">
                                        <i class="fas fa-user prefix white-text"></i>
                                        <input required name="usr" type="text" id="orangeForm-name" class="form-control">
                                        <label for="orangeForm-name">İstifadəçi adı</label>
                                    </div>

                                    <div class="md-form">
                                        <i class="fas fa-envelope prefix white-text"></i>
                                        <input required name="psw" type="password" id="orangeForm-email" class="form-control">
                                        <label for="orangeForm-email">Şifrə</label>
                                    </div>



                                    <div class="text-center">
                                        <button type="submit" class="btn purple-gradient btn-lg">Daxil ol</button>
                                    </div>

                                </form>

                            </div>
                        </div>
                        <!-- Form with header -->

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Intro Section -->

</header>
<!-- Main Navigation -->



<!-- SCRIPTS -->
<!-- JQuery -->
<script src="<?php echo base_url("public/admin/mdbootstrap/")?>js/jquery-3.4.1.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="<?php echo base_url("public/admin/mdbootstrap/")?>js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="<?php echo base_url("public/admin/mdbootstrap/")?>js/bootstrap.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="<?php echo base_url("public/admin/mdbootstrap/")?>js/mdb.min.js"></script>

<script src="<?php echo base_url("public/admin/")?>js/iziToast.min.js"></script>
<!--<script src="--><?php //echo base_url("public/admin/")?><!--js/jquery.dataTables.js"></script>-->
<script src="<?php echo base_url("public/admin/")?>js/jquery.dataTables.js"></script>
<script src="<?php echo base_url("public/admin/")?>js/sweetalert.min.js"></script>
<script src="<?php echo base_url("public/admin/")?>js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url("public/admin/")?>js/dropzone.js"></script>
<script src="<?php echo base_url("public/admin/")?>js/custom.js"></script>



<script>

    new WOW().init();

</script>

<!--melumat alerti-->
<?php if($this->session->flashdata("success")){ ?>
    <script>
        iziToast.success({
            icon: 'icon-person',
            message: '<?php echo $this->session->flashdata("success")?>',
            position: 'topCenter', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
            // progressBarColor: 'rgb(0, 255, 184)',
        });
    </script>
<?php }?>
<?php if($this->session->flashdata("alert")){ ?>
    <script>
        iziToast.warning({
            icon: 'icon-person',
            message: '<?php echo $this->session->flashdata("alert")?>',
            position: 'topCenter', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter
            // progressBarColor: 'rgb(0, 255, 184)',
        });
    </script>
<?php }?>