@extends('layout.recruiter.main')
@section('recruiter_content')

<!-- widget recuitment  -->
<div class="container-fluid">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="ads-above">
         <!-- Thông báo ở đây-->
        </div>
      </div>
    </div>
  </div>
</div>
<!-- (end) widget recuitment  -->

<!-- published recuitment -->
<div class="published-recuitment-wrapper1">
  <div class="container published-recuitment-content">
    <div class="row" style="width: 1340px;">
      <div class="col-md-3 col-sm-12 col-12">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link ver-list active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">ĐĂNG TUYỂN</a>
          </li>
          <li class="nav-item">
            <a class="nav-link ver-list" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">TÌM HỒ SƠ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link ver-list" id="sup-tab" data-toggle="tab" href="#support" role="tab" aria-controls="support" aria-selected="false">HỖ TRỢ</a>
          </li>
          
        </ul>
      </div>
      <div class="col-md-6 col-sm-12 col-12" >
        <div class="row mt-2 sizeh1">
          <h4 class="font-italic font-weight-light text-white page-header p-1 pl-2 img-header ml-5" >CHI TIẾT DỊCH VỤ </h4>
        </div>
        
      </div>
      <div class="col-md-3" style="width:600px;">
        <div id="alertSuccess" class="alert alert-success"  role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          Thêm dịch vụ vào giỏ thành công !!
        </div>
      </div>
    </div>
    
    <div class="tab-content" id="myTabContent">
        <!-- DS Dịch Vụ đăng tuyển-->
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
          <div class="row">
            <div class="col-4">
              <div class="list-group list-scroll" id="list-tab" role="tablist">
                @foreach ($listDichVu_DT as $dvdt)
                  @if($dvdt->id_dichvu == $firstDV_DT->id_dichvu)
                  <button class="list-group-item list-group-item-action active" id="{{'listDT-'.$dvdt->id_dichvu}}" data-toggle="list" href="{{'#chitiet-'.$dvdt->id_dichvu}}" role="tab" aria-controls="{{$dvdt->id_dichvu}}">
                    <div class=" w-100 justify-content-between">
                      <div class="row">
                        <div class="col-10">
                          <h5 class="mb-1">{{$dvdt->tendv }}</h5>
                        </div>
                        <div class="col-2 b-orange">
                          <a class="btn btn-outline-info float-right add-to-cart" data-url="{{route('recruiter.add_to_cart', ['id_dichvu' => $dvdt->id_dichvu ])}}"><i class="fa fa-cart-plus " aria-hidden="true"></i></a>
                        </div>
                      </div>
                    </div>
                    <p class="mb-1">{{number_format($dvdt->giadv) }} VND</p> 
                  </button>
                  @else
                  <button class="list-group-item list-group-item-action" id="{{'listDT-'.$dvdt->id_dichvu}}" data-toggle="list" href="{{'#chitiet-'.$dvdt->id_dichvu}}" role="tab" aria-controls="{{$dvdt->id_dichvu}}">
                    <div class="w-100 justify-content-between">
                      <div class="row">
                        <div class="col-10">
                          <h5 class="mb-1">{{$dvdt->tendv }}</h5>
                        </div>
                        <div class="col-2 b-orange">
                          <a class="btn btn-outline-info float-right add-to-cart" data-url="{{route('recruiter.add_to_cart', ['id_dichvu' => $dvdt->id_dichvu ])}}"><i class="fa fa-cart-plus " aria-hidden="true"></i></a>
                        </div>
                      </div>
                    </div>
                    <p class="mb-1">{{number_format($dvdt->giadv) }} VND</p>
                  </button>
                  @endif
                @endforeach
              </div>
            </div>
            <div class="col-8">
              <div class="tab-content" id="nav-tabContent">
                @foreach ($listDichVu_DT as $dvdt)
                  @if($dvdt->id_dichvu == $firstDV_DT->id_dichvu)
                    <div class="tab-pane fade show active" id="{{'chitiet-'.$dvdt->id_dichvu}}" role="tabpanel" aria-labelledby="{{'listDT-'.$dvdt->id_dichvu}}">
                      <div class="row  recuitment-form recuitment-inner">
                        <div class="col-9">
                          <h4>{{$dvdt->tendv}}</h4>
                        </div>
                        <div class="col-3">
                          <p class="text-right">{{number_format($dvdt->giadv) }} VND</p>
                        </div>
                      </div>
                      <div class="row  recuitment-form recuitment-inner">
                        <div class="col-12">
                          <h4>Mô tả dịch vụ</h4>
                        </div>
                        <div class="col-12 noneStyleUl">
                          {!! $dvdt->motadv !!}
                        </div>
                      </div>
                      <div class="row cart-right">
                        <div class="col-12 b-orange">
                          <a href="javascript:;" class="btn btn-outline-info float-right add-to-cart" data-url="{{route('recruiter.add_to_cart', ['id_dichvu' => $dvdt->id_dichvu ])}}">Thêm vào giỏ</a>
                        </div>
                      </div>
                    </div>
                  @else
                    <div class="tab-pane fade " id="{{'chitiet-'.$dvdt->id_dichvu}}" role="tabpanel" aria-labelledby="{{'listDT-'.$dvdt->id_dichvu}}">
                      <div class="row  recuitment-form recuitment-inner">
                        <div class="col-9">
                          <h4>{{$dvdt->tendv}}</h4>
                        </div>
                        <div class="col-3">
                          <p class="text-right">{{number_format($dvdt->giadv) }} VND</p>
                        </div>
                      </div>
                      <div class="row  recuitment-form recuitment-inner">
                        <div class="col-12">
                          <h4>Mô tả dịch vụ</h4>
                        </div>
                        <div class="col-12 noneStyleUl">
                          {!! $dvdt->motadv !!}
                        </div>
                      </div>
                      <div class="row cart-right">
                        <div class="col-12 b-orange">
                          <a class="btn btn-outline-info float-right add-to-cart" data-url="{{route('recruiter.add_to_cart', ['id_dichvu' => $dvdt->id_dichvu ])}}">Thêm vào giỏ</a>
                        </div>
                      </div>
                    </div>
                  @endif
                @endforeach
              </div>
            </div>
          </div>
        </div>
        <!-- End DS Dịch Vụ đăng tuyển-->
        <!-- DS Dịch Vụ tìm kiếm-->
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
          <div class="row">
            <div class="col-4">
              <div class="list-group list-scroll" id="list-tab" role="tablist">
                @foreach ($listDichVu_TK as $dvtk)
                  @if($dvtk->id_dichvu == $firstDV_TK->id_dichvu)
                  <button class="list-group-item list-group-item-action active" id="{{'listTK-'.$dvtk->id_dichvu}}" data-toggle="list" href="{{'#chitiet-'.$dvtk->id_dichvu}}" role="tab" aria-controls="{{$dvtk->id_dichvu}}">
                    <div class=" w-100 justify-content-between">
                      <div class="row">
                        <div class="col-10">
                          <h5 class="mb-1">{{$dvtk->tendv }}</h5>
                        </div>
                        <div class="col-2 b-orange">
                          <a class="btn btn-outline-info float-right add-to-cart" data-url="{{route('recruiter.add_to_cart', ['id_dichvu' => $dvtk->id_dichvu ])}}"><i class="fa fa-cart-plus " aria-hidden="true"></i></a>
                        </div>
                      </div>
                    </div>
                    <p class="mb-1">{{number_format($dvtk->giadv) }} VND</p>
                  </button>
                  @else
                  <button class="list-group-item list-group-item-action" id="{{'listTK-'.$dvtk->id_dichvu}}" data-toggle="list" href="{{'#chitiet-'.$dvtk->id_dichvu}}" role="tab" aria-controls="{{$dvtk->id_dichvu}}">
                    <div class="w-100 justify-content-between">
                      <div class="row">
                        <div class="col-10">
                          <h5 class="mb-1">{{$dvtk->tendv }}</h5>
                        </div>
                        <div class="col-2 b-orange">
                          <a class="btn btn-outline-info float-right add-to-cart" data-url="{{route('recruiter.add_to_cart', ['id_dichvu' => $dvtk->id_dichvu ])}}"><i class="fa fa-cart-plus " aria-hidden="true"></i></a>
                        </div>
                      </div>
                    </div>
                    <p class="mb-1">{{number_format($dvtk->giadv) }} VND</p>
                  </butt>
                  @endif
                @endforeach
              </div>
            </div>
            <div class="col-8">
              <div class="tab-content " id="nav-tabContent">
                @foreach ($listDichVu_TK as $dvtk)
                  @if($dvtk->id_dichvu == $firstDV_TK->id_dichvu)
                    <div class="tab-pane fade show active" id="{{'chitiet-'.$dvtk->id_dichvu}}" role="tabpanel" aria-labelledby="{{'listTK-'.$dvtk->id_dichvu}}">
                      <div class="row recuitment-form recuitment-inner">
                        <div class="col-9">
                          <h4>{{$dvtk->tendv}}</h4>
                        </div>
                        <div class="col-3">
                          <p class="text-right">{{number_format($dvtk->giadv) }} VND</p>
                        </div>
                      </div>
                      <div class="row recuitment-form recuitment-inner">
                        <div class="col-12">
                          <h4>Mô tả dịch vụ</h4>
                        </div>
                        <div class="col-12 noneStyleUl">
                          {!! $dvtk->motadv !!}
                        </div>
                      </div>
                      <div class="row cart-right">
                        <div class="col-12 b-orange">
                          <a class="btn btn-outline-info float-right add-to-cart" data-url="{{route('recruiter.add_to_cart', ['id_dichvu' => $dvtk->id_dichvu ])}}">Thêm vào giỏ</a>
                        </div>
                      </div>
                    </div>
                  @else
                    <div class="tab-pane fade " id="{{'chitiet-'.$dvtk->id_dichvu}}" role="tabpanel" aria-labelledby="{{'listTK-'.$dvtk->id_dichvu}}">
                      <div class="row recuitment-form recuitment-inner">
                        <div class="col-9">
                          <h4>{{$dvtk->tendv}}</h4>
                        </div>
                        <div class="col-3">
                          <p class="text-right">{{number_format($dvtk->giadv) }} VND</p>
                        </div>
                      </div>
                      <div class="row recuitment-form recuitment-inner">
                        <div class="col-12">
                          <h4>Mô tả dịch vụ</h4>
                        </div>
                        <div class="col-12 noneStyleUl">
                          {!! $dvtk->motadv !!}
                        </div>
                      </div>
                      <div class="row cart-right">
                        <div class="col-12 b-orange">
                          <a class="btn btn-outline-info float-right add-to-cart" data-url="{{route('recruiter.add_to_cart', ['id_dichvu' => $dvtk->id_dichvu ])}}">Thêm vào giỏ</a>
                        </div>
                      </div>
                    </div>
                  @endif
                @endforeach
              </div>
            </div>
          </div>
        </div>
        <!-- End DS Dịch Vụ tìm kiếm-->
         <!-- DS Dịch Vụ hỗ trợ-->
         <div class="tab-pane fade" id="support" role="tabpanel" aria-labelledby="support-tab">
          <div class="row">
            <div class="col-4">
              <div class="list-group list-scroll" id="list-tab" role="tablist">
                @foreach ($listDichVu_HT as $dvht)
                  @if($dvht->id_dichvu == $firstDV_HT->id_dichvu)
                  <button class="list-group-item list-group-item-action active" id="{{'listHT-'.$dvht->id_dichvu}}" data-toggle="list" href="{{'#chitiet-'.$dvht->id_dichvu}}" role="tab" aria-controls="{{$dvht->id_dichvu}}">
                    <div class=" w-100 justify-content-between">
                      <div class="row">
                        <div class="col-10">
                          <h5 class="mb-1">{{$dvht->tendv }}</h5>
                        </div>
                        <div class="col-2 b-orange">
                          <a class="btn btn-outline-info float-right add-to-cart" data-url="{{route('recruiter.add_to_cart', ['id_dichvu' => $dvht->id_dichvu ])}}"><i class="fa fa-cart-plus " aria-hidden="true"></i></a>
                        </div>
                      </div>
                    </div>
                    <p class="mb-1">{{number_format($dvht->giadv) }} VND</p>
                  </button>
                  @else
                  <button class="list-group-item list-group-item-action" id="{{'listHT-'.$dvht->id_dichvu}}" data-toggle="list" href="{{'#chitiet-'.$dvht->id_dichvu}}" role="tab" aria-controls="{{$dvht->id_dichvu}}">
                    <div class="w-100 justify-content-between">
                      <div class="row">
                        <div class="col-10">
                          <h5 class="mb-1">{{$dvht->tendv }}</h5>
                        </div>
                        <div class="col-2 b-orange">
                          <a class="btn btn-outline-info float-right add-to-cart" data-url="{{route('recruiter.add_to_cart', ['id_dichvu' => $dvht->id_dichvu ])}}"><i class="fa fa-cart-plus " aria-hidden="true"></i></a>
                        </div>
                      </div>
                    </div>
                    <p class="mb-1">{{number_format($dvht->giadv) }} VND</p>
                  </butt>
                  @endif
                @endforeach
              </div>
            </div>
            <div class="col-8">
              <div class="tab-content " id="nav-tabContent">
                @foreach ($listDichVu_HT as $dvht)
                  @if($dvht->id_dichvu == $firstDV_HT->id_dichvu)
                    <div class="tab-pane fade show active" id="{{'chitiet-'.$dvht->id_dichvu}}" role="tabpanel" aria-labelledby="{{'listHT-'.$dvtk->id_dichvu}}">
                      <div class="row recuitment-form recuitment-inner">
                        <div class="col-9">
                          <h4>{{$dvht->tendv}}</h4>
                        </div>
                        <div class="col-3">
                          <p class="text-right">{{number_format($dvht->giadv) }} VND</p>
                        </div>
                      </div>
                      <div class="row recuitment-form recuitment-inner">
                        <div class="col-12">
                          <h4>Mô tả dịch vụ</h4>
                        </div>
                        <div class="col-12 noneStyleUl">
                          {!! $dvht->motadv !!}
                        </div>
                      </div>
                      <div class="row cart-right">
                        <div class="col-12 b-orange">
                          <a class="btn btn-outline-info float-right add-to-cart" data-url="{{route('recruiter.add_to_cart', ['id_dichvu' => $dvht->id_dichvu ])}}">Thêm vào giỏ</a>
                        </div>
                      </div>
                    </div>
                  @else
                    <div class="tab-pane fade " id="{{'chitiet-'.$dvht->id_dichvu}}" role="tabpanel" aria-labelledby="{{'listHT-'.$dvht->id_dichvu}}">
                      <div class="row recuitment-form recuitment-inner">
                        <div class="col-9">
                          <h4>{{$dvht->tendv}}</h4>
                        </div>
                        <div class="col-3">
                          <p class="text-right">{{number_format($dvht->giadv) }} VND</p>
                        </div>
                      </div>
                      <div class="row recuitment-form recuitment-inner">
                        <div class="col-12">
                          <h4>Mô tả dịch vụ</h4>
                        </div>
                        <div class="col-12 noneStyleUl">
                          {!! $dvht->motadv !!}
                        </div>
                      </div>
                      <div class="row cart-right">
                        <div class="col-12 b-orange">
                          <a class="btn btn-outline-info float-right add-to-cart" data-url="{{route('recruiter.add_to_cart', ['id_dichvu' => $dvht->id_dichvu ])}}">Thêm vào giỏ</a>
                        </div>
                      </div>
                    </div>
                  @endif
                @endforeach
              </div>
            </div>
          </div>
        </div>
        <!-- End DS Dịch Vụ hỗ trợ-->
      </div>
    

  </div>
</div>

<!-- (end) published recuitment -->

<div class="clearfix mt-5"></div>

<!-- job support -->
<div class="container-fluid job-support-wrapper">
 <div class="container-fluid job-support-wrap">
  <div class="container job-support">
    <div class="row">
      <div class="col-md-6 col-sm-12 col-12">
        <ul class="spp-list">
          <li>
            <span><i class="fa fa-question-circle pr-2 icsp"></i>Hỗ trợ nhà tuyển dụng:</span>
          </li>
          <li>
            <span><i class="fa fa-phone pr-2 icsp"></i>0123.456.789</span>
          </li>
        </ul>
      </div>
      <div class="col-md-6 col-sm-12 col-12">
        <div class="newsletter">
            <span class="txt6">Đăng ký nhận bản tin việc làm</span>
            <div class="input-group frm1">
              <input type="text" placeholder="Nhập email của bạn" class="newsletter-email form-control">
              <a href="#" class="input-group-addon"><i class="fa fa-lg fa-envelope-o colorb"></i></a>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- (end) job support -->

@endsection




