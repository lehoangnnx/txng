@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Product</div>

                    <div class="card-body">
                        <div class="mt-2">
                            <form action="{{ route('searchproduct') }}" method="GET">
                                <input style="width: 60%" name="key" value="{{ app('request')->input('key')  }}"
                                       type="text" id="myInput" placeholder="Tìm Kiếm Theo Code, Name, Create Date">
                                <a href="{{ route('list.product')  }}" class="btn btn-info">Hủy</a>
                            </form>
                            <a href="{{ route('product.create')  }}" class="btn btn-success mb-3 mt-4">Thêm</a>
                        </div>
                        <div class="row justify-content-center table-responsive">

                            <table class="table table-hover">
                                <thead>
                                <tr class="header">
                                    <th>ID</th>
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>MFG</th>
                                    <th>EXP</th>
                                    <th>Size</th>
                                    <th>Packing</th>
                                    <th>Storage Advice</th>
                                    <th>Packaging Factory</th>
                                    <th>Planting Area</th>
                                    <th>Description Header</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Certificate Image</th>
                                    <th>Thao Tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $item)
                                    <tr>
                                        <td>{{ $item->id  }}</td>
                                        <td>{{ $item->code  }}</td>
                                        <td>{{ $item->name  }}</td>
                                        <td>{{ $item->mfg  }}</td>
                                        <td>{{ $item->exp  }}</td>
                                        <td>{{ $item->size  }}</td>
                                        <td>{{ $item->packing  }}</td>
                                        <td>{{ $item->storage_advice  }}</td>
                                        <td>{{ $item->packaging_factory  }}</td>
                                        <td>
                                            @foreach($plantingareas as $plantingarea)
                                                @if( $item->planting_area_id == $plantingarea->id )
                                                   {{ $plantingarea->id }} - {{ $plantingarea->farm_name }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>{{ $item->description_header  }}</td>
                                        <td>{{ $item->description  }}</td>
                                        <td>
                                            @foreach($images as $image)
                                                @if( $item->id == $image->foreign_id )
                                                    <img width="100px" height="100px" class="img-thumbnail"
                                                         src="{{ asset('uploads')}}/{{ $image->url }}">
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($image_certificates as $image_certificate)
                                                @if( $item->id == $image_certificate->foreign_id )
                                                    <img width="100px" height="100px" class="img-thumbnail"
                                                         src="{{ asset('uploads')}}/{{ $image_certificate->url }}">
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            <a href="{{ route('product.edit', $item->id )  }}"
                                               class="btn btn-info">Sửa</a>
                                            <form action="{{ route('product.destroy', $item->id )  }}" method="POST"
                                                  onsubmit="return ConfirmDelete();">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Xóa</button>
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
