@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Thêm Planting Area</div>
                    <div class="card-body">
                        <form action="{{ route('plantingarea.store')  }}" method="POST" enctype="multipart/form-data">
                            @method('POST')
                            @csrf
                            <div class="form-group">
                                <label for="inputAddress">Farm Name</label>
                                <input type="text" name="farm_name" class="form-control" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Address</label>
                                <input type="text" name="address" class="form-control" placeholder="Address">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Growing Area</label>
                                <input type="text" name="growing_area" class="form-control" placeholder="Growing Area">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Standard</label>
                                <input type="text" name="standard" class="form-control" placeholder="Standard">
                            </div>
                            <div class="form-group">
                                <label for="inputZip">Image</label>
                                <input type="file" accept="image/*" name="image[]" multiple>
                            </div>
                            <button type="submit" class="btn btn-primary">Thêm</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
