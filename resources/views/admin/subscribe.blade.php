<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @include('admin.css')

    <style>
    .centered-table {
        width: 600px; /* ajustez la largeur selon vos besoins */
        margin-left: auto;
        margin-right: auto;
    }
    table {
       
    border-collapse: collapse;
  }

  th, td {
    border: 1px solid black;
    padding: 8px;
  }
  .rr{
 padding-top: 90px;


  }
</style>


</head>
<body style="background-color: bisque;">
<div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
   @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid ">
        <!-- partial:partials/_navbar.html -->
      @include('admin.header')
        <!-- partial -->
        
        <div class="main-panel">

        @if(session()->has('message'))
 
 <div class="alert alert-success">
 <button type="button" class="close" data-dismiss="alert" aria-hidden="true" >X</button>
 {{session()->get('message')}}
 
 
 </div>
 @endif
 <div class="rr">
 <table class="centered-table" style="border-collapse: collapse;">
    @foreach($subscribe as $subscribe)
        @if($subscribe->status == 0)
            <tr style="background-color: bisque; color:black;">
                <td>{{$subscribe->email}}</td>
                <td>
                    <button style="background-color:bisque;color:black;">
                        <a href="{{url('confirme',$subscribe->id)}}" style="color: #fff; text-decoration: none;">Confirm</a>
                    </button>
                </td>
            </tr>
        @else
            <tr style="background-color:bisque;color:black; ">
                <td>{{$subscribe->email}}</td>
                <td>
                <button style="background-color: bisque;color:black;" disabled>
                        <a href="" style="color: black; text-decoration: none; border-radius: 3px;" >Confirmed</a>
                    </button>
                </td>
                <td>
                    <img width="20px" height="20px" src="home/images/confirmer.png" alt="">
                </td>
            </tr>
        @endif
    @endforeach
</table>

</div>

        </div>
        </div>
     











    @include('admin.script')
    
</body>
</html>