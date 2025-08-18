 
@include('admin.layouts.header')
<body>
  <div class="container-fluid">
    <div class="row">
        @include('admin.layouts.sidebar')
      <div class="col-md-10 p-4">
        <div class="admin-header d-flex justify-content-between align-items-center p-3 border-bottom">
          <h3>Bảng điều khiển</h3>
          <form action="{{ route('logout') }}" method="POST">
              @csrf
              <button type="submit" class=" btn btn-dark ">Đăng xuất</button>
          </form>
        </div>
        <div class="row mt-4 px-3">
          <div class="col-md-4">
            <div class="card text-white bg-dark mb-3">
              <a href="/dashboard/product"><div class="card-body">
                <h5 class="card-title">Sản phẩm</h5>
                <p class="card-text fs-4">{{ $productCount }} sản phẩm</p>
              </div>
              </a>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card text-white bg-dark mb-3">
              <a href="/dashboard/category">
                <div class="card-body">
                  <h5 class="card-title">Danh mục</h5>
                  <p class="card-text fs-4">{{ $categoryCount }} danh mục</p>
                </div>
              </a>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card text-white bg-dark mb-3">
              <a href="/dashboard/order">
                <div class="card-body">
                  <h5 class="card-title">Đơn hàng</h5>
                  <p class="card-text fs-4">{{ $orderCount }} đơn</p>
                </div>
              </a>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card text-white bg-dark mb-3">
              <a href="/dashboard/users">

                <div class="card-body">
                  <h5 class="card-title">Người dùng</h5>
                  <p class="card-text fs-4">{{ $userCount }} người dùng</p>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
