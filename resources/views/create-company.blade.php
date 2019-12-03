@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Thêm Company</div>
                    <div class="card-body">
                        <form action="{{ route('company.store')  }}" method="POST" enctype="multipart/form-data">
                            @method('POST')
                            @csrf
                            <div class="form-group">
                                <label for="inputAddress">Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label for="inputZip">Logo</label>
                                <input type="file" accept="image/png" name="logo">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Address</label>
                                <input type="text" name="address" class="form-control" placeholder="Address">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Location</label>
                                <input type="text" name="location" class="form-control" placeholder="Location">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Country</label>
                                <input type="text" name="country" class="form-control" placeholder="Country">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Representative</label>
                                <input type="text" name="representative" class="form-control" placeholder="Representative">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Cellphone</label>
                                <input type="text" name="cellphone" class="form-control" placeholder="Cellphone">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Email</label>
                                <input type="text" name="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Facebook</label>
                                <input type="text" name="facebook" class="form-control" placeholder="Facebook">
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
