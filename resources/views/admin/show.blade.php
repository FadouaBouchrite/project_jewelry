<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/public">
@include('admin.css')
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        <div style="text-align: center; padding-top:50px;
        
        font-size:40px; padding-bottom:40px;" class="main-panel">
          <div class="content-wrapper">
          @if(session()->has('message'))
 
 <div class="alert alert-success">
 <button type="button" class="close" data-dismiss="alert" aria-hidden="true" >X</button>
 {{session()->get('message')}}
 
 
 </div>
 @endif


 <div style="background-color: #73a6aa; padding: 20px; color: #fff;">
    <p style="font-size:medium;">{{$contact->message}}</p> 
    <form action="{{url('send',$contact->id)}}" style="margin-top: 20px;">
        <textarea name="reponse" cols="10" rows="5" placeholder="Envoyer une réponse" style="width: 100%; border: 1px solid #fff; padding: 10px; color: #fff; background-color: transparent;resize: none;"></textarea>
        <br>
        <input type="submit" value="Envoyer" style="background-color: #fff; color: #73a6aa; padding: 10px 20px; border: none; cursor: pointer; margin-top: 10px;">
    </form>
</div>


          </div>
        
        </div>
      </div>
</div>
        @include('admin.script')



</body>
</html>