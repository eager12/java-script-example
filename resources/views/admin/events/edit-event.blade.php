<!DOCTYPE html>
<html>
<head>
    <title>ویرایش رویداد</title>

    @include('admin.includes.headerLinks')
    <style>
        .display-none {
            display: none !important;
        }

        .hidden {
            visibility: hidden;
        }

        .variableImage {
            width: 50px;
        }

        .add-gallery {
            display: block;
            background-color: #f2f2f2;
            height: 100px;
            border: dashed black 1px;
            text-align: center;
            font-size: 18px;
            line-height: 100px;
            padding: 0;
            z-index: 9999999;

        }

        .deletegaler {
            display: block;
            background-color: rgba(0, 0, 0, 0.3);
            transform: translateY(-100px);
        }

        .wronginput {
            border: red 1px solid;
        }

    </style>
    <link rel="stylesheet" href="/panel-admin/css/persian-datepicker-0.4.5.min.css"/>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="/js/jquery.popupWindow.js"></script>

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">


@include('admin.includes.header')
<!-- right side column. contains the logo and sidebar -->
@include('admin.includes.aside')
@php
    $json = json_decode($event->meta);
@endphp
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                ویرایش رویداد
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> خانه</a></li>
                <li>رویداد ها</li>
                <li class="active">ویرایش رویداد</li>
            </ol>
        </section>
        <form action="{{route('events.update',['event' => $event->id])}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        {{method_field('put')}}
        <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-md-3">
                        @if(isset($pm))
                            <a class="btn btn-success btn-block margin-bottom">            {{$pm}}
                            </a>


                        @endif


                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <a href="{{route('events.index')}}" class="btn btn-primary btn-block margin-bottom">بازگشت</a>

                        <!-- /. box -->
                        <div class="box box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title" id="image_title">تصویر اصلی رویداد</h3>

                                <div class="box-tools">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                                class="fa fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body no-padding">
                                <div class="input-group" style="width: 100%;padding: 10px">
                                    <div id="picture" style="width: 100%;margin: 5px auto;"><img
                                                src="{{$event->banner}}" style="width: 100%;margin: 5px auto;"></div>
                                    <button type="button" class="browse btn btn-primary" id="imageUpload"
                                            style="width: 100%;padding: 10px;margin: auto"> تغییر تصویر
                                    </button>
                                    <input type="text" hidden name="mainImage" style="width: 100%;height: 100%"
                                           value="{{$event->banner}}" id="featured_image" placeholder="آدرس تصویر"
                                           readonly/>

                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>


                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">عنوان و توضیحات کلی</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="form-group">
                                    <input class="form-control" value="{{$event->title}}" name="title" id="title"
                                           placeholder="عنوان رویداد">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" value="{{$event->place}}" name="place" id="place"
                                           placeholder="محل برگزاری">
                                </div>

                                <div class="form-group">
                                    <input class="form-control"
                                           value="{{\Carbon\Carbon::parse($event->done_at)->format('Y-m-d\TH:i')}}"
                                           type="datetime-local" name="done_at" id="done_at"
                                           placeholder="تاریخ انجام رویداد">
                                </div>


                                <div class="form-group">
                                    <textarea id="ckeditor" name="ckeditor" class="form-control"
                                              style="height: 300px">{!! $event->body !!}</textarea>
                                </div>

                            </div>
                            <!-- /.box-body -->

                            <!-- /.box-footer -->
                        </div>

                        {{--persian part--}}
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">عنوان و توضیحات فارسی</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="form-group">
                                    <input class="form-control" name="pTitle" value="{{$json->pTitle??''}}" id="pTitle"
                                           placeholder="عنوان رویداد">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="pPlace" value="{{$json->pPlace??''}}" id="pPlace"
                                           placeholder="محل برگزاری">
                                </div>
                                <div class="form-group">
                                    <textarea id="pCkeditor" name="pCkeditor" class="form-control"
                                              style="height: 300px">{!! $event->pBody !!}

                                    </textarea>
                                </div>

                            </div>
                            <!-- /.box-body -->

                            <!-- /.box-footer -->
                        </div>

                        <div class="box box-primary">

                            <div class="box-footer">
                                <div class="pull-right">

                                    <button type="submit" class="btn btn-primary" onclick="return productvalidate()"><i
                                                class="fa fa-share"></i> انتشار
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-footer -->
                    </div>
                    <!-- /. box -->
                </div><!-- /.col -->
                <!-- /.row -->
            </section>
            <!-- /.content -->
        </form>
    </div>
    <!-- /.content-wrapper -->

