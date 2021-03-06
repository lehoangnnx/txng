@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Product</div>

                    <div class="card-body">
                        <div class="mt-2">
                            <form action="{{ route('search') }}" method="GET">
                                <input style="width: 60%" name="key" value="{{ app('request')->input('key')  }}" type="text" id="myInput" placeholder="Tìm Kiếm Theo QR Code, Product Name, Create Date">
                                <a href="{{ route('admin')  }}" class="btn btn-info">Hủy</a>
                            </form>
                            <a href="{{ route('txng.create')  }}" class="btn btn-success mb-3 mt-4">Thêm</a>
                        </div>
                        <div class="row justify-content-center table-responsive">

                            <table class="table table-hover">
                                <thead>
                                <tr class="header">
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>QR Code</th>
                                    <th>Product Name</th>
                                    <th>MFG</th>
                                    <th>EXP</th>
                                    <th>Size</th>
                                    <th>Packing</th>
                                    <th>Storage Advice</th>
                                    <th>Packaging Factory</th>
                                    <th>Company Name</th>
                                    <th>Country</th>
                                    <th>Representative</th>
                                    <th>Company Address</th>
                                    <th>Cell Phone</th>
                                    <th>Email</th>
                                    <th>FB</th>
                                    <th>Farm Name</th>
                                    <th>Farm Address</th>
                                    <th>Growing Area</th>
                                    <th>Standard Applied</th>
                                    <th>Description Header</th>
                                    <th>Discription</th>
                                    <th>Date Create</th>
                                    <th>Thao Tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($txngs as $txng)
                                    <tr>
                                        <td>{{ $txng->id  }}</td>                                        
                                        <td><img width="100px" height="100px" class="img-thumbnail" src="{{ asset('uploads')}}/{{ $txng->image }}"></td>
                                        <td>{{ $txng->qr_code  }}</td>
                                        <td>{{ $txng->product_name  }}</td>
                                        <td>{{ $txng->mfg  }}</td>
                                        <td>{{ $txng->exp  }}</td>
                                        <td>{{ $txng->size  }}</td>
                                        <td>{{ $txng->packing  }}</td>
                                        <td>{{ $txng->storage_advice  }}</td>
                                        <td>{{ $txng->packaging_factory  }}</td>
                                        <td>{{ $txng->company_name  }}</td>
                                        <td>{{ $txng->country  }}</td>
                                        <td>{{ $txng->representative  }}</td>
                                        <td>{{ $txng->company_address  }}</td>
                                        <td>{{ $txng->cell_phone  }}</td>
                                        <td>{{ $txng->email  }}</td>
                                        <td>{{ $txng->fb  }}</td>
                                        <td>{{ $txng->farm_name  }}</td>
                                        <td>{{ $txng->farm_address  }}</td>
                                        <td>{{ $txng->growing_area  }}</td>
                                        <td>{{ $txng->standard_applied  }}</td>
                                        <td>{{ $txng->description_header  }}</td>
                                        <td>{{ $txng->discription  }}</td>
                                        <td>{{ $txng->created_at  }}</td>
                                        <td>
                                            <a href="{{ route('txng.edit', $txng->id )  }}" class="btn btn-info">Sửa</a>
                                            <form action="{{ route('txng.destroy', $txng->id )  }}" method="POST" onsubmit="return ConfirmDelete();">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" >Xóa</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 mt-5">
                <div class="card">
                    <div class="card-header">Certificate</div>

                    <div class="card-body">
                        <div class="mt-2">
                            <form action="{{ route('searchCertificate') }}" method="GET">
                                <input style="width: 60%" name="keyc" value="{{ app('request')->input('keyc')  }}" type="text" id="myInput" placeholder="Tìm Kiếm Theo Name">
                                <a href="{{ route('admin')  }}" class="btn btn-info">Hủy</a>
                            </form>
                            <a href="{{ route('certificate.create')  }}" class="btn btn-success mb-3 mt-4">Thêm</a>
                        </div>
                        <div class="row justify-content-center table-responsive">

                            <table class="table table-hover">
                                <thead>
                                <tr class="header">
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Thao Tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($certificate as $item)
                                    <tr>
                                        <td>{{ $item->id  }}</td>
                                        <td><img width="100px" height="100px" class="img-thumbnail" src="{{ asset('uploads')}}/{{ $item->image }}"></td>
                                        <td>{{ $item->name  }}</td>
                                        <td>
                                            <a href="{{ route('certificate.edit', $item->id )  }}" class="btn btn-info">Sửa</a>
                                            <form action="{{ route('certificate.destroy', $item->id )  }}" method="POST" onsubmit="return ConfirmDelete();">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" >Xóa</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
