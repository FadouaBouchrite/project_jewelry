<!DOCTYPE html>
<html lang="en">
  <head>

    @include('admin.css')
    <style>
      input[type="submit"]:hover { 
      
  background-color: white;

}

body{

  background-color: #a7c4df;
}
.center{
margin:auto;
width:50%;
padding-left: 60px;


}
.vv{

  border: solid black 10px;
}
td{

  color: black;
}

input {
  border-radius: 10px;
}


</style>

  </head>
  <body style="background-color:bisque">
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
   @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
      @include('admin.header')
        <!-- partial -->
        <div  class="main-panel">
          <div >
            
<h1 style="font-size:larger;color:bisque;text-align:center;padding-top:2cm">Add product</h1>
 <br><br><br>
@if(session()->has('message'))

<div class="alert alert-success">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true" >X</button>
{{session()->get('message')}}


</div>
@endif
<div class="vv">
<form class="center input" action="{{url('/add_product')}}" method="post" enctype="multipart/form-data">
@csrf
<table>
    <tr>
      <td><label>Product title</label></td>
      <td><input style="color:black; border-radius: 5px;" type="text" name="title" placeholder="Write a title"></td>
    </tr>
    <tr>
      <td><label>Product description</label></td>
      <td><input style="color:black; border-radius: 5px;" type="text" name="description" placeholder="Write a description"></td>
    </tr>
    <tr>
      <td><label>Product price</label></td>
      <td><input style="color:black; border-radius: 5px;" type="number" name="price" placeholder="Write a price"></td>
    </tr>
    <tr>
      <td><label>Product discount_price</label></td>
      <td><input style="color:black; border-radius: 5px;" type="number" name="discount_price" placeholder="Write a discount_price"></td>
    </tr>

    <tr>
      <td><label>Product quantity</label></td>
      <td><input style="color:black; border-radius: 5px;" type="number" name="quantity" placeholder="Write a quantity"></td>
    </tr>
    <tr>
      <td><label>Product category</label></td>
      <td>
        <select style="color:black; border-radius: 5px;" name="category" id="" required>
        
          <option value="">Select a category</option>
          @foreach($data as $data)
          <option style="color: black;" value="{{$data->category_name}}">{{$data->category_name}}</option>
          @endforeach
        </select>
      </td>
    </tr>
    <tr>
      <td><label>Product image</label></td>
      <td><input style="border-radius: 5px;" type="file" name="image" required=""></td>
    </tr>
    <tr>
  <td colspan="2" style="text-align: center;">
    <input type="submit" value="add product to product list" style="color: black; border: solid black; " name="submit">
  </td>
</tr>

  </table>
</form>
</div>




            </div>
        </div> 
      






          

         
     
    @include('admin.script')
  </body>
</html>