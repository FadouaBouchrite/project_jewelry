

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <style>




 #op1:hover {
  background-color: transparent;
  color: #b176ae;
}



#op2:hover {
  background-color: transparent;
  color: #000000;
}

#op1
{
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: center;
      -ms-flex-pack: center;
          justify-content: center;
  margin-top: 45px;
  background-color: #73a6aa;
  border: 1px solid #000000;
  border-radius: 50px;
  color: #ffffff;
}

#op2 {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: center;
      -ms-flex-pack: center;
          justify-content: center;
  margin-top: 45px;
  background-color: #73a6aa;
  border: 1px solid #000000;
  border-radius: 50px;
  color: #ffffff;
}









</style>
   <base href="/public">
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

</style>
</head>
<body>
@include('home.header')
<section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>

                 <span style="  color: #cf8ac6;"> {{$category}} </span><span style="color:cadetblue"></span>
               </h2>
            </div>
            <form action="{{url('search',$category)}}">
<input type="text" name="product" >
<input type="submit" value="Search">
            </form>
            <div class="row">
               @foreach($product as $products)
               @if ($products->quantity > 0)

               <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           

                           <a href="{{url('product_details',$products->id)}}" class="option1"> Show details </a>
                           
<form action="{{url('add_cart',$products->id)}}" method="post">
   @csrf
<div >
  
<input type="number" id="op1" name="quantity" min="1" value="1" max="{{$products->quantity}}">
<input type="submit" id="op1" value="Add to Cart">

</div>

</form>



                        </div>
                     </div>
                     <div class="img-box">
                        <img src="/product/{{$products->image}}" style="border-radius: 14px solid cadetblue;"  alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                          {{$products->title}}
                        </h5>
                        <h6 id="bb" >
                   <span style="text-decoration: line-through;">{{$products->price}} </span>     <span style="font-style: italic;">dh</span>  - {{$products->discount_price}}<span style="font-style: italic;">dh</span>
                        </h6>
                     </div>
                  </div>
                 
               </div>
               @endif
              @endforeach


         </div>
      </section> 
      <button style="background-color: #84c2ba;">
  <a href="{{url('show_categorie')}}" style="color: white; text-decoration: none;display:flex;padding: left 60px; border-radius:12px; text-align:center;">Go back</a>
</button>

</body>

  <!-- jQery -->
  <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>


</html>














