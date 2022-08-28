<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
      <link href="home/css/custom.css" rel="stylesheet" />
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->
         <section class="inner_page_head">
            <div class="container_fuild">
               <div class="row">
                  <div class="col-md-12">
                     <div class="full">
                        <h3>About us</h3>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <section class="why_section layout_padding">
            <div class="container">
               <div class="heading_container heading_center">
                  <h2>
                     Why Shop With Us
                  </h2>
               </div>
               <div class="row">
                  <div class="col-md-4">
                     <div class="box ">
                        <div class="img-box">
                           
                        </div>
                        <div class="detail-box">
                           <h5>
                              Fast Delivery
                           </h5>
                           <p>
                              variations of passages of Lorem Ipsum available
                           </p>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="box ">
                        <div class="img-box">
                           
                        </div>
                        <div class="detail-box">
                           <h5>
                              Free Shiping
                           </h5>
                           <p>
                              variations of passages of Lorem Ipsum available
                           </p>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="box ">
                        <div class="img-box">
                           
                        </div>
                        <div class="detail-box">
                           <h5>
                              Best Quality
                           </h5>
                           <p>
                              variations of passages of Lorem Ipsum available
                           </p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>

         <section class="arrival_section">
            <div class="container">
               <div class="box">
                  <div class="arrival_bg_box">
                     <img src="images/arrival-bg.png" alt="">
                  </div>
                  <div class="row">
                     <div class="col-md-6 ml-auto">
                        <div class="heading_container remove_line_bt">
                           <h2>
                              #NewArrivals
                           </h2>
                        </div>
                        <p style="margin-top: 20px;margin-bottom: 30px;">
                           Vitae fugiat laboriosam officia perferendis provident aliquid voluptatibus dolorem, fugit ullam sit earum id eaque nisi hic? Tenetur commodi, nisi rem vel, ea eaque ab ipsa, autem similique ex unde!
                        </p>
                        <a href="">
                        Shop Now
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         </section>
        
      <!-- end client section -->
      <!-- footer start -->
      @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
      <script type='text/javascript'>
         document.addEventListener("DOMContentLoaded", function(event) { 
             var scrollpos = localStorage.getItem('scrollpos');
             if (scrollpos) window.scrollTo(0, scrollpos);
         });
 
         window.onbeforeunload = function(e) {
             localStorage.setItem('scrollpos', window.scrollY);
         };
     </script>
     
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/s/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
      <script>
         const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
      const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
         </script>
   </body>
</html>