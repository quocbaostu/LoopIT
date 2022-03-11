<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>LoopIT</title>
<!-- Font Awesome -->
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <style>
        body{
            background-color: #e3e6e5;
        }

        .logo-card{
            background-color: #ffff;
            margin: auto;
            height: 100px;
            text-align: center;
            width: 100%;
            max-width: 650px;
        }
        .logo{
            padding-top: 26px;
            outline: none;
            text-decoration: none;
            -ms-interpolation-mode: 
            bicubic;clear: both;
            display: inline-block !important;
            border: none;height: auto;float: none;
            width: 100%;
            max-width: 150px;
        }
        .contact-card{
            height: auto;
            margin: auto;
            width: 650px;
            background-color: {{$cv->maucv}};
        }
        .name-card{
            height: 120px;
            text-align: center;
        }
        .name{
            padding-top: 26px;
            font-family: 'Nunito', sans-serif;
            font-size: 60px;
            color: {{$cv->mauchu_lh}};
        }
        .avt{
            height: 270px;
            text-align: center;
        }
        .avatar-profile {
            position: relative;
            max-width: 205px;
            margin: 50px auto;
            padding-left: 15px;
            padding-top: 10px;
        }
        .avatar-profile .avatar-preview {
            width: 192px;
            height: 192px;
            position: relative;
            border-radius: 100%;
            border: 6px solid #F8F8F8;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
        }
        .avatar-profile .avatar-preview > img {
            width: 100%;
            height: 100%;
            border-radius: 100%;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
       

        .cv-content{
            height: auto;
            height: auto;
            margin: auto;
            width: 100%;
            max-width: 650px;
            background-color: #ffff;
        }
		.cv-detail {
            padding-top: 20px;
            margin-right: 10px;
            padding-left: 10px;
        }
        .cv-content-title {
            margin-left: 10px;
            font-size: 35px;
            background:transparent;
            font-family: 'Nunito', sans-serif;
            border: 0;
            box-shadow: none;
        }
        .cv-content-title:focus{
            outline:none!important;
        }
        .cv-content-detail {
            margin-left: 10px;
            font-size: 20px;
            line-height: 1.6;
            font-family: 'Nunito', sans-serif;
        }
        .cv-content-detail p{
            font-family: 'Nunito', sans-serif;
        }
        .cv-content-detail strong{
            font-family: 'Nunito', sans-serif;
            font-weight: 700;
        }
        .cv-content-detail em{
            font-family: 'Nunito', sans-serif;
            font-style: italic;
        }
        .cv-content-detail ul li{
            font-family: 'Nunito', sans-serif;
            margin-left: 30px;
            list-style-type: disc;
        }
        .cv-content-detail ol li{
            font-family: 'Nunito', sans-serif;
            margin-left: 30px;
            list-style-type: decimal;
        }
        .hrcvPreview {
            border: solid 3px;
        }


        .info-card{
            font-family: 'Nunito', sans-serif;
            height: auto;
        }
        #info-content {
            font-family: 'Nunito', sans-serif;
            width: 100%;
        }
        #info-content td {
            font-family: 'Nunito', sans-serif;
            padding: 10px;
        }
        .info-tittle{
            font-family: 'Nunito', sans-serif;
            font-size: 20px;
            font-weight: 600;
            color: {{$cv->mauchu_lh}};
        }
        .info-detail{
            font-family: 'Nunito', sans-serif;
            font-size: 18px;
            text-align: right;
            font-weight: 600;
            color: {{$cv->mauchu_lh}};
        }
    </style>
</head>
<body>
    <div class="logo-card">
        <img class="logo" src="{{ URL::asset('public/img/techjobs_bgw.png')}}" alt="">
    </div>
    <div class="contact-card">
        <div class="name-card">
            <div class="name">{{$ungvien->ho}} {{$ungvien->ten}}</div> 
        </div>
        <div class="avt">
            <div class="avatar-profile">
                <div class="avatar-preview">
                    @if ($cv->hinhdaidien != null)
                    <img src="{{ URL::asset('http://localhost/LVAN/LoopIT/public/img/jobseeker/uploads/avt_cv/'.$cv->hinhdaidien)}}" alt="">
                    
                    @else
                    <img src="{{ URL::asset('http://localhost/LVAN/LoopIT/public/img/jobseeker/user.jpg')}}" alt="">
                   
                    @endif
                </div>
            </div>
        </div>
        <div class="info-card">
            <table id="info-content">
                <tr>
                  <td class="info-tittle"><i class="fa fa-envelope-open"></i> Email</td>
                  <td class="info-detail">{{$ungvien->email}}</td>
                </tr>
                <tr>
                    <td class="info-tittle"><i class="fa fa-calendar"></i> Ngày sinh</td>
                    <td class="info-detail">{{$ungvien->ngaysinh}}</td>
                  </tr>
                  <tr>
                    <td class="info-tittle"><i class="fa fa-venus-mars"></i> Giói tính</td>
                    <td class="info-detail">{{$ungvien->gioitinh}}</td>
                  </tr>
                  <tr>
                    <td class="info-tittle"><i class="fa fa-phone-square"></i> Số điện thoại</td>
                    <td class="info-detail">{{$ungvien->sdt}}</td>
                  </tr>
                  <tr>
                    <td class="info-tittle"><i class="fa fa-building"></i> Thành phố</td>
                    <td class="info-detail">{{$ungvien->thanhpho}}</td>
                  </tr>
                  <tr>
                    <td class="info-tittle"><i class="fa fa-location-arrow"></i> Địa chỉ</td>
                    <td class="info-detail">{{$ungvien->diachi}}</td>
                  </tr>
              </table>
        </div>    
    </div>
    <div class="cv-content">
        @foreach ($nd_cv as $nd)
        <div class="cv-detail">
            <div class="cv-content-title" style="color:{{$cv->mauchu_nd}}"> {{$nd->tieude}} </div>	
            <hr style="color:{{$cv->mauchu_nd}};" class="hrcvPreview">
            <div class="cv-content-detail">
                    {!! $nd->chitiet !!}
            </div>
        </div>
        <div style="height: 50px"></div>
        @endforeach
    </div> 
 
</body>
</html>