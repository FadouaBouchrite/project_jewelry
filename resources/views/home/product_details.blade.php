<!DOCTYPE html>
<html>
   <head>

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









 .op1:hover {
  background-color: transparent;
  color: #b176ae;
}



.op2:hover {
  background-color: transparent;
  color: #000000;
}

.op1 .op2 {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: center;
      -ms-flex-pack: center;
          justify-content: center;
  margin-top: 45px;
  background-color: #73a6aa;
  border: 1px solid #000000;
  color: #ffffff;
  text-align:center;
}








</style>

   <base href="/public">
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



 .op1 {
    display: inline-block;
  padding: 8px 15px;
  border-radius: 30px;
  width: 165px;
  text-align: center;
  -webkit-transition: all .3s;
  transition: all .3s;
  margin: 5px 0;
  background-color: #c4b7b7;
  border: 1px solid #a7c4df;
  color: #cf8ac6;
}

.op1:hover {
  background-color: transparent;
  color: #b176ae;
}

 .op2 {
    display: inline-block;
  padding: 8px 15px;
  border-radius: 30px;
  width: 165px;
  text-align: center;
  -webkit-transition: all .3s;
  transition: all .3s;
  margin: 5px 0;
  background-color: #73a6aa;
  border: 1px solid #000000;
  color: #ffffff;
}

 .op2:hover {
  background-color: transparent;
  color: #000000;
}
.img-box {
  position: relative;
  width: 400px;
  height: 300px;
  overflow: hidden;
  padding-top: 8px;
}

.image-zoom {
  transition: transform 0.3s ease;
  cursor: zoom-in;
}

.img-box.zoomed .image-zoom {
  transform: scale(2);
}







      </style>
   </head>
   <body>
      <div style="text-align: center;" class="">
         <!-- header section strats -->
       @include('home.header')
         <!-- end header section -->   
      </div>
    
      <div class="col-sm-6 col-md-4 col-lg-4" style="margin:auto;height:5%;width: 50%;padding:30px; padding: top 0%;">
      <div class="img-box">
  <img src="/product/{{$product->image}}" class="image-zoom" alt="">
</div>

                     <div class="detail-box">
                        <h5>
                          {{$product->title}}
                        </h5>
                        <h6> Category : {{$product->category}}</h6>
                        <h6>  Description :{{$product->description}}</h6>
                        <h6> Quantity available : {{$product->quantity}}</h6>
                        <h6 id="bb" >
                            @if($product->discount_price!=null)
                   <span style="text-decoration: line-through;">{{$product->price}} </span>  
                  
                   <span style="font-style: italic;">dh</span>  - {{$product->discount_price}}<span style="font-style: italic;">dh</span>
                   @else
                   {{$product->price}}
                   <span style="font-style: italic;">dh</span>
                   @endif  
                </h6>


                           
  <a href="{{url('product',$product->category)}}" class="op1"> other product</a>
                        <br>
                          
                        <form action="{{url('add_cart',$product->id)}}" method="post">
   @csrf
<div >
<input type="number" style=" text-align:left; width:168px;margin-top: 15px;" id="op1" name="quantity" min="1" value="1" max="{{$product->quantity}}">
<input type="submit" style="text-align:left; height: 40px;margin-top: 15px; " id="op1" value="Add to Cart">

</div>
</form>
                          
                       



                      

                     
                 
               </div>
      
      
    

      </div>
   
     <script>

document.addEventListener('DOMContentLoaded', function() {
  var imgBox = document.querySelector('.img-box');
  var imageZoom = document.querySelector('.image-zoom');

  var isZoomed = false;

  imgBox.addEventListener('click', function(e) {
    if (!isZoomed) {
      zoomIn(e);
    } else {
      resetZoom();
    }
  });

  imgBox.addEventListener('dblclick', function(e) {
    resetZoom();
  });

  function zoomIn(e) {
    isZoomed = true;
    imgBox.classList.add('zoomed');

    var rect = imgBox.getBoundingClientRect();
    var offsetX = e.clientX - rect.left;
    var offsetY = e.clientY - rect.top;
    var scaleX = imgBox.offsetWidth / rect.width;
    var scaleY = imgBox.offsetHeight / rect.height;
    var translateX = offsetX * (1 - scaleX);
    var translateY = offsetY * (1 - scaleY);

    imageZoom.style.transformOrigin = offsetX + 'px ' + offsetY + 'px';
    imageZoom.style.transform = 'scale(2) translate(' + translateX + 'px, ' + translateY + 'px)';
  }

  function resetZoom() {
    isZoomed = false;
    imgBox.classList.remove('zoomed');
    imageZoom.style.transformOrigin = 'center center';
    imageZoom.style.transform = 'none';
  }
});


     </script>
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