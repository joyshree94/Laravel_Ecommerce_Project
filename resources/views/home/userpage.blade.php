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
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->
         <!-- slider section -->
         @include('home.slider')
         <!-- end slider section -->
      </div>
      <!-- why section -->
      @include('home.why')
      <!-- end why section -->
      
      <!-- arrival section -->
      @include('home.new_arival')
      <!-- end arrival section -->
      
      <!-- product section -->
      @include('home.product')

<!----comment and reply system start from here--->

      <div style="text-align: center; padding-bottom:30px;">
         <h1 style="text-align=center; font-size:30px;padding-top:20px;padding-bottom:20px;">Comments</h1>
         <form action="{{ url('add_comment') }}" method="POST">
            @csrf
            <textarea style="height:150px;width:500px;" placeholder="write something here" name="comment"></textarea>
         </br>
         <input type="submit" class="btn btn-primary" value="comment">
         
         </form>
      </div>
      <div style="padding-left: 20%;">
         <h1 style="text-align=center; font-size:30px;padding-top:20px;padding-bottom:20px;">All Comments</h1>
         @foreach ($comment as $item)
        
         <div>
            <b>{{ $item->name }}</b>
            <p>{{ $item->comment }}</p>
            <a href="javascript::void(0);" style="color: blue;" onclick="reply(this)" data-Commentid="{{ $item->id }}">Reply</a>
            @foreach ($reply as $data)
            @if ($data->comment_id == $item->id)
            <div style="padding-left:3%;padding-bottom:10px;padding-top:10px;">
                  <b>{{ $data->name }}</b>
                  <p>{{ $data->reply }}</p>
                  <a href="javascript::void(0);" style="color: blue;" onclick="reply(this)" data-Commentid="{{ $item->id }}">Reply</a>
            </div>      
            @endif
            @endforeach
            
         </div> 
         @endforeach
      </div>
      <div  style="display:none;" class="replydiv">
         <form action="{{ url('add_reply') }}" method="POST">
            @csrf
            <input type="text" name="commentid" id ="commentid" hidden="">
            <textarea style="height:100px;width:500px;" placeholder="write something" name="reply"></textarea>
            </br>
            <button style="color: white;"submit" class="btn btn-primary">Reply</button>
            <a href="javascript::void(0);" class="btn" onClick="reply_close(this)">close</a>
      </form>
      </div>
      

      <!-- end product section -->

      <!-- subscribe section -->
      @include('home.subscribe')
      <!-- end subscribe section -->
      <!-- client section -->
      @include('home.client')
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
      <script type='text/javascript'>
         function reply(caller)
         {
            document.getElementById('commentid').value=$(caller).attr('data-Commentid');
            $('.replydiv').insertAfter($(caller));
            $('.replydiv').show();
         }
         function reply_close(caller)
         {
            $('.replydiv').hide();
         }
      </script>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="jhome/s/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>