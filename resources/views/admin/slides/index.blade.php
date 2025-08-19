@extends('admin.main')

@section('content')
<div class="admin-header d-flex justify-content-between align-items-center">
    <h2>Quản lý Slide</h2>
    <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#slideModal">
    + Thêm Slide
    </button>
    @include('admin.slides.partials.add-modal')
</div>

@if(session('success'))
    <div class="alert alert-success mt-3">{{ session('success') }}</div>
@endif

<div class="row mt-4">
    @foreach($slides as $s)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset('storage/'.$s->image) }}" class="card-img-top" alt="{{ $s->title }}" style="height:200px;object-fit:cover;">
                <div class="card-body">
                    <h5 class="card-title">{{ $s->title }}</h5>
                    @if($s->link)
                        <p class="card-text">
                            <a href="{{ $s->link }}" target="_blank">{{ $s->link }}</a>
                        </p>
                    @endif
                    <span class="badge {{ $s->status ? 'bg-success' : 'bg-secondary' }}">
                        {{ $s->status ? 'Hiển thị' : 'Ẩn' }}
                    </span>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <button type="button" class="btn btn-sm btn-dark" data-bs-toggle="modal" data-bs-target="#editSlideModal-{{ $s->id }}">
                        Sửa
                    </button>
                    @include('admin.slides.partials.edit-modal', ['s' => $s])
                    <a href="" onclick="remove('{{route('slides.destroy', $s->id)}}')" class="btn btn-sm btn-secondary">Xoá</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
<script src="{{asset('admin/asset/js/ajax.js')}}"></script>
@endsection
