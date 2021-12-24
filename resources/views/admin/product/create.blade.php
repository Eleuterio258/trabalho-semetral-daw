 @extends('admin.layout')
@section('dashboard-content')
    <h1> Create product form</h1>

    @if(Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="gone">
            <strong> {{ Session::get('success') }} </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if(Session::get('failed'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert" id="gone">
            <strong> {{ Session::get('failed') }} </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <form action="{{ URL::to('admin/post-product-form') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1"> Product name </label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter product name" name="productName">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1"> Product price </label>
            <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="0.0" name="productPrice">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1"> Product stock </label>
            <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="0.0" name="productStock">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1"> Product Detail </label>
            <textarea name="producDescription" id="editor1"></textarea>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1"> Select product category </label>
            <select class="form-control" name="category">
                <option> Select </option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"> {{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1"> Select product Brand </label>
            <select class="form-control" name="brand">
                <option> Select </option>
                @foreach($brands as $brand)
                    <option value="{{ $brand->id }}"> {{$brand->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1"> Product Photo </label>
            <input type="file" class="form-control" id="image" name="image" onchange="loadPhoto(event)">
        </div>

        <div class="form-group">
            <img id="photo" height="100" width="100">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1"> Is Hot Product </label>
            <input type="checkbox" name="isHot"/>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1"> Is New Arrival </label>
            <input type="checkbox" name="isNew"/>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <script>
        function loadPhoto(event) {
            var reader = new FileReader();
            reader.onload = function () {
                var output = document.getElementById('image');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>

@stop
