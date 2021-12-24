@extends('admin.layout')
@section('dashboard-content')

    @if(Session::get('deleted'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="gone">
            <strong> {{ Session::get('deleted') }} </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if(Session::get('delete-failed'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert" id="gone">
            <strong> {{ Session::get('delete-failed') }} </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="mb-3 card">
        <div class="card-header">
            <i class="fas fa-table"></i>
            All Orders </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th> User </th>
                        <th> Price</th>
                        <th> Province</th>
                        <th>Actions </th>
                    </tr>
                    </thead>
                   
                    <tbody>

                    @foreach($orders as $order)

                        <tr>
                            <td> {{ $order->fname }} </td>
                            <td> {!! $order->total_price !!} </td>
                            <td> {{$order->province }}</td>
                            <td>
                                <a href="{{ URL::to('admin/edit-order') }}/{{ $order->id }}" class="btn btn-outline-primary btn-sm"> Edit </a>
                            </td>

                        </tr>


                    @endforeach



                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>

    <script>
        function checkDelete() {
            var check = confirm('Are you sure you want to Delete this?');
            if(check){
                return true;
            }
            return false;
        }
    </script>

@stop
