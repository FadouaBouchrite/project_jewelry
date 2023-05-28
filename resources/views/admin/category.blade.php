<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Page</title>
  @include('admin.css')
  <style type='text/css'>
    .back{


      border: solid black 10px;
      padding-left: 60px;
    }

    body {
      background-color: bisque;
    }

    .center {
      margin: auto;
      width: 50%;
      text-align: center;
      margin-top: 30px;
      font-size: medium;
      border: 3px solid white;
      background-color: white;
    }
    
    .main-panel {
      text-align: center;
      padding-top: 50px;
      font-size: 40px;
      padding-bottom: 40px;
    }
    
    .btn-primary {
      background-color: #a7c4df;
      color: white;
    }
    
    .btn-danger {
      background-color: white;
      color: blue;
      border: 1px solid black;
    }
    
    .alert {
      background-color: #a7c4df;
      color: white;
      border: none;
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
      <div class="main-panel">
        <div class="" style="background-color: bisque;">
          @if(session()->has('message'))
            <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
              {{session()->get('message')}}
            </div>
          @endif

          <h2 style="color: black;">Category</h2>
          <div class="back">
          <form action="{{url('/add_category')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input style="color: black; border-radius: 20px;" type="text" name="category" placeholder="Write category name" required>
            <br>
            <input style="color: black; padding: 8px 12px; border: 1px solid black; background-color: #f1f1f1; border-radius: 4px; font-size: 14px;" type="file" name="image" required>

            <br>
            <input type="submit" name="submit" class="btn btn-primary" value="Add Category">
          </form>
        </div>
        <table class="center">
          <tr>
            <td>Category Name</td>
            <td>Action</td>
          </tr>
          @foreach($data as $data)
          <tr class="center">
            <td>{{$data->category_name}}</td>
            <td><img src="category/{{$data->image}}" height="100px" width="100px" alt=""></td>
            <td>
              <a onclick="return confirm('Are you sure to delete this category?')" class="btn btn-danger" href="{{url('delete_category',$data->id)}}">Delete</a>
            </td>
          </tr>
          @endforeach
        </table></div>
      </div>
    </div>
  </div>
  @include('admin.script')
</body>
</html>
