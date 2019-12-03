@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Thêm Product</div>
                    <div class="card-body">
                        <form action="{{ route('product.store')  }}" method="POST" enctype="multipart/form-data">
                            @method('POST')
                            @csrf
                            <div class="form-group">
                                <label for="inputAddress">Code</label>
                                <input type="text" name="code" class="form-control" placeholder="Code">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Name">
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
                                <label for="inputAddress">Description Header</label>
                                <input type="text" name="description_header" class="form-control"
                                       placeholder="Description Header">
                            </div>
                            <div class="form-group">
                                <label for="inputZip">Description</label>
                                <textarea class="form-control" name="description" rows="3"
                                          placeholder="Discription"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress"><strong>Planting Area</strong></label>
                                <select id="inputState" class="form-control" name="planting_area_id">
                                    @foreach($plantingareas as $item)
                                        <option value="{{ $item->id }}">{{ $item->id }} - {{ $item->farm_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputZip">Image</label>
                                <input type="file" accept="image/*" name="image[]" multiple>
                            </div>
                            <div class="form-group">
                                <label for="inputZip">Certificate Image</label>
                                <input type="file" accept="image/*" name="certificate_image[]" multiple>
                            </div>
                            <button type="submit" class="btn btn-primary">Thêm</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
