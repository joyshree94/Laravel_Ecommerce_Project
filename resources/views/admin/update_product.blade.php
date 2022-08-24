<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
      @include('admin.css')
      <style type="text/css">

        .div_center
        {
            margin: auto;
            text-align: center;
            padding-top: 40px;
        }
        .h2_font
        {
            font-size: 40px;
            padding-bottom: 40px;
        }
        .text_color
        {
            color: black;
            padding-bottom: 20px;
        }
        label
        {
            display: inline-block;
            width: 100px;
        }
        .div_design
        {
            padding-bottom: 15px;
            
        }
        .div_design input
        {
            color: black;
        }
        .div_design select
        {
            color: black;
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
                <div class="div_center">
                    <h2 class="h2_font">Update Product</h2>
                </div>

                <form action="{{ url('/update_product_confirm',$data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                    <div class="div_design">
                    <label for="">Product Title:</label>
                    <input type="text_color" type="text" name="title" placeholder="write a title" value="{{ $data->title }}" required="">
                    </div>
                    <div class="div_design">
                        <label for="">Product Description:</label>
                        <input type="text_color" type="text" name="description" placeholder="write a description" value="{{ $data->description }}" required="">
                    </div>
                    <div class="div_design">
                        <label for="">Product Category:</label>
                        <select name="category" class="text_color" required="">
                           
                            @foreach ($cat as $cat)
                            <option value="{{ $cat->category_name}}" selected=""> {{ $cat->category_name}}</option>
                            @endforeach
                        </select>
                       
                        
                    </div>
                    <div class="div_design">
                        <label for="">Product Price:</label>
                        <input type="text_color" type="number" name="price" placeholder="write price" value="{{ $data->price }}" required="">
                    </div>
                    <div class="div_design">
                        <label for="">Product Quantity:</label>
                        <input type="text_color" type="number" min="0" name="quantity" placeholder="write quantity" value="{{ $data->quantity }}" required="">
                    </div>
                    <div class="div_design">
                        <label for="">Product Discount Price:</label>
                        <input type="text_color" type="number" name="discount" value="{{ $data->discount }}" placeholder="write discount price">
                    </div>
                    <div class="div_design">
                        <label for="">Curent Image:</label>
                        <img src="/product/{{ $data->image }}" width="80px" height="80px"alt="img">
                    </div>
                    <div class="div_design">
                        <label for="">change Image:</label>
                        <input type="file"  name="image">
                    </div>
                    <div class="div_design">
                        <input type="submit" value="Update Products" class="btn btn-primary">
                    </div>
                </form>
                
            </div>
        </div>
    
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>