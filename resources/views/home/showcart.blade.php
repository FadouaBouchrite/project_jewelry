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
 <div class="center">
 @if(session()->has('message'))
    <div class="alert alert-success" style="background-color: #8fc3c5">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true" >X</button>
        {{ session()->get('message') }}
    </div>
@endif



        <table>

<tr>
<th class="th_deg">Product title</th>
<th class="th_deg">Product quantity</th>
<th class="th_deg">price</th>
<th class="th_deg">image</th>
<th class="th_deg">Action</th>


</tr>
<?php $totalprice=0;  ?>
@foreach($cart as $cart)
<tr>
<td>{{$cart->product_title}}</td>
<td>{{$cart->quantity}}</td> 
<td>{{$cart->price}}</td>
<td><img class="img_deg" src="/product/{{$cart->image}}" alt=""></td>
<td><a href="{{url('remove_cart',$cart->id)}}" onclick="return confirm('are you sure to delete this product ?')" class="btn" style="background-color: #8fc3c5; border:solid "> Remove Product</a></td>
<td></td>

</tr>

<?php $totalprice=$cart->price+$totalprice;    ?>
@endforeach




        </table>


<br>
<div>
<h1 class="total_deg">Total price:{{$totalprice}}</h1>

</div>

    <div>



    <h1 style="font-size: 25px; padding-bottom:15px;"> Proced to Order</h1>
    <a href="{{url('cash_order')}}" class="btn btn-danger">Cash on delivery</a>
   <a href="{{url('stripe',$totalprice)}}" class="btn btn-danger">Pay using card</a>
   
   </div>

     
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