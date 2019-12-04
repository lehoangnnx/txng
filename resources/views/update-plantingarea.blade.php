@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Sửa Planting Area</div>
                    <div class="card-body">
                        <form action="{{ route('plantingarea.update',  $plantingarea->id)  }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="inputAddress">Farm Name</label>
                                <input type="text" value="{{ $plantingarea->farm_name  }}" name="farm_name" class="form-control" placeholder="Farm Name">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Address</label>
                                <input type="text"  value="{{ $plantingarea->address  }}" name="address" class="form-control" placeholder="Address">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Growing Area</label>
                                <input type="text"  value="{{ $plantingarea->growing_area  }}" name="growing_area" class="form-control" placeholder="Growing Area">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Standard</label>
                                <input type="text"  value="{{ $plantingarea->standard  }}" name="standard" class="form-control" placeholder="Standard">
                            </div>
                            <div class="form-group d-flex">
                                @foreach($images as $image)
                                    @if( $plantingarea->id == $image->foreign_id )
                                        <div class="thumbnail">
                                            <img width="100px" height="100px" class="img-thumbnail" onclick="showImg(this.src);"
                                                 src="{{ url('/public/uploads')}}/{{ $image->url }}"/>
                                            <a href="/delete/image/{{$image->id}}" class="close button_x" onclick="return ConfirmDelete();">X</a>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <div class="form-group">
                                <label for="inputZip">Image</label>
                                <input type="file" accept="image/*" name="image[]" multiple>
                            </div>
                            <button type="submit" class="btn btn-primary">Sửa</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
