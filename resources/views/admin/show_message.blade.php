<!DOCTYPE html>
<base href="/public">
<html lang="en">
  <head>

  @include('admin.css')
    <style>
body {
  background-color: bisque;
}
.center{
margin:auto;
width:50%;
padding-left: 60px;


}

input {
  border-radius: 10px;
}
.read {
    font-weight: bold;
    color: black;
}
.cc{

  border: 1px solid black; 
  padding: 8px;

}
.cc:hover{

  border: 1px solid black; 
  padding: 8px;
background-color:  black;

}


table {
    border-collapse: collapse;
  }

  th, td {
    border: 1px solid black;
    padding: 8px;
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
          <div style="padding-left: 100px;padding-right:150px" class="">
            




          <h2 style="color: bisque;">Nouveaux messages des contacts</h2>
<table style="border-collapse: collapse; width: 100%; background-color: bisque;">
    <thead>
        <tr>
            <th style="border: 1px solid black; padding: 8px; color:black;">De</th>
        </tr>
    </thead>
    <tbody>
        @foreach($messages as $message)
        @if($message['status'] == 0)
            <tr>
                <td class="cc" style="border: 1px solid black; padding: 8px;">
                    <button style="background-color: transparent; border: none;">
                        <a href="{{url('show',$message['id'])}}" style="color: #fff; text-decoration: none;">{{$message['email']}}</a>
                    </button>
                </td>
            </tr>
        @else
            <tr>
                <td>
                    <button style="background-color: transparent; border: none;">
                        <a href="{{url('show',$message['id'])}}" style="color: #fff; text-decoration: none;">{{$message['email']}}</a>
                    </button>
                </td>
            </tr>
        @endif
        @endforeach
    </tbody>
</table>


<style>
    .unread {
        display: none;
    }
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(function () {
        $('.show-message-btn').click(function () {
            $(this).parent().find('.message-content').toggle();
        });
    });
</script>











            </div>
        </div> 
      






          

         
     
    @include('admin.script')
  </body>
</html>
















































