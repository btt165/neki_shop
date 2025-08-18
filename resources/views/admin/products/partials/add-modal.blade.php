    <!-- Modal thêm sản phẩm -->
    <div  class="modal fade" id="addModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <form action="{{ route('products.store') }}" method="POST" id="add-product-form" enctype="multipart/form-data">
                <input type="hidden" name="action" value="add">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Thêm sản phẩm</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body row g-3">
                        
                        <div class="col-md-6">
                            <label class="form-label">Tên sản phẩm</label>
                            <input type="text" name="name" class="form-control" value="{{old('name')}}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Màu sắc</label>
                            <select name="color_id" class="form-select" required>
                                <option value="{{old('color_id')}}" >-- Chọn màu sắc --</option>
                                @foreach($colors as $cl)
                                    <option value="{{ $cl->id }}">{{ $cl->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Giá</label>
                            <input type="number" name="price" class="form-control" value="{{old('price')}}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Danh mục</label>
                            <select name="category_id" class="form-select category-select" required>
                                <option value="{{old('category_id')}}">-- Chọn danh mục --</option>
                                @foreach($categories as $c)
                                    <option value="{{ $c->id }}"> {{ $c->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Mã sản phẩm</label>
                            <input type="text" name="product_code" class="form-control" value="{{old('product_code')}}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Thương hiệu</label>
                                <select name="brand_id" class="form-select brand-select" required>
                                    <option value="{{old('brand_id')}}">-- Chọn thương hiệu --</option>
                                </select>
                        </div>
                        <div class="col-md-6">
                            <div class="image-wrapper">
                                <label class="form-label">Ảnh chính</label>
                                <input type="file" name="image" class="form-control file " required>
                                <input type="hidden" name="image_path" class="input-file-hidden">
                                <div class="mt-2 input-file" >
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Dòng sản phẩm</label>
                            <select name="productLine_id" class="form-select productline-select" required>
                                <option value="{{old('productLine_id')}}">-- Chọn dòng sản phẩm --</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                                <label class="form-label">Ảnh phụ</label>
                                <input type="file" name="thumb_images[]" class="form-control thumb_images" multiple>
                                <div class="d-flex flex-wrap mt-2 input-files">
                                </div>
                        </div>
                        
                        <div class="col-md-12">
                            <label class="form-label">Chọn size và số lượng</label><br>
                            <div class="row">
                                    @foreach($sizes as $size)
                                    <div class="col-md-4 mb-2">
                                        <div class="border p-2 rounded">
                                            <label>
                                                <input type="checkbox" name="sizes[{{$size->id}}][selected]" value="1" > 
                                                Size: {{$size->name}}
                                            </label>
                                            <input type="number" name="sizes[{{$size->id}}][quantity]" class="form-control form-control-sm-mt-1" placeholder="Số lượng" min="0" >
                                        </div>
                                    </div>
                                    @endforeach
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Mô tả</label>
                            <textarea name="des" rows="3" class="form-control" >{{old('des')}}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-dark">Thêm</button>
                    </div>
                </div>
                @csrf
            </form>
        </div>
    </div>