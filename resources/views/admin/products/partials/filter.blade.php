<div class="row mt-4 mb-3 g-3 align-items-end">
    <div class="col-md-4">
        <label class="form-label">Danh mục</label>
        <select id="filter-category" class="form-select">
            <option value="">-- Tất cả danh mục --</option>
            @foreach($categories as $c)
                <option value="{{$c->id}}">{{$c->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4">
        <label class="form-label">Thương hiệu</label>
        <select id="filter-brand" class="form-select">
            <option value="">-- Tất cả thương hiệu --</option>
        </select>
    </div>
    <div class="col-md-4">
        <label class="form-label">Dòng sản phẩm</label>
        <select id="filter-productLine" class="form-select">
            <option value="">-- Tất cả dòng sản phẩm --</option>
        </select>
    </div>
</div>