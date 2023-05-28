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
      <link rel="shortcut icon" href="home/images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />

<style>

.center{

margin:auto;
width: 50%;
text-align: center;
padding: 10px;


}

table,th,td{


border: 1px solid grey;




}

.th_deg{


font-size:30px;
padding:5px;
background:#8fc3c5;

}
.total_deg{

font-size: 20px;
padding: 40px;
text-align: center;
border: solid #8fc3c5;

}

</style>


   </head>
   <body>
      <div class="">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->
      </div>
      <div class="center" style="padding-top: 10px;">
    @if(session()->has('message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
            {{session()->get('message')}}
        </div>
    @endif

    <form action="{{url('/add_message')}}" method="POST" style="border: 1px solid #8fc3c5; padding: 10px;">
        @csrf
        <input name="stat" type="text" value="0" hidden>
        <textarea name="message" id="" cols="30" rows="10" placeholder="Thanks for entering your message here"></textarea>

        <input type="submit" name="submit" value="Send your comment" style="background-color: #8fc3c5; color: #fff; padding: 5px 10px; border: none; cursor: pointer;">
    </form>
</div>

<div style="display:flex; text-align:center;padding-left:43%;padding-top:2%">


<!-- WhatsApp -->
<a href="https://wa.me/0648162310" target="_blank">
  <img height="60px" width="60px" src="home/images/whatsapp icone.jpg" alt="WhatsApp">
</a>

<!-- Instagram -->
<a href="https://www.instagram.com/FADOUA_BE/" target="_blank">
  <img height="60px" width="60px" src="home/images/instagram.png" alt="Instagram">
</a>

<!-- Facebook -->
<a href="https://www.facebook.com/fadoua Be/" target="_blank">
  <img height="60px" width="60px" src="home/images/facebook.jpg" alt="Facebook">
</a>



</div>

      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>