<!DOCTYPE html>
<html lang="en">
  <head>
      @include('admin.css')
      <style type="text/css">
      .h2_font
        {
            font-size: 40px;
            padding-top: 20px;
            text-align: center;
        }
    .center
    {
        margin: auto;
        width:80%;
        border: 2px solid white;
        margin-top: 40px;

    }
    .th_color
    {
        background-color: skyblue;
    }
    .th_deg
    {
        padding: 30px;
    }
   
      </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            {{ session()->get('message')}}
                    </div>

                @endif
                <h2 class="h2_font">All Products</h2>
                <table class="center">
                    <tr class="th_color">
                        <td class="th_deg">Product Title</td>
                        <td class="th_deg">Description</td>
                        <td class="th_deg">Quantity</td>
                        <td class="th_deg">Category</td>
                        <td class="th_deg">Price</td>
                        <td class="th_deg">Discount Price</td>
                        <td class="th_deg">Product Image</td>
                        <td class="th_deg">Delete</td>
                        <td class="th_deg">Edit</td>
                      
                       
                        
                    </tr>
                    @foreach ($datas as $data)
                    <tr>
                        <td>{{ $data->title }}</td>
                        <td>{{ $data->description }}</td>
                        <td>{{ $data->quantity }}</td>
                        <td>{{ $data->category }}</td>
                        <td>{{ $data->price }}</td>
                        <td>{{ $data->discount }}</td>
                        <td>
                            <img src="/product/{{ $data->image }}" width="80px" height="80px"alt="img">
                        </td>
                        <td class="th_deg">
                            <a onclick="return confirm('Are you sure to delete this category')" class="btn btn-danger" href="{{ url('/delete_product', $data->id) }}">Delete</a>

                        </td>
                        <td>
                            <a class="btn btn-success" href="{{ url('/update_product',$data->id) }}">Edit</a>
                        </td>
                       
                    </tr>
                    @endforeach
                    {{ $datas->links() }}
                </table>
            </div>
        </div>
        
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>