@extends('admin.main')
@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h2>Sản phẩm</h2>
        <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addModal">+ Thêm sản phẩm</button>
    </div>
    <div id="alert-container" class="mt-2"></div>
    {{-- Modal thêm sản phẩm --}}
    @include('admin.products.partials.add-modal')
    <!-- Bộ lọc -->
    @include('admin.products.partials.filter')
    <!-- Hiển thị sản phẩm -->
    <div id="loading-spinner" style="display:none;">Đang tải sản phẩm...</div>
    <div class="row" id="product-list">
        @foreach ($products as $p)
        <div class="col-md-4 col-lg-3 mb-4 product-card btn-edit"
            data-id="{{ $p->id }}"
            data-category="{{$p->category->id}}"
            data-brand="{{$p->brand->id}}"
            data-productline="{{$p->productLine->id}}">
            <div class="card h-100 shadow-sm">
                    <img src="{{asset('storage/' . $p->image)}}" class="card-img-top" alt="">
                <div class="card-body p-2">
                    <h6 class="card-title text-truncate" title="{{$p->name}}">{{$p->name}}</h6>
                    <p class="card-text mb-1"><strong>{{number_format($p->price, 0, ',','.')}}<sup>đ</sup></strong></p>
                    <p class="text-muted small mb-1">{{$p->category->name}} - {{$p->brand->name}}</p>
                    <div class="d-flex justify-content-between">
                        <a href="#" class="btn btn-sm btn-dark btn-edit" data-id="{{ $p->id }}">Sửa</a>
                        <a href="" class="btn btn-sm btn-outline-secondary" onclick="remove('{{ route('products.destroy', $p->id) }}')">Xóa</a>
                    </div>
                </div>
            </div>
        </div>
        <!----------------------------------- Modal sửa sản phẩm ------------------------------------>
        @endforeach
        @include('admin.products.partials.edit-modal')
    </div>
    <script src="{{asset('admin/asset/js/ajax.js')}}"></script>
@endsection

