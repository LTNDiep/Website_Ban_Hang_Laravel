@extends('admin.main')

@section('content')

<section class="content">
    <div class="container-fluid">
        <h5 class="mb-2"></h5>

        <div class="row">
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="far ion-bag"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Tổng số sản phẩm đã bán</span>
                        <span class="info-box-number">{{ $totalQuantitySold }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-success"><i class="far fa-flag"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Tổng sản phẩm còn lại</span>
                        <span class="info-box-number">{{$totalQuantityProduct}}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-warning"><i class="far fa-copy"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Tổng doanh thu</span>
                        <span class="info-box-number">{{ $totalRevenue }}</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="row">
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-danger"><i class="far fa-star"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Likes</span>
                        <span class="info-box-number">93,139</span>
                    </div>
                </div>
            </div>
        </div> --}}

    </div>
</section>
@endsection
