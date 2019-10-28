@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Thêm</div>
                    <div class="card-body">
                        <form action="{{ route('txng.store')  }}" method="POST" enctype="multipart/form-data">
                            @method('POST')
                            @csrf
                            <div class="form-group">
                                <label for="inputAddress">QR Code</label>
                                <input type="text" name="qr_code" class="form-control" placeholder="QR Code">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Product Name</label>
                                <input type="text" name="product_name" class="form-control" placeholder="Product Name">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">MFG</label>
                                <input type="date" name="mfg" class="form-control" placeholder="MFG">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">EXP</label>
                                <input type="date" name="exp" class="form-control" placeholder="EXP">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Size</label>
                                <input type="text" name="size" class="form-control" placeholder="Size">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Packing</label>
                                <input type="text" name="packing" class="form-control" placeholder="Packing">
                            </div>
                            <div class="form-group">
                                <label for="inputZip">Storage Advice</label>
                                <textarea class="form-control" name="storage_advice" rows="3"
                                          placeholder="Storage Advice"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="inputZip">Packaging Factory</label>
                                <textarea class="form-control" name="packaging_factory" rows="3"
                                          placeholder="Packaging Factory"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="inputAddress">Company Name</label>
                                <input type="text" name="company_name" class="form-control" placeholder="Company Name">
                            </div>

                            <div class="form-group">
                                <label for="inputAddress">Country</label>
                                <input type="text" name="country" class="form-control" placeholder="Country">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Representative</label>
                                <input type="text" name="representative" class="form-control"
                                       placeholder="Representative">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Company Address</label>
                                <input type="text" name="company_address" class="form-control"
                                       placeholder="Company Address">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Cell Phone</label>
                                <input type="text" name="cell_phone" class="form-control" placeholder="Cell Phone">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Email</label>
                                <input type="text" name="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">FB</label>
                                <input type="text" name="fb" class="form-control" placeholder="FB">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Farm Name</label>
                                <input type="text" name="farm_name" class="form-control" placeholder="Farm Name">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Farm Address</label>
                                <input type="text" name="farm_address" class="form-control" placeholder="Farm Address">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Growing Area</label>
                                <input type="text" name="growing_area" class="form-control" placeholder="Growing Area">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Standard Applied</label>
                                <input type="text" name="standard_applied" class="form-control"
                                       placeholder="Standard Applied">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Description Header</label>
                                <input type="text" name="description_header" class="form-control"
                                       placeholder="Description Header">
                            </div>
                            <div class="form-group">
                                <label for="inputZip">Discription</label>
                                <textarea class="form-control" name="discription" rows="3"
                                          placeholder="Discription"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="inputZip">Image</label>
                                <input type="file" accept="image/*" name="image">
                            </div>
                            <button type="submit" class="btn btn-primary">Thêm</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
