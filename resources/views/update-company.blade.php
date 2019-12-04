@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Sửa Company</div>
                    <div class="card-body">
                        <form action="{{ route('company.update',  $company->id)  }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="inputAddress">Name</label>
                                <input type="text" value="{{ $company->name  }}" name="name" class="form-control" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <img width="100px" height="100px" class="img-thumbnail" onclick="showImg(this.src);" src="{{ url('/public/uploads')}}/{{ $company->logo }}">
                            </div>
                            <div class="form-group">
                                <label for="inputZip">Logo</label>
                                <input type="file" accept="image/png" name="logo">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Address</label>
                                <input type="text"  value="{{ $company->address  }}" name="address" class="form-control" placeholder="Address">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Location</label>
                                <input type="text"  value="{{ $company->location  }}" name="location" class="form-control" placeholder="Location">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Country</label>
                                <input type="text"  value="{{ $company->country  }}" name="country" class="form-control" placeholder="Country">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Representative</label>
                                <input type="text"  value="{{ $company->representative  }}"  name="representative" class="form-control" placeholder="Representative">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Cellphone</label>
                                <input type="text"  value="{{ $company->cellphone  }}" name="cellphone" class="form-control" placeholder="Cellphone">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Email</label>
                                <input type="text"  value="{{ $company->email  }}" name="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Facebook</label>
                                <input type="text"  value="{{ $company->facebook  }}" name="facebook" class="form-control" placeholder="Facebook">
                            </div>
                            <div class="form-group d-flex">
                                @foreach($images as $image)
                                    @if( $company->id == $image->foreign_id )
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
