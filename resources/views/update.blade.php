@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Sửa</div>

                    <div class="card-body">
                        <form action="{{ route('txng.update', $txng->id)  }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="inputAddress">QR Code</label>
                                <input type="text" value="{{ $txng->qr_code  }}" name="qr_code" class="form-control" placeholder="QR Code">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Product Name</label>
                                <input type="text" value="{{ $txng->product_name  }}" name="product_name" class="form-control" placeholder="Product Name">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">MFG</label>
                                <input type="date" value="{{ $txng->mfg  }}" name="mfg" class="form-control" placeholder="MFG">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">EXP</label>
                                <input type="date" value="{{ $txng->exp  }}" name="exp" class="form-control" placeholder="EXP">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Size</label>
                                <input type="text" value="{{ $txng->size  }}" name="size" class="form-control" placeholder="Size">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Packing</label>
                                <input type="text" value="{{ $txng->packing  }}" name="packing" class="form-control" placeholder="Packing">
                            </div>
                            <div class="form-group">
                                <label for="inputZip">Storage Advice</label>
                                <textarea class="form-control" name="storage_advice" rows="3"
                                          placeholder="Storage Advice">{{ $txng->storage_advice  }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="inputZip">Packaging Factory</label>
                                <textarea  class="form-control" name="packaging_factory" rows="3"
                                          placeholder="Packaging Factory">{{ $txng->packaging_factory  }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="inputAddress">Company Name</label>
                                <input  value="{{ $txng->company_name  }}" type="text" name="company_name" class="form-control" placeholder="Company Name">
                            </div>

                            <div class="form-group">
                                <label for="inputAddress">Country</label>
                                <input type="text" value="{{ $txng->country  }}" name="country" class="form-control" placeholder="Country">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Representative</label>
                                <input type="text" value="{{ $txng->representative  }}" name="representative" class="form-control"
                                       placeholder="Representative">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Company Address</label>
                                <input type="text" value="{{ $txng->company_address  }}" name="company_address" class="form-control"
                                       placeholder="Company Address">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Cell Phone</label>
                                <input type="text" value="{{ $txng->cell_phone  }}" name="cell_phone" class="form-control" placeholder="Cell Phone">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Email</label>
                                <input type="text" value="{{ $txng->email  }}" name="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">FB</label>
                                <input type="text"  value="{{ $txng->fb  }}" name="fb" class="form-control" placeholder="FB">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Farm Name</label>
                                <input type="text" value="{{ $txng->farm_name  }}" name="farm_name" class="form-control" placeholder="Farm Name">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Farm Address</label>
                                <input type="text" value="{{ $txng->farm_address  }}" name="farm_address" class="form-control" placeholder="Farm Address">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Growing Area</label>
                                <input type="text" value="{{ $txng->growing_area  }}" name="growing_area" class="form-control" placeholder="Growing Area">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Standard Applied</label>
                                <input type="text" value="{{ $txng->standard_applied  }}" name="standard_applied" class="form-control"
                                       placeholder="Standard Applied">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Description Header</label>
                                <input value="{{ $txng->description_header  }}" type="text" name="description_header" class="form-control"
                                       placeholder="Description Header">
                            </div>
                            <div class="form-group">
                                <label for="inputZip">Discription</label>
                                <textarea class="form-control" name="discription" rows="3"
                                          placeholder="Discription">{{ $txng->discription  }}</textarea>
                            </div>
                            <div class="form-group">
                                <img width="100px" height="100px" class="img-thumbnail" src="{{ asset('uploads')}}/{{ $txng->image }}">
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
