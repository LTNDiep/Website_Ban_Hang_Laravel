@extends('main')

@section('content')
    </form>
        <!-- Content Header (Page header) -->
        <section class="content-header" style="margin-top: 50px">
            <div class="container-fluid">
                <div class="row mb-2">

                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Thông tin tài khoản</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>


        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">

                                <div class="text-center">
                                    <img  src="{{ $user->thumb }} " alt="User profile picture"  class="profile-user-img img-fluid img-circle">
                                </div>
                                <h3 class="profile-username text-center cl1">{{ $user->name }}</h3>
                                <p class="text-muted text-center">{{ $user->email }}</p>


                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b style="margin-left: 10px">Đơn hàng</b> <a class="float-right" style="margin-right: 15px">{{$quantity_user_order}}</a>
                                    </li>

                                    <li class="list-group-item">
                                        <b style="margin-left: 10px">Đánh giá sản phẩm</b> <a class="float-right" style="margin-right: 15px"> {{$quantity_user_rw}}</a>
                                    </li>

                                </ul>
                                {{-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> --}}
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Cập nhật thông tin </a></li>
                                    <li class="nav-item"><a class="nav-link" href="#password" data-toggle="tab">Đổi mật khẩu </a></li>
                                    <li class="nav-item"><a class="nav-link " href="#order" data-toggle="tab">Đơn hàng</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#review" data-toggle="tab">Đánh giá</a></li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    {{-- <div class="tab-pane" id="activity">
                                        <!-- Post -->
                                        <div class="post">
                                            <div class="user-block">
                                                <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                                                <span class="username">
                                                <a href="#">Jonathan Burke Jr.</a>
                                                <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                                                </span>
                                                <span class="description">Shared publicly - 7:30 PM today</span>
                                            </div>
                                            <!-- /.user-block -->
                                            <p>
                                                Lorem ipsum represents a long-held tradition for designers,
                                                typographers and the like. Some people hate it and argue for
                                                its demise, but others ignore the hate as they create awesome
                                                tools to help create filler text for everyone from bacon lovers
                                                to Charlie Sheen fans.
                                            </p>

                                            <p>
                                                <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                                                <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                                                <span class="float-right">
                                                <a href="#" class="link-black text-sm">
                                                    <i class="far fa-comments mr-1"></i> Comments (5)
                                                </a>
                                                </span>
                                            </p>

                                            <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                                        </div>
                                        <!-- /.post -->

                                        <!-- Post -->
                                        <div class="post clearfix">
                                            <div class="user-block">
                                                <img class="img-circle img-bordered-sm" src="../../dist/img/user7-128x128.jpg" alt="User Image">
                                                <span class="username">
                                                <a href="#">Sarah Ross</a>
                                                <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                                                </span>
                                                <span class="description">Sent you a message - 3 days ago</span>
                                            </div>
                                        <!-- /.user-block -->
                                            <p>
                                                Lorem ipsum represents a long-held tradition for designers,
                                                typographers and the like. Some people hate it and argue for
                                                its demise, but others ignore the hate as they create awesome
                                                tools to help create filler text for everyone from bacon lovers
                                                to Charlie Sheen fans.
                                            </p>

                                            <form class="form-horizontal">
                                                <div class="input-group input-group-sm mb-0">
                                                <input class="form-control form-control-sm" placeholder="Response">
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-danger">Send</button>
                                                </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- /.post -->

                                        <!-- Post -->
                                        <div class="post">
                                            <div class="user-block">
                                                <img class="img-circle img-bordered-sm" src="../../dist/img/user6-128x128.jpg" alt="User Image">
                                                <span class="username">
                                                <a href="#">Adam Jones</a>
                                                <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                                                </span>
                                                <span class="description">Posted 5 photos - 5 days ago</span>
                                            </div>
                                            <!-- /.user-block -->
                                            <div class="row mb-3">
                                                <div class="col-sm-6">
                                                <img class="img-fluid" src="../../dist/img/photo1.png" alt="Photo">
                                                </div>
                                                <!-- /.col -->
                                                <div class="col-sm-6">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                    <img class="img-fluid mb-3" src="../../dist/img/photo2.png" alt="Photo">
                                                    <img class="img-fluid" src="../../dist/img/photo3.jpg" alt="Photo">
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col-sm-6">
                                                    <img class="img-fluid mb-3" src="../../dist/img/photo4.jpg" alt="Photo">
                                                    <img class="img-fluid" src="../../dist/img/photo1.png" alt="Photo">
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.row -->
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.row -->

                                            <p>
                                                <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                                                <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                                                <span class="float-right">
                                                <a href="#" class="link-black text-sm">
                                                    <i class="far fa-comments mr-1"></i> Comments (5)
                                                </a>
                                                </span>
                                            </p>

                                            <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                                        </div>
                                        <!-- /.post -->
                                    </div> --}}
                                    <!-- /.tab-pane -->


                                    {{-- <div class="tab-pane" id="timeline">
                                        <!-- The timeline -->
                                        <div class="timeline timeline-inverse">
                                        <!-- timeline time label -->
                                        <div class="time-label">
                                            <span class="bg-danger">
                                            10 Feb. 2014
                                            </span>
                                        </div>
                                        <!-- /.timeline-label -->
                                        <!-- timeline item -->
                                        <div>
                                            <i class="fas fa-envelope bg-primary"></i>

                                            <div class="timeline-item">
                                            <span class="time"><i class="far fa-clock"></i> 12:05</span>

                                            <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                                            <div class="timeline-body">
                                                Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                                weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                                jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                                quora plaxo ideeli hulu weebly balihoo...
                                            </div>
                                            <div class="timeline-footer">
                                                <a href="#" class="btn btn-primary btn-sm">Read more</a>
                                                <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                            </div>
                                            </div>
                                        </div>
                                        <!-- END timeline item -->
                                        <!-- timeline item -->
                                        <div>
                                            <i class="fas fa-user bg-info"></i>

                                            <div class="timeline-item">
                                            <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                                            <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                                            </h3>
                                            </div>
                                        </div>
                                        <!-- END timeline item -->
                                        <!-- timeline item -->
                                        <div>
                                            <i class="fas fa-comments bg-warning"></i>

                                            <div class="timeline-item">
                                            <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                                            <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                                            <div class="timeline-body">
                                                Take me to your leader!
                                                Switzerland is small and neutral!
                                                We are more like Germany, ambitious and misunderstood!
                                            </div>
                                            <div class="timeline-footer">
                                                <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                                            </div>
                                            </div>
                                        </div>
                                        <!-- END timeline item -->
                                        <!-- timeline time label -->
                                        <div class="time-label">
                                            <span class="bg-success">
                                            3 Jan. 2014
                                            </span>
                                        </div>
                                        <!-- /.timeline-label -->
                                        <!-- timeline item -->
                                        <div>
                                            <i class="fas fa-camera bg-purple"></i>

                                            <div class="timeline-item">
                                            <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                                            <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                                            <div class="timeline-body">
                                                <img src="https://placehold.it/150x100" alt="...">
                                                <img src="https://placehold.it/150x100" alt="...">
                                                <img src="https://placehold.it/150x100" alt="...">
                                                <img src="https://placehold.it/150x100" alt="...">
                                            </div>
                                            </div>
                                        </div>
                                        <!-- END timeline item -->
                                        <div>
                                            <i class="far fa-clock bg-gray"></i>
                                        </div>
                                        </div>
                                    </div> --}}
                                    <!-- /.tab-pane -->

                                    <div class="active tab-pane" id="settings">
                                        {{-- <form class="form-horizontal" action="" method="POST" > --}}
                                        <form class="form-horizontal" action="{{ route('Auth.update', $user->id) }}" method="POST">
                                            @csrf
                                            @include('admin.alert')
                                            <div class="form-group row">
                                                <label for="" class="col-sm-2 col-form-label">Tên</label>
                                                <div class="col-sm-10">
                                                    <input id="name" type="text" name="name" class="form-control" placeholder="Nhập tên" value="{{ old('name', $user->name) }}" required autofocus>
                                                    @error('name')
                                                        <p>{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="" class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input id="email" type="email" name="email" class="form-control" placeholder="Nhập email" value="{{ old('email', $user->email) }}" required>
                                                    @error('email')
                                                        <p>{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="" class="col-sm-2 col-form-label">Số điện thoại</label>
                                                <div class="col-sm-10">
                                                    <input id="phone" type="text" name="phone" class="form-control" placeholder="Nhập số điện thoại" value="{{ old('phone', $user->phone) }}" required>
                                                    @error('phone')
                                                        <p>{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="" class="col-sm-2 col-form-label">Địa chỉ</label>
                                                <div class="col-sm-10">
                                                    <input id="address" type="text" name="address" class="form-control" placeholder="Nhập địa chỉ" value="{{ old('address', $user->address) }}" required>
                                                    @error('address')
                                                        <p>{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="" class="col-sm-2 col-form-label">Ảnh đại diện</label>
                                                <div  class="col-sm-10">
                                                    <input type="file"  class="form-control " id="upload">
                                                    <div id="image_show" >
                                                        <a href="{{ $user->thumb }}" target="_blank">
                                                            <img src="{{ $user->thumb }}" width="100px">
                                                        </a>
                                                    </div>
                                                    <input type="hidden"  name="thumb" value="{{ $user->thumb }}" id="thumb">
                                                </div>

                                            </div>

                                            <div class="form-group row" style="margin-top: 30px">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <button type="submit" class="btn bg-maroon">Lưu thông tin</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.tab-pane -->

                                    <div class="tab-pane" id="password">
                                        {{-- <form class="form-horizontal" action="" method="POST" > --}}
                                        <form class="form-horizontal" action="{{ route('Auth.update', $user->id) }}" method="POST">
                                            @include('admin.alert')
                                            @csrf
                                            <div class="form-group row">
                                                <label for="" class="col-sm-2 col-form-label">Mật khẩu mới</label>
                                                <div class="col-sm-10">
                                                    <input id="password" type="password" name="password" class="form-control"  placeholder="Nhập mật khẩu" required autocomplete="new-password">
                                                    @error('name')
                                                        <p>{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="" class="col-sm-2 col-form-label">Nhập lại mật khẩu</label>
                                                <div class="col-sm-10">
                                                    <input id="password_confirmation" type="password" name="password_confirmation" class="form-control"  placeholder="Nhập lại mật khẩu" required>
                                                    @error('name')
                                                        <p>{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <button type="submit" class="btn bg-maroon">Lưu mật khẩu</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.tab-pane -->

                                    <div class="tab-pane" id="order">
                                        <!-- The timeline -->
                                        <div class="timeline timeline-inverse">
                                            @foreach ($customers as $customer)
                                                <!-- timeline time label -->
                                                <div class="time-label">
                                                    <span class="bg-pink">
                                                        {{$customer->created_at->format('d-m-Y')}}
                                                    </span>
                                                </div>
                                                <!-- /.timeline-label -->
                                                <!-- timeline item -->
                                                <div>
                                                    <div class="timeline-item">
                                                        <span class="time"><i class="far fa-clock"></i> {{$customer->updated_at}}</span>

                                                        <h3 class="timeline-header"><a class="cl1" >Trạng thái đơn hàng: </a> {{  $customer->status }}</h3>

                                                        <div class="timeline-body">
                                                            {{ $customer->name }}
                                                            {{ $customer->phone }}
                                                            {{ $customer->address }}
                                                        </div>
                                                        <div class="timeline-footer">
                                                            <a href="customers/view/{{ $customer->id }}" class="btn btn-primary btn-sm">Chi tiết</a>
                                                            {{-- <a href="#" class="btn btn-danger btn-sm">Đã nhận hàng</a> --}}
                                                            @if ($customer->status == 'Đã giao hàng thành công')
                                                                <form action="{{ route('customers.updateStatus', $customer->id) }}" method="POST" style="display: inline;">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <button type="submit" class="btn btn-danger btn-sm">Đã nhận hàng</button>
                                                                </form>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                                <div>
                                                    <i class="far fa-clock bg-gray"></i>
                                                </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="review">
                                        @foreach ($reviews as $review)

                                            <div class="post">
                                                <div class="user-block">
                                                    <img class="img-circle img-bordered-sm" src="{{ $user->thumb }}" alt="user image">
                                                    <span class="username">
                                                    <a href="/Auth/list">{{ $user->name }}</a>

                                                    </span>
                                                    <span class="description">{{$review->created_at}}</span>
                                                </div>


                                                <div style="display: inline-block; vertical-align: top;">
                                                    <a href="#" target="_blank">
                                                        <img src="{{  $review->product->thumb }}" height="50px">
                                                    </a>
                                                </div>
                                                <div style="display: inline-block; vertical-align: top;">
                                                    @for ($i = 0; $i < 5; $i++)
                                                        @if ($i < $review->rating)
                                                            <i class="zmdi zmdi-star cl11" ></i>
                                                        @else
                                                            <i class="zmdi zmdi-star-outline cl11"></i>
                                                        @endif
                                                    @endfor

                                                    <p>{{ $review->comment }}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><
        </section>
    </form>
@endsection
