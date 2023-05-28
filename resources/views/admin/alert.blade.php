<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @include('admin.css')
</head>
<body style="background-color: bisque;">
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
          <div class="" style="padding-left: 80px;padding-top:50px">



          
    <table style="border-collapse: collapse; width: 100%; background-color: bisque; color: black; font-size: 14px;">
    
        <tr>
            <th style="border: 1px solid black; padding: 8px;">Titre</th>
            <th style="border: 1px solid black; padding: 8px;">Quantité</th>
            <th style="border: 1px solid black; padding: 8px;">Image</th>
        </tr>
       @foreach($prods as $prod)
        <tr> 
            <td style="border: 1px solid black; padding: 8px;">{{ $prod->title }}</td>
            <td style="border: 1px solid black; padding: 8px;">{{ $prod->quantity }}</td>
            <td style="border: 1px solid black; padding: 8px;"><img width="150px" height="10px" src="/product/{{ $prod->image }}" alt=""></td>
        </tr>@endforeach
    </table>











          </div>
        </div>
      </div>
       
        @include('admin.script')
</body>
</html>