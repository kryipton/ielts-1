<?php $this->load->view("front/includes/top_all"); ?>


<!-- Start Breadcrumbs -->
<section class="breadcrumbs overlay">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Team Page</h2>
                <ul class="bread-list">
                    <li><a href="index.html">Home<i class="fa fa-angle-right"></i></a></li>
                    <li class="active"><a href="team-single.html">Team Single</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--/ End Breadcrumbs -->

<!-- Start Team Detail Area-->
<section class="team-details section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="member-detail">
                    <div class="image">
                        <img src="<?php echo base_url("public/front/") ?>images/team/team4.jpg" alt="#">
                    </div>
                    <div class="contact">
                        <ul class="social">
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="active"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-paper-plane"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                        <ul class="address">
                            <li><a href="mailto:hi@ieltscoaching.az"><i class="fa fa-envelope"></i>hi@ieltscoaching.az</a></li>
                            <li><i class="fa fa-phone"></i>(+994) 55 520 99 19</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <div class="detail-content">
                    <h2>Khumar Karimova</h2>
                    <p class="title">IELTS teacher</p>
                    <p>Over 20 years experience as a teacher, course designerand examiner
                        Hold a Master’s degree from a top 1% university
                        Holder of Trinity College London TESOL Certificate
                        Former Chief Examiner at a Singaporean University
                        Taught English in four different countries
                        Helped many students achieve IELTS scores from band 7 to 9.0.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ End Team Detail Area-->





<!-- Footer -->
<?php $this->load->view("front/includes/footer"); ?>
<!--/ End Footer -->

