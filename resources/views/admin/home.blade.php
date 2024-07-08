@extends('admin.main')

@section('content')

<body class="hold-transition sidebar-mini">
        <!-- Main content -->
        <section class="content" >
            <div class="container-fluid" >
                <!-- Small Box (Stat card) -->
                <h5 class="mb-2 mt-4"></h5>

                <div class="row" > <!--style="display: flex; justify-content: center; "-->

                    <!-- 1.Tai khoan/col -->
                    <div class="col-lg-3 col-6">
                        <!-- small card -->
                        <div class="small-box bg-info">
                            <div class="inner">
                            <h3>{{ $account_quantity }}</h3>

                            <p>Tài khoản</p>
                            </div>
                            <div class="icon">
                            <i class="fas fa-user-plus"></i>
                            </div>
                            <a href="/admin/accounts/list" class="small-box-footer">
                            Xem thông tin <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>

                    <!-- 2.Danh muc/col -->
                    <div class="col-lg-3 col-6">
                        <!-- small card -->
                        <div class="small-box bg-teal">
                        <div class="inner">
                            <h3>{{ $menu_quantity }}</h3>

                            <p>Danh mục</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-bars"></i>
                        </div>
                        <a href="/admin/menus/list" class="small-box-footer">
                            Xem Thông tin <i class="fas fa-arrow-circle-right"></i>
                        </a>
                        </div>
                    </div>

                    <!-- 3.San pham/col -->
                    <div class="col-lg-3 col-6">
                        <!-- small card -->
                        <div class="small-box  bg-gray">
                        <div class="inner">
                            <h3>{{ $product_quantity }}</h3>

                            <p>Sản phẩm</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-store-alt"></i>
                        </div>
                        <a href="/admin/products/list" class="small-box-footer">
                            Xem Thông tin <i class="fas fa-arrow-circle-right"></i>
                        </a>
                        </div>
                    </div>

                    <!-- 4.Slider/col -->
                    <div class="col-lg-3 col-6">
                        <!-- small card -->
                        <div class="small-box bg-pink">
                            <div class="inner">
                            <h3>{{ $slider_quantity }}</h3>

                            <p>Slider</p>
                            </div>
                            <div class="icon">
                            <i class="fas fa-images"></i>
                            </div>
                            <a href="/admin/sliders/list" class="small-box-footer">
                                Xem Thông tin <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>

                    <!-- 5.Bai viet/col -->
                    <div class="col-lg-3 col-6">
                        <!-- small card -->
                        <div class="small-box bg-lightblue">
                        <div class="inner">
                            <h3>{{ $article_quantity }}</h3>

                            <p>Bài viết</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-bookmark"></i>
                        </div>
                        <a href="/admin/articles/list" class="small-box-footer">
                            Xem Thông tin <i class="fas fa-arrow-circle-right"></i>
                        </a>
                        </div>
                    </div>

                    <!-- 6.Danh gia/col -->
                    <div class="col-lg-3 col-6">
                        <!-- small card -->
                        <div class="small-box bg-success">
                            <div class="inner">
                            <h3>{{ $review_quantity }}</h3>

                            <p>Đánh giá</p>
                            </div>
                            <div class="icon">
                            <i class="fas fa-star"></i>
                            </div>
                            <a href="/admin/reviews/list" class="small-box-footer">
                            Xem Thông tin <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>

                    <!-- 7.Don hang/col -->
                    <div class="col-lg-3 col-6">
                        <!-- small card -->
                        <div class="small-box bg-secondary">
                            <div class="inner">
                            <h3>{{ $order_quantity }}</h3>

                            <p>Đơn hàng</p>
                            </div>
                            <div class="icon">
                            <i class="fas fa-shopping-cart"></i>
                            </div>
                            <a href="/admin/customers" class="small-box-footer">
                                Xem Thông tin <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>

                    <!-- 8.Thong ke/col -->
                    <div class="col-lg-3 col-6">
                        <!-- small card -->
                        <div class="small-box bg-maroon">
                        <div class="inner">
                            <h3>++</h3>

                            <p>Thống kê</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-th"></i>
                        </div>
                        <a href="/admin/statistics/list" class="small-box-footer">
                            Xem Thông tin <i class="fas fa-arrow-circle-right"></i>
                        </a>
                        </div>
                    </div>

                </div>
                <h5 class="mb-2 mt-4"></h5>
            </div>
        </section>
</body>

@endsection

