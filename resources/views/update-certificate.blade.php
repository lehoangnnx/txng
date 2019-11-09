@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Sửa</div>
                    <div class="card-body">
                        <form action="{{ route('certificate.update', $certificate->id)  }}" method="POST" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            <div class="form-group">
                                <label for="inputAddress">Name</label>
                                <input type="text" value="{{ $certificate->name  }}" name="name" class="form-control" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <img width="100px" height="100px" class="img-thumbnail" src="{{ asset('uploads')}}/{{ $certificate->image }}">
                            </div>
                            <div class="form-group">
                                <label for="inputZip">Image</label>
                                <input type="file" accept="image/*" name="image">
                            </div>
                            <button type="submit" class="btn btn-primary">Sửa</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
