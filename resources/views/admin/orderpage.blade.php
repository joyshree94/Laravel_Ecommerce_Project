<!DOCTYPE html>
<html lang="en">
  <head>
      @include('admin.css')
      <style type="text/css">

        .title_deg{
            text-align: center;
            font-size: 25px;
            font-weight:bold;
            padding-bottom: 40px;
        }
        .table_deg
        {
            border: 2px solid white;
            width: :100%;
            margin:auto;
            text-align:center;
        }
        .th_deg
        {
            background: skyblue;
        }
        .th_deg th
        {
            padding: 5px;
        
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

                    <h1 class="title_deg">All Orders</h1>
                    <div style=" padding-left:400px;; padding-bottom:30px;">
                        <form action="{{ url('search') }}" method="get">
                            @csrf
                            <input type="text" style="color: black;" name="search" placeholder="search for something">
                            <input type="submit" value="search" class="btn btn-outline-primary">
                        </form>
                    </div>
                    <table class="table_deg">
                        <tr class="th_deg"> 	
                            <th style="padding: 5px;">Name</th>
                            <th style="padding: 5px;">Email</th>
                            <th style="padding: 5px;">Address</th>
                            <th style="padding: 5px;">Phone</th>
                            <th style="padding: 5px;">Product Title</th>
                            <th style="padding: 5px;">Quantity</th>
                            <th style="padding: 5px;">Price</th>
                            <th style="padding: 5px;">Payment Status</th>
                            <th style="padding: 5px;">Delivery Status</th>
                            <th style="padding: 5px;">Image </th>
                            <th style="padding: 5px;">Delivered </th>
                            <th style="padding: 5px;">Print PDF </th>
                            <th style="padding: 5px;"> Send Email </th>
                            
                        
                        </tr>
                        @forelse ($orders as $order)
                            
                        <tr>
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->email }}</td>
                            <td>{{ $order->address }}</td>
                            <td>{{ $order->phone }}</td>
                            <td>{{ $order->product_title }}</td>
                            <td>{{ $order->quantity }}</td>
                            <td>{{ $order->price }}</td>
                            <td>{{ $order->payment_status }}</td>
                            <td>{{ $order->delivery_status }}</td>
                            <td>
                            <img src="/product/{{ $order->image }}" alt="image" height="100px" width="100px">
                            </td>
                            <td>
                                @if ($order->delivery_status == "processing")
                                <a href="{{ url('delivery',$order->id) }}" onclick="return confirm('Are you sure to delete this category')"  class="btn btn-primary">Delivered</a>
                              
                                @else
                                <p style="color:green;">delivered</p>
                                @endif
                            </td>
                            <td>
                                <a href="{{ url('print_pdf',$order->id) }}" class="btn btn-secondary">Print PDF</a>
                            </td>
                            <td>
                                <a href="{{ url('send_email',$order->id) }}" class="btn btn-info">Send email</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="16">No data found</td>
                        </tr>
                        
                        @endforelse
                    </table>
            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>