<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="admin.css">
  <style>
    .table-container {
      overflow-x: auto;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    th, td {
      color: black;
      border: 1px solid black;
      padding: 8px;
    }

    .container-scroller {
      /* Ajoutez les styles de votre choix pour le conteneur principal */
    }

    /* Ajoutez les autres styles personnalisés */
  </style>
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
<div style="padding-left: 90px;padding-top:40px">
    <div class="main-panel">
      <div class="cc">
        <h1 class="title_deg" style="color: black; font-size: larger; text-align: center;">All Orders</h1>
        <div class="table-container">
          <table class="table_deg">
            <tr>
              <th>name</th>
              <th>email</th>
              <th>Address</th>
              <th>phone</th>
              <th>product_title</th>
              <th>quantity</th>
              <th>Price</th>
              <th>Payment status</th>
              <th>Delivery Status</th>
              <th>image</th>
              <th>status</th>
            </tr>
            @foreach($order as $order)
              <tr>
                <td>{{$order->name}}</td>
                <td>{{$order->email}}</td>
                <td>{{$order->address}}</td>
                <td>{{$order->phone}}</td>
                <td>{{$order->product_title}}</td>
                <td>{{$order->quantity}}</td>
                <td>{{$order->price}}</td>
                <td>{{$order->payment_status}}</td>
                <td>{{$order->delivery_status}}</td>
                <td>
                  <img src="/product/{{$order->image}}" alt="" style="max-width: 100px; max-height: 100px; border-radius: 10px;">
                </td>
                <td>
                  <button style="background-color: black; border-radius: 4px;">
                    <a href="{{url('done',$order->id)}}" style="color: #fff; text-decoration: none;">Confirm</a>
                  </button>
                </td>
              </tr>
            @endforeach
          </table>
        </div>
      </div>
    </div>
  </div>
</div></div>
@include('admin.script')
</body>
</html>
