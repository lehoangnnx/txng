@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Company</div>

                    <div class="card-body">
                        <div class="mt-2">
                            <form action="{{ route('searchcompany') }}" method="GET">
                                <input style="width: 60%" name="key" value="{{ app('request')->input('key')  }}"
                                       type="text" id="myInput" placeholder="Tìm Kiếm Theo Name">
                                <a href="{{ route('list.company')  }}" class="btn btn-info">Hủy</a>
                            </form>
{{--                            <a href="{{ route('company.create')  }}" class="btn btn-success mb-3 mt-4">Thêm</a>--}}
                        </div>
                        <div class="row justify-content-center table-responsive">

                            <table class="table table-hover">
                                <thead>
                                <tr class="header">
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Logo</th>
                                    <th>Address</th>
                                    <th>Location</th>
                                    <th>Country</th>
                                    <th>Representative</th>
                                    <th>Cellphone</th>
                                    <th>Email</th>
                                    <th>Facebook</th>
                                    <th>Image</th>
                                    <th>Thao Tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($company as $item)
                                    <tr>
                                        <td>{{ $item->id  }}</td>
                                        <td>{{ $item->name  }}</td>
                                        <td> <img width="100px" height="100px" class="img-thumbnail"
                                                  src="{{ asset('uploads')}}/{{ $item->logo }}"></td>
                                        <td>{{ $item->address  }}</td>
                                        <td>{{ $item->location  }}</td>
                                        <td>{{ $item->country  }}</td>
                                        <td>{{ $item->representative  }}</td>
                                        <td>{{ $item->cellphone  }}</td>
                                        <td>{{ $item->email  }}</td>
                                        <td>{{ $item->facebook  }}</td>
                                        <td>
                                            @foreach($images as $image)
                                                @if( $item->id == $image->foreign_id )
                                                    <img width="100px" height="100px" class="img-thumbnail"
                                                         src="{{ asset('uploads')}}/{{ $image->url }}">
                                                @endif
                                            @endforeach
                                        </td>

                                        <td>
                                            <a href="{{ route('company.edit', $item->id )  }}"
                                               class="btn btn-info">Sửa</a>
{{--                                            <form action="{{ route('company.destroy', $item->id )  }}" method="POST"--}}
{{--                                                  onsubmit="return ConfirmDelete();">--}}
{{--                                                @csrf--}}
{{--                                                @method('DELETE')--}}
{{--                                                <button type="submit" class="btn btn-danger">Xóa</button>--}}
{{--                                            </form>--}}
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
