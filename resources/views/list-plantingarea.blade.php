@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Planting Area</div>

                    <div class="card-body">
                        <div class="mt-2">
                            <form action="{{ route('searchplantingarea') }}" method="GET">
                                <input style="width: 60%" name="key" value="{{ app('request')->input('key')  }}"
                                       type="text" id="myInput" placeholder="Tìm Kiếm Theo Farm Name">
                                <a href="{{ route('list.plantingarea')  }}" class="btn btn-info">Hủy</a>
                            </form>
                            <a href="{{ route('plantingarea.create')  }}" class="btn btn-success mb-3 mt-4">Thêm</a>
                        </div>
                        <div class="row justify-content-center table-responsive">

                            <table class="table table-hover">
                                <thead>
                                <tr class="header">
                                    <th>ID</th>
                                    <th>Farm Name</th>
                                    <th>Address</th>
                                    <th>Growing Area</th>
                                    <th>Standard</th>
                                    <th>Image</th>
                                    <th>Thao Tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($plantingareas as $item)
                                    <tr>
                                        <td>{{ $item->id  }}</td>
                                        <td>{{ $item->farm_name  }}</td>
                                        <td>{{ $item->address  }}</td>
                                        <td>{{ $item->growing_area  }}</td>
                                        <td>{{ $item->standard  }}</td>
                                        <td>
                                            @foreach($images as $image)
                                                @if( $item->id == $image->foreign_id )
                                                    <img width="100px" height="100px" class="img-thumbnail" onclick="showImg(this.src);"
                                                         src="{{ url('/public/uploads')}}/{{ $image->url }}">
                                                @endif
                                            @endforeach
                                        </td>

                                        <td>
                                            <a href="{{ route('plantingarea.edit', $item->id )  }}"
                                               class="btn btn-info">Sửa</a>
                                            <form action="{{ route('plantingarea.destroy', $item->id )  }}" method="POST"
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
