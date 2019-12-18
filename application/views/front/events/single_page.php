<?php $this->load->view("front/includes/top_all"); ?>


<!-- Start Breadcrumbs -->
<section class="breadcrumbs overlay">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Events Pages</h2>
                <ul class="bread-list">
                    <li><a href="index.html">Home<i class="fa fa-angle-right"></i></a></li>
                    <li class="active"><a href="event-single.html">Event Single</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--/ End Breadcrumbs -->

<!-- Events -->
<section class="events single section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-12">
                <div class="single-event">
                    <div class="event-gallery">
                        <div class="single-gallery">
                           <img src="<?php echo base_url("public/front/") ?>images/events/event1.jpg" alt="#">
                        </div>
                        <div class="single-gallery">
                           <img src="<?php echo base_url("public/front/") ?>images/events/event2.jpg" alt="#">
                        </div>
                        <div class="single-gallery">
                           <img src="<?php echo base_url("public/front/") ?>images/events/event3.jpg" alt="#">
                        </div>
                    </div>
                    <div class="event-content">
                        <div class="meta">
                            <span><i class="fa fa-calendar"></i>05 June 2019</span>
                            <span><i class="fa fa-clock-o"></i>12.00-5.00PM</span>
                        </div>
                        <h2><a href="event-single.html">Best Student Award Day 2019</a></h2>
                        <p>Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words</p>
                       <img src="<?php echo base_url("public/front/") ?>images/events/event3.jpg" alt="#">
                        <p> littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humours</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-12">
                <div class="learnedu-sidebar">

                    <div class="single-widget course">
                        <h3>Popular <span>Courses</span></h3>
                        <!-- Single Course -->
                        <div class="single-course">
                           <img src="<?php echo base_url("public/front/") ?>images/course/course1.jpg" alt="#">
                            <div class="course-content">
                                <h4><a href="#">Beginner Course</a></h4>
                                <div class="meta">$900.00, <span><i class="fa fa-clock-o"></i>3 Years</span></div>
                            </div>
                        </div>
                        <!-- Single Course -->
                        <!-- Single Course -->
                        <div class="single-course">
                           <img src="<?php echo base_url("public/front/") ?>images/course/course2.jpg" alt="#">
                            <div class="course-content">
                                <h4><a href="#">Pre-Intermediate Course</a></h4>
                                <div class="meta">$150.00, <span><i class="fa fa-clock-o"></i>1 Year</span></div>
                            </div>
                        </div>
                        <!-- Single Course -->
                        <!-- Single Course -->
                        <div class="single-course">
                           <img src="<?php echo base_url("public/front/") ?>images/course/course3.jpg" alt="#">
                            <div class="course-content">
                                <h4><a href="#">Intermediate Course</a></h4>
                                <div class="meta">$500.00, <span><i class="fa fa-clock-o"></i>6 Month</span></div>
                            </div>
                        </div>
                        <!-- Single Course -->
                        <!-- Single Course -->
                        <div class="single-course">
                           <img src="<?php echo base_url("public/front/") ?>images/course/course4.jpg" alt="#">
                            <div class="course-content">
                                <h4><a href="#">Upper-Intermediate Course</a></h4>
                                <div class="meta">$200.00, <span><i class="fa fa-clock-o"></i>1 Year</span></div>
                            </div>
                        </div>
                        <!-- Single Course -->
                        <!-- Single Course -->
                        <div class="single-course">
                           <img src="<?php echo base_url("public/front/") ?>images/course/course5.jpg" alt="#">
                            <div class="course-content">
                                <h4><a href="#">Advanced Courses</a></h4>
                                <div class="meta">$300.00, <span><i class="fa fa-clock-o"></i>2 Years</span></div>
                            </div>
                        </div>
                        <!-- Single Course -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/ End Events -->
<!--/ End Courses -->






<!-- Footer -->
<?php $this->load->view("front/includes/footer"); ?>
<!--/ End Footer -->

