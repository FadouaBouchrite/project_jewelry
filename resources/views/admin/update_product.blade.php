<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
    @include('admin.css')
    <style>

.center{
margin:auto;
width:50%;
padding-left: 60px;


}

input {
  border-radius: 10px;
}


</style>

  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
   @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
      @include('admin.header')
        <!-- partial -->
        <div  class="main-panel">
          <div class="content-wrapper">
            
<h1 style="font-size:larger;color:azure;text-align:center;padding-top:2cm">Update product</h1>
 <br><br><br>
@if(session()->has('message'))

<div class="alert alert-success">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true" >X</button>
{{session()->get('message')}}


</div>
@endif
<form class="center input" action="{{url('/update_product_confirm',$product->id)}}" method="post" enctype="multipart/form-data">
@csrf
<table>
    <tr>
      <td><label>Product title</label></td>
      <td><input style="color:black; border-radius: 5px;" type="text" name="title" placeholder="Write a title" value="{{$product->title}}"></td>
    </tr>
    <tr>
      <td><label>Product description</label></td>
      <td><input style="color:black; border-radius: 5px;" type="text" name="description" placeholder="Write a description" value="{{$product->description}}"></td>
    </tr>
    <tr>
      <td><label>Product price</label></td>
      <td><input style="color:black; border-radius: 5px;" type="number" name="price" placeholder="Write a price" value="{{$product->price}}"></td>
    </tr>
    <tr>
      <td><label>Product discount_price</label></td>
      <td><input style="color:black; border-radius: 5px;" type="number" name="discount_price" placeholder="Write a discount_price" value="{{$product->discount_price}}"></td>
    </tr>

    <tr>
      <td><label>Product quantity</label></td>
      <td><input style="color:black; border-radius: 5px;" type="number" name="quantity" placeholder="Write a quantity" value="{{$product->quantity}}"></td>
    </tr>
    <tr>
      <td><label> current Product category</label></td>
      <td><input style="color:black; border-radius: 5px;" type="text" name="category" placeholder="Write a quantity" value="{{$product->category}}" disabled></td>
       </tr>
       <tr> <td><label> chose new Product category</label></td>
      <td>
        <select style="color:black; border-radius: 5px;" name="category" id="" required>
           @foreach($category as $category)
          <option style="color: black;" value="{{$category->category_name}}">{{$category->category_name}}</option>
          @endforeach
        </select>

      </td>
   </tr>
    <tr>
      <td><label>current product image</label></td>
      <td><img src="/product/{{$product->image}}" alt="" width="100px" height="100px"> </td>
    </tr>
    <tr>
      <td><label>change Product image</label></td>
      <td><input style="border-radius: 5px;" type="file" name="image" required=""></td>
    </tr>
    <tr>
      <td colspan="2">
        <input type="submit" style="text-align: center; color: white; padding-left: 40%; border-radius: 5px;" name="submit" value="modify" >
      </td>
    </tr>
  </table>
</form>





            </div>
        </div> 
      






          

         
     
    @include('admin.script')
  </body>
</html>