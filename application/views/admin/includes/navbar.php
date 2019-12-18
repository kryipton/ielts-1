
<!-- Main Navigation -->
<header>

    <!-- Sidebar navigation -->
    <div id="slide-out" class="side-nav sn-bg-4 fixed" style="transform: translateX(-100%)">
        <ul class="custom-scrollbar">

            <!-- Logo -->
            <li class="logo-sn waves-effect py-3">
                <div class="text-center">
<!--                    <a href="#" class="pl-0"><img style="top: 0px;width: 80px;height: 83px;position: absolute;left: 0;right: 0;bottom: 0;margin: auto;" src="--><?php //echo base_url("public/admin/img/loqo.png")?><!--"></a>-->
                </div>
            </li>

            <hr>

            <!-- Side navigation links -->
            <li>
                <ul class="collapsible collapsible-accordion">


                    <!--Kurslar-->
                    <li>
                        <a class="collapsible-header waves-effect arrow-r">
                            <i class="fas fa-graduation-cap"></i>Kurslar<i class="fas fa-angle-down rotate-icon"></i>
                        </a>
                        <div class="collapsible-body">
                            <ul>

                                <!-- Turlar -->
                                <li>
                                    <a href="<?php echo base_url("Panel_admin_page_courses")?>" class="collapsible-header waves-effect">
                                        <i class="fas fa-graduation-cap"></i>
                                        Kurslar
                                    </a>
                                </li>


                                <!-- Partnyorlar -->
                                <li>
                                    <a href="<?php echo base_url("Panel_admin_page_course_about")?>" class="collapsible-header waves-effect">
                                        <i class="fas fa-book-open"></i>
                                        Kurslara Haqqında
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>
                    <!--Kurslar-->


                    <!--Müəllimlər-->
                    <li>
                        <a class="collapsible-header waves-effect arrow-r">
                            <i class="fas fa-chalkboard-teacher"></i>Müəllimlər<i class="fas fa-angle-down rotate-icon"></i>
                        </a>
                        <div class="collapsible-body">
                            <ul>

                                <!-- Turlar -->
                                <li>
                                    <a href="<?php echo base_url("Panel_admin_page_teachers")?>" class="collapsible-header waves-effect">
                                        <i class="fas fa-chalkboard-teacher"></i>
                                        Müəllimlər
                                    </a>
                                </li>


                                <!-- Partnyorlar -->
                                <li>
                                    <a href="<?php echo base_url("Panel_admin_page_teachers_about")?>" class="collapsible-header waves-effect">
                                        <i class="fas fa-book-open"></i>
                                        Müəllimlər Haqqında
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>
                    <!--Müəllimlər-->


                    <!--Bloqlar-->
                    <li>
                        <a class="collapsible-header waves-effect arrow-r">
                            <i class="fas fa-id-card" ></i>Bloqlar<i class="fas fa-angle-down rotate-icon"></i>
                        </a>
                        <div class="collapsible-body">
                            <ul>


                                <!-- Bloqlarin kateqoriyalri -->
                                <li>
                                    <a href="<?php echo base_url("Panel_admin_page_blog_category")?>" class="collapsible-header waves-effect">
                                        <i class="fas fa-id-card"></i>
                                        Blog Kateqoriyaları
                                    </a>
                                </li>

                                <!-- Bloqlar -->
                                <li>
                                    <a href="<?php echo base_url("Panel_admin_page_blog")?>" class="collapsible-header waves-effect">
                                        <i class="fas fa-id-card"></i>
                                        Blog
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>
                    <!--Bloqlar-->



                    <!--Haqqımızda-->
                    <li>
                        <a class="collapsible-header waves-effect arrow-r">
                            <i class="fas fa-book-reader"></i>Haqqımızda<i class="fas fa-angle-down rotate-icon"></i>
                        </a>
                        <div class="collapsible-body">
                            <ul>

                                <!-- Slayd -->
                                <li>
                                    <a href="<?php echo base_url("Panel_admin_page_about")?>" class="collapsible-header waves-effect">
                                        <i class="fas fa-book-reader"></i>
                                        Haqqımızda
                                    </a>
                                </li>


                                <!-- Slayd -->
                                <li>
                                    <a href="<?php echo base_url("Panel_admin_page_study_abroad")?>" class="collapsible-header waves-effect">
                                        <i class="fas fa-plane"></i>
                                        Xarcdə Təhsil
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>
                    <!--Haqqımızda-->


                    <!--FAQs-->
                    <li>
                        <a class="collapsible-header waves-effect arrow-r">
                            <i class="fas fa-database"></i>FAQs<i class="fas fa-angle-down rotate-icon"></i>
                        </a>
                        <div class="collapsible-body">
                            <ul>

                                <!-- FAQs -->
                                <li>
                                    <a href="<?php echo base_url("Panel_admin_page_faqs")?>" class="collapsible-header waves-effect">
                                        <i class="fas fa-database"></i>
                                        FAQs
                                    </a>
                                </li>

                                <!-- FAQs -->
                                <li>
                                    <a href="<?php echo base_url("Panel_admin_page_faqs_about")?>" class="collapsible-header waves-effect">
                                        <i class="fas fa-book-open"></i>
                                        FAQs Haqqında
                                    </a>
                                </li>



                            </ul>
                        </div>
                    </li>
                    <!--FAQs-->


                    <!--Isdifadeciler ve mesajlar-->
                    <li>
                        <a class="collapsible-header waves-effect arrow-r">
                            <i class="fas fa-users"></i>Mesajlar<i class="fas fa-angle-down rotate-icon"></i>
                        </a>
                        <div class="collapsible-body">
                            <ul>

                                <?php if ($this->session->userdata("user_role") != 0){ ?>

                                    <!-- Adminlər -->
                                    <li>
                                        <a href="<?php echo base_url("Panel_admin_page_users")?>" class="collapsible-header waves-effect">
                                            <i class="fas fa-users"></i>
                                            Adminlər
                                        </a>
                                    </li>

                                <?php }?>


                                <!-- Mesajlar -->
                                <li>
                                    <a href="<?php echo base_url("Panel_admin_page_messages_about")?>" class="collapsible-header waves-effect">
                                        <i class="fas fa-book-open"></i>
                                        Mesajlar Haqqında
                                    </a>
                                </li>


                                <!-- Mesajlar -->
                                <li>
                                    <a href="<?php echo base_url("Panel_admin_page_messages")?>" class="collapsible-header waves-effect">
                                        <i class="far fa-comment"></i>
                                        Mesajlar
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>
                    <!--Isdifadeciler ve mesajlar-->


                    <!--Tədbirlər-->
                    <li>
                        <a class="collapsible-header waves-effect arrow-r">
                            <i class="fas fa-info-circle"></i>Tədbirlər<i class="fas fa-angle-down rotate-icon"></i>
                        </a>
                        <div class="collapsible-body">
                            <ul>

                                <!-- Xidmətlər haqqinda-->
                                <li>
                                    <a href="<?php echo base_url("Panel_admin_page_events_about")?>" class="collapsible-header waves-effect">
                                        <i class="fas fa-book-open"></i>
                                        Tədbirlər Haqqında
                                    </a>
                                </li>

                                <!-- Təkliflər -->
                                <li>
                                    <a href="<?php echo base_url("Panel_admin_page_events")?>" class="collapsible-header waves-effect">
                                        <i class="fas fa-info-circle"></i>
                                        Tədbirlər
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>
                    <!--Tədbirlər-->


                    <!-- Əlavə Məlumatlar -->
                    <li>
                        <a href="<?php echo base_url("Panel_admin_page_info")?>" class="collapsible-header waves-effect">
                            <i class="fas fa-book-open"></i>
                            Əlavə Məlumatlar
                        </a>
                    </li>


                    <!-- Slayd -->
                    <li>
                        <a href="<?php echo base_url("Panel_admin_page_main_slide")?>" class="collapsible-header waves-effect">
                            <i class="far fa-clone"></i>
                            Əsas Slayd
                        </a>
                    </li>


                    <!-- Geri Dönüşlər -->
                    <li>
                        <a href="<?php echo base_url("Panel_admin_page_feedbacks")?>" class="collapsible-header waves-effect">
                            <i class="fas fa-id-card"></i>
                            Feedback-lər
                        </a>
                    </li>



                    <!-- Əlaqə -->
                    <li>
                        <a href="<?php echo base_url("Panel_admin_page_contact")?>" class="collapsible-header waves-effect">
                            <i class="fas fa-phone"></i>
                            Əlaqə
                        </a>
                    </li>


                    <!-- Loqo -->
                    <li>
                        <a href="<?php echo base_url("Panel_admin_page_logo")?>" class="collapsible-header waves-effect">
                            <i class="fas fa-broom"></i>
                            Loqonun idarə olunması
                        </a>
                    </li>




                </ul>
            </li>
            <!-- Side navigation links -->

        </ul>
        <div class="sidenav-bg mask-strong"></div>
    </div>
    <!-- Sidebar navigation -->

    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg scrolling-navbar double-nav">

        <!-- SideNav slide-out button -->
        <div class="float-left">
            <a href="#" data-activates="slide-out" class="button-collapse"><i class="fas fa-bars"></i></a>
        </div>

        <!-- Breadcrumb -->
        <div class="breadcrumb-dn mr-auto">
            <p>Ielts Coaching Admin Panel</p>
        </div>

        <div class="d-flex change-mode">

            <!-- Navbar links -->
            <ul class="nav navbar-nav nav-flex-icons ml-auto">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle waves-effect" href="#" id="userDropdown" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user"></i> <span class="clearfix d-none d-sm-inline-block">Profil</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="<?php echo base_url("Admin/logout")?>">Çıxış</a>
                    </div>
                </li>

            </ul>
            <!-- Navbar links -->

        </div>

    </nav>
    <!-- Navbar -->

</header>
<!-- Main Navigation -->
