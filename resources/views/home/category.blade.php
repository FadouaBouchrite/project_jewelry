<base href="/public">
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


#bb{


   font-weight: 100;

}


   .img-box {
      background-color: pink;
   }
</style>

<section class="product_section layout_padding">
   <div class="container">
      <div class="heading_container heading_center">
         <h2>
            <span style="color: #cf8ac6;"> Our </span><span style="color:cadetblue">Categories</span>
         </h2>
      </div>
      <div class="row">
         @foreach($category as $categorys)
         <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="box">
               <div class="option_container">
                  <div class="options">
                     <a href="{{url('product',$categorys->category_name)}}" class="option1"> show category products</a>
                  </div>
               </div>
               <div class="img-box">
                  <img src="/category/{{$categorys->image}}" style="border-radius: 14px solid cadetblue; background-color: #cf8ac6;" alt="">
               </div>
               <div class="detail-box">
                  <h5>
                     {{$categorys->category_name}}
                  </h5>
                  </h6>
               </div>
            </div>
         </div>
         @endforeach
      </div>
   </div>
</section>

<button style="background-color: #84c2ba;">
  <a href="{{url('/')}}" style="color: white; text-decoration: none;display:flex;padding: left 60px; border-radius:12px; text-align:center;">Go back</a>
</button>


<script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>




