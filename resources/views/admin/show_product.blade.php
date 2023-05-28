<head>

@include('admin.css')
<style type="text/css">
.product-image {
   width: 200px;
   height: 200px;
}

.vv{

border: solid black 10px;
}
.a{
padding-left: 90px;

}

</style>



</head>




  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
   @include('admin.sidebar')
      <!-- partial -->
     
        <!-- partial:partials/_navbar.html -->
      @include('admin.header')
        <!-- partial -->
        <div  class="main-panel">
          <div style="background-color:bisque">
          <div class="table-responsive">
          @if(session()->has('message'))
 
 <div class="alert alert-success">
 <button type="button" class="close" data-dismiss="alert" aria-hidden="true" >X</button>
 {{session()->get('message')}}
 
 
 </div>
 @endif
 <div class="a">
 <div class="vv">
 <table class="table table-hover">
    <thead>
      <tr>
        <th>Product title</th>
        <th>Product description</th>
        <th>Category</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Discount price</th>
        
        <th>Product image</th>
        <th>Product edit</th>
        <th>Product delete</th>
      </tr>
    </thead>
    <tbody>
      @foreach($data as $data)
      <tr>
        <td>{{$data->title}}</td>
        <td>{{$data->description}}</td>
        <td>{{$data->category}}</td>
        <td>{{$data->price}}</td>
        <td>{{$data->quantity}}</td>
        <td>{{$data->discount_price}}</td>
        <td><img class="product-image" src="/product/{{$data->image}}" alt=""></td>
     <td> <a href="{{url('update_product',$data->id)}}" class="btn btn-primary"> edit</a> </td>
     <td> <a href="{{url('delete_product',$data->id)}}" class="btn btn-primary">delete</a></td>

      </tr> 
      @endforeach
    </tbody>
  </table></div>
</div>







          </div>
        </div></div>
          @include('admin.script')
  </body>
</html>