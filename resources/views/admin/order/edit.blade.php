 @extends('admin.layout')
 @section('dashboard-content')
     <h1> Update Order form</h1>

     @if (Session::get('success'))
         <div class="alert alert-success alert-dismissible fade show" role="alert" id="gone">
             <strong> {{ Session::get('success') }} </strong>
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
             </button>
         </div>
     @endif

     @if (Session::get('failed'))
         <div class="alert alert-warning alert-dismissible fade show" role="alert" id="gone">
             <strong> {{ Session::get('failed') }} </strong>
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
             </button>
         </div>
     @endif

     <form action="{{ URL::to('admin/post-order-edit-form') }}/{{ $order->id }}" method="post"
         enctype="multipart/form-data">
         @csrf


         @if ($order->status == '2')
             <div class="form-group">
                 <select class="form-control" name="delivery">
                     <option> Select delivery</option>
                     @foreach ($deliveryes as $delivery)

                         <option value="{{ $delivery->id }}"> {{ $delivery->name }}</option>
                     @endforeach

                 </select>
             </div>
             <button type="submit" class="btn btn-primary"> Update </button>
         @else
             <div class="container">
                 <article class="card">
                     <header class="card-header"> My Orders / Tracking </header>
                     <div class="card-body">
                         <h6 class="text-uppercase">Order Tacking: {{ $order->order_tacking }}5</h6>
                         <p>Name: {{ $order->fname }} {{ $order->lname }}</p>
                         <p>Cep: {{ $order->postalcode }}, {{ $order->address }}, {{ $order->city }}
                             {{ $order->province }}</p>
                         <p>Phone :{{ $order->phone }} Email: {{ $order->email }}</p>
                         <p>Data: {{ date('d-m-y', strtotime($order->created_at)) }}</p>
                         <p>Total:{{ $order->total_price }}</p>
                         <hr>

                         <a href="{{ url('admin/all-orders') }}" class="btn btn-warning" data-abc="true"> <i class="fa fa-chevron-left"></i> Back to
                             orders</a>
                     </div>
                 </article>
             </div>
         @endif


     </form>

     <script>
         function loadPhoto(event) {
             var reader = new FileReader();
             reader.onload = function() {
                 var output = document.getElementById('photo');
                 output.src = reader.result;
             };
             reader.readAsDataURL(event.target.files[0]);
         }
     </script>

 @stop
