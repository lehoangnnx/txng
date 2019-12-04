@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Sửa Product</div>

                    <div class="card-body">
                        <form action="{{ route('product.update', $product->id)  }}" method="POST"
                              enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="inputAddress">Code</label>
                                <input type="text" value="{{ $product->code  }}" name="code" class="form-control"
                                       placeholder="Code">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Name</label>
                                <input type="text" value="{{ $product->name  }}" name="name" class="form-control"
                                       placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">MFG</label>
                                <input type="date" value="{{ $product->mfg  }}" name="mfg" class="form-control"
                                       placeholder="MFG">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">EXP</label>
                                <input type="date" value="{{ $product->exp  }}" name="exp" class="form-control"
                                       placeholder="EXP">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Size</label>
                                <input type="text" value="{{ $product->size  }}" name="size" class="form-control"
                                       placeholder="Size">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Packing</label>
                                <input type="text" value="{{ $product->packing  }}" name="packing" class="form-control"
                                       placeholder="Packing">
                            </div>
                            <div class="form-group">
                                <label for="inputZip">Storage Advice</label>
                                <textarea class="form-control" name="storage_advice" rows="3"
                                          placeholder="Storage Advice">{{ $product->storage_advice  }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="inputZip">Packaging Factory</label>
                                <textarea  class="form-control" name="packaging_factory" rows="3"
                                           placeholder="Packaging Factory">{{ $product->packaging_factory  }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Description Header</label>
                                <input value="{{ $product->description_header  }}" type="text" name="description_header" class="form-control"
                                       placeholder="Description Header">
                            </div>
                            <div class="form-group">
                                <label for="inputZip">Description</label>
                                <textarea class="form-control" name="description" rows="3"
                                          placeholder="Discription">{{ $product->description  }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress"><strong>Planting Area</strong></label>
                                <select id="inputState" class="form-control" name="planting_area_id">
                                    <option value="0" selected>Không Có</option>
                                    @foreach($plantingareas as $item)
                                        @if( $item->id == $product->planting_area_id )
                                            <option value="{{ $item->id }}" selected>{{ $item->id }} - {{ $item->farm_name }}</option>
                                        @else
                                            <option value="{{ $item->id }}">{{ $item->id }} - {{ $item->farm_name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group d-flex">
                                @foreach($images as $image)
                                    @if( $product->id == $image->foreign_id )
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
                            <div class="form-group d-flex">
                                @foreach($image_certificates as $image_certificate)
                                    @if( $product->id == $image_certificate->foreign_id )
                                        <div class="thumbnail">
                                            <img width="100px" height="100px" class="img-thumbnail" onclick="showImg(this.src);"
                                                 src="{{ url('/public/uploads')}}/{{ $image_certificate->url }}"/>
                                            <a href="/delete/image/{{$image_certificate->id}}" class="close button_x" onclick="return ConfirmDelete();">X</a>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <div class="form-group">
                                <label for="inputZip">Certificate Image</label>
                                <input type="file" accept="image/*" name="certificate_image[]" multiple>
                            </div>
                            <button type="submit" class="btn btn-primary">Sửa</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
