
<!-- Main Navigation -->
<header>

    <!-- Sidebar navigation -->
    <div id="slide-out" class="side-nav sn-bg-4 fixed" style="transform: translateX(-100%)">
        <ul class="custom-scrollbar">

            <!-- Logo -->
            <li class="logo-sn waves-effect py-3">
                <div class="text-center">
                    <a href="#" class="pl-0"><img style="top: 0px;width: 80px;height: 83px;position: absolute;left: 0;right: 0;bottom: 0;margin: auto;" src="<?php echo base_url("public/admin/img/loqo.png")?>"></a>
                </div>
            </li>

            <hr>

            <!-- Side navigation links -->
            <li>
                <ul class="collapsible collapsible-accordion">


                    <!--Kurslar-->
                    <li>
                        <a class="collapsible-header waves-effect arrow-r">
                            <i class="w-fa fas fa-suitcase-rolling" style="font-size: 18px"></i>Kurslar<i class="fas fa-angle-down rotate-icon"></i>
                        </a>
                        <div class="collapsible-body">
                            <ul>

                                <!-- Turlar -->
                                <li>
                                    <a href="<?php echo base_url("Panel_admin_page_tours")?>" class="collapsible-header waves-effect">
                                        <i class="fas fa-suitcase-rolling" style="font-size: 18px"></i>
                                        Kurslar
                                    </a>
                                </li>


                                <!-- Partnyorlar -->
                                <li>
                                    <a href="<?php echo base_url("Panel_admin_page_tour_includes")?>" class="collapsible-header waves-effect">
                                        <i class="fas fa-image"></i>
                                        Kurslara Daxildir
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>
                    <!--Kurslar-->


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
                                        Blog Kateqoriya
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


                    <!--Slaydlar-->
                    <li>
                        <a class="collapsible-header waves-effect arrow-r">
                            <i class="w-fa fas fa-clone"></i>Slaydlar<i class="fas fa-angle-down rotate-icon"></i>
                        </a>
                        <div class="collapsible-body">
                            <ul>

                                <!-- Slayd -->
                                <li>
                                    <a href="<?php echo base_url("Panel_admin_page_main_slide")?>" class="collapsible-header waves-effect">
                                        <i class="far fa-clone"></i>
                                        Əsas Slayd
                                    </a>
                                </li>

                                <!-- Slayd -->
                                <li>
                                    <a href="<?php echo base_url("Panel_admin_page_additional_slide")?>" class="collapsible-header waves-effect">
                                        <i class="far fa-clone"></i>
                                        İkinci Slayd
                                    </a>
                                </li>


                                <!-- Slayd -->
                                <li>
                                    <a href="<?php echo base_url("Panel_admin_page_additional_slide2")?>" class="collapsible-header waves-effect">
                                        <i class="far fa-clone"></i>
                                        Üçüncü Slayd
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>
                    <!--Slaydlar-->


                    <!--FAQs-->
                    <li>
                        <a class="collapsible-header waves-effect arrow-r">
                            <i class="w-fa fas fa-clone"></i>FAQs<i class="fas fa-angle-down rotate-icon"></i>
                        </a>
                        <div class="collapsible-body">
                            <ul>

                                <!-- FAQs -->
                                <li>
                                    <a href="<?php echo base_url("Panel_admin_page_faqs")?>" class="collapsible-header waves-effect">
                                        <i class="fas fa-id-card"></i>
                                        FAQs
                                    </a>
                                </li>

                                <!-- FAQs -->
                                <li>
                                    <a href="<?php echo base_url("Panel_admin_page_faqs")?>" class="collapsible-header waves-effect">
                                        <i class="fas fa-id-card"></i>
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
                            <i class="w-fa fas fa-user"></i>Adminlər və İstifadəçilər<i class="fas fa-angle-down rotate-icon"></i>
                        </a>
                        <div class="collapsible-body">
                            <ul>

                                <?php if ($this->session->userdata("user_role") != 0){ ?>

                                    <!-- Users -->
                                    <li>
                                        <a href="<?php echo base_url("Panel_admin_page_users")?>" class="collapsible-header waves-effect">
                                            <i class="fas fa-users"></i>
                                            Adminlər
                                        </a>
                                    </li>

                                <?php }?>


                                <!-- Mesajlar -->
                                <li>
                                    <a href="<?php echo base_url("Panel_admin_page_cabinet")?>" class="collapsible-header waves-effect">
                                        <i class="fas fa-users"></i>
                                        İstifadəçilər
                                    </a>
                                </li>

                                <!-- Mesajlar -->
                                <li>
                                    <a href="<?php echo base_url("Panel_admin_page_messages")?>" class="collapsible-header waves-effect">
                                        <i class="far fa-comment"></i>
                                        Mesajlar
                                    </a>
                                </li>

                                <!-- Partnyorlar -->
                                <li>
                                    <a href="<?php echo base_url("Panel_admin_page_partners")?>" class="collapsible-header waves-effect">
                                        <i class="fas fa-users"></i>
                                        Partnyorlar
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
                                    <a href="<?php echo base_url("Panel_admin_page_offers_about")?>" class="collapsible-header waves-effect">
                                        <i class="fas fa-info-circle"></i>
                                        Tədbirlər Haqqında
                                    </a>
                                </li>

                                <!-- Təkliflər -->
                                <li>
                                    <a href="<?php echo base_url("Panel_admin_page_offers")?>" class="collapsible-header waves-effect">
                                        <i class="fas fa-info-circle"></i>
                                        Tədbirlər
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>
                    <!--Tədbirlər-->





                    <!-- Haqqımızda -->
                    <li>
                        <a href="<?php echo base_url("Panel_admin_page_about")?>" class="collapsible-header waves-effect">
                            <i class="fas fa-book-open"></i>
                            Haqqımızda
                        </a>
                    </li>





                    <!-- İnfo -->
                    <li>
                        <a href="<?php echo base_url("Panel_admin_page_faqs")?>" class="collapsible-header waves-effect">
                            <i class="fas fa-id-card"></i>
                            Nailiyyətlərimiz
                        </a>
                    </li>


                    <!-- Feedbacks -->
                    <li>
                        <a href="<?php echo base_url("Panel_admin_page_faqs")?>" class="collapsible-header waves-effect">
                            <i class="fas fa-id-card"></i>
                            Məzunların fikirləri
                        </a>
                    </li>


                    <!-- Xaricdə Təhsil -->
                    <li>
                        <a href="<?php echo base_url("Panel_admin_page_faqs")?>" class="collapsible-header waves-effect">
                            <i class="fas fa-id-card"></i>
                            Xaricdə Təhsil
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
                        <a class="dropdown-item" href="<?php echo base_url("Panel_admin_page_secure_login_page/logout")?>">Çıxış</a>
                    </div>
                </li>

            </ul>
            <!-- Navbar links -->

        </div>

    </nav>
    <!-- Navbar -->

</header>
<!-- Main Navigation -->