@include('admin.includes.footer')
<!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->


@include('admin.includes.footerLinks')

<script src="/js/add-Product.js"></script>
<script src="/panel-admin/js/persian-date-0.1.8.min.js"></script>
<script src="/panel-admin/js/persian-datepicker-0.4.5.min.js"></script>
<!-- Page script -->
<script>
    $(document).ready(function () {

        $('#tarikhstart').persianDatepicker({
            altField: '#tarikhStartAlt',
            altFormat: 'X',
            format: 'D MMMM YYYY HH:mm a',
            observer: true,
            timePicker: {
                enabled: true
            },
        });
    });

    $(document).ready(function () {
        $('#tarikhend').persianDatepicker({
            altField: '#tarikhEndAlt',
            altFormat: 'X',
            format: 'D MMMM YYYY HH:mm a',
            observer: true,
            timePicker: {
                enabled: true
            }
        });
    });

</script>
<script>


    function validatenumericsnum(key) {
        var keycode = (key.which) ? key.which : key.keyCode;
        if (keycode > 31 && (keycode < 48 || keycode > 57))
            return false;
        else
            return true;
    }


</script>
<script type="text/javascript" src="/js/jquery.popupWindow.js"></script>
<script type="text/javascript">

    $(document).ready(function () {

        $('#imageUpload').popupWindow({
            windowURL: '/arts-admin/elfinder/popup/main',
            windowName: 'Filebrowser',
            height: 490,
            width: 950,
            centerScreen: 1
        });
        window.callbackmain = function (file) {
            $('#picture').html('<a onclick="deletemainImage()"><i class="fa fa-times btn btn-danger btn-lg"></i></a><img style="width: 50%" src="' + file + '" /> ');
            $('#featured_image').val(file);
        }
    });

    function deletemainImage() {
        $('#picture').html('');
        $('#featured_image').val('');
    }


    $(document).ready(function () {

        $('#gallery1').popupWindow({

            windowName: 'Filebrowser',
            height: 490,
            width: 950,
            centerScreen: 1

        });


        window.callbackgallery1 = function (file) {
            $('#gallery1').html('<img src="' + file + '" style="width: 100%;height:100%;"><span class="deletegaler display-none" id="deletegallery1" onclick="deleteGallery1Image()">X</span>');
            $('#deletegallery1').removeClass('display-none');
            $('#featured_image1').val(file);


        }
    });

    function deleteGallery1Image() {
        $('#gallery1').html(' + ');
        $('#featured_image1').val('');
    }

    $(document).ready(function () {

        $('#gallery2').popupWindow({

            windowName: 'Filebrowser',
            height: 490,
            width: 950,
            centerScreen: 1

        });


        window.callbackgallery2 = function (file) {
            $('#gallery2').html('<img src="' + file + '" style="width: 100%;height:100%;"><span class="deletegaler display-none" id="deletegallery2" onclick="deleteGallery2Image()">X</span>');
            $('#deletegallery2').removeClass('display-none');
            $('#featured_image2').val(file);

        }
    });

    function deleteGallery2Image() {
        $('#gallery2').html(' + ');
        $('#featured_image2').val('');
    }

    $(document).ready(function () {

        $('#gallery3').popupWindow({

            windowName: 'Filebrowser',
            height: 490,
            width: 950,
            centerScreen: 1

        });


        window.callbackgallery3 = function (file) {
            $('#gallery3').html('<img src="' + file + '" style="width: 100%;height:100%;"><div class="deletegaler display-none" id="deletegallery3" onclick="deleteGallery3Image()">X</div>');
            $('#deletegallery3').removeClass('display-none');
            $('#featured_image3').val(file);

        }
    });

    function deleteGallery3Image() {
        $('#gallery3').html(' + ');
        $('#featured_image3').val('');
    }

    $(document).ready(function () {

        $('#gallery4').popupWindow({

            windowName: 'Filebrowser',
            height: 490,
            width: 950,
            centerScreen: 1

        });


        window.callbackgallery4 = function (file) {
            $('#gallery4').html('<img src="' + file + '" style="width: 100%;height:100%;"><span class="deletegaler display-none" id="deletegallery4" onclick="deleteGallery4Image()">X</span>');
            $('#deletegallery4').removeClass('display-none');
            $('#featured_image4').val(file);

        }
    });

    function deleteGallery4Image() {
        $('#gallery4').html(' + ');
        $('#featured_image4').val('');
    }

    $(document).ready(function () {

        $('#gallery5').popupWindow({

            windowName: 'Filebrowser',
            height: 490,
            width: 950,
            centerScreen: 1

        });


        window.callbackgallery5 = function (file) {
            $('#gallery5').html('<img src="' + file + '" style="width: 100%;height:100%;"><span class="deletegaler display-none" id="deletegallery5" onclick="deleteGallery5Image()">X</span>');
            $('#deletegallery5').removeClass('display-none');
            $('#featured_image5').val(file);

        }
    });

    function deleteGallery5Image() {
        $('#gallery5').html(' + ');
        $('#featured_image5').val('');
    }

    $(document).ready(function () {

        $('#gallery6').popupWindow({

            windowName: 'Filebrowser',
            height: 490,
            width: 950,
            centerScreen: 1

        });


        window.callbackgallery6 = function (file) {
            $('#gallery6').html('<img src="' + file + '" style="width: 100%;height:100%;"><span class="deletegaler display-none" id="deletegallery6" onclick="deleteGallery6Image()">X</span>');
            $('#deletegallery6').removeClass('display-none');
            $('#featured_image6').val(file);

        }
    });

    function deleteGallery6Image() {
        $('#gallery6').html(' + ');
        $('#featured_image6').val('');
    }

    $(document).ready(function () {

        $('#gallery7').popupWindow({

            windowName: 'Filebrowser',
            height: 490,
            width: 950,
            centerScreen: 1

        });


        window.callbackgallery7 = function (file) {
            $('#gallery7').html('<img src="' + file + '" style="width: 100%;height:100%;"><span class="deletegaler display-none" id="deletegallery7" onclick="deleteGallery7Image()">X</span>');
            $('#deletegallery7').removeClass('display-none');
            $('#featured_image7').val(file);

        }
    });

    function deleteGallery7Image() {
        $('#gallery7').html(' + ');
        $('#featured_image7').val('');
    }

    $(document).ready(function () {

        $('#gallery8').popupWindow({

            windowName: 'Filebrowser',
            height: 490,
            width: 950,
            centerScreen: 1

        });


        window.callbackgallery8 = function (file) {
            $('#gallery8').html('<img src="' + file + '" style="width: 100%;height:100%;"><span class="deletegaler display-none" id="deletegallery8" onclick="deleteGallery8Image()">X</span>');
            $('#deletegallery8').removeClass('display-none');
            $('#featured_image8').val(file);

        }
    });

    function deleteGallery8Image() {
        $('#gallery8').html(' + ');
        $('#featured_image8').val('');
    }

    $(document).ready(function () {

        $('#gallery9').popupWindow({

            windowName: 'Filebrowser',
            height: 490,
            width: 950,
            centerScreen: 1

        });


        window.callbackgallery9 = function (file) {
            $('#gallery9').html('<img src="' + file + '" style="width: 100%;height:100%;"><span class="deletegaler display-none" id="deletegallery9" onclick="deleteGallery9Image()">X</span>');
            $('#featured_image9').val(file);

            $('#deletegallery9').removeClass('display-none');
        }
    });

    function deleteGallery9Image() {
        $('#gallery9').html(' + ');
        $('#featured_image9').val('');
    }


    function deleteImage(id) {
        $('#picture' + id).html('تصویر');
        $('#featured_image' + id).val('');
    }


</script>
</body>
</html>
