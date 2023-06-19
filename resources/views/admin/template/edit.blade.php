<!DOCTYPE html>
<html>
<head>
  <title> تنظیمات قالب | حوله رزا</title>

  @include('admin.includes.headerLinks')

<style>
  .display-block{
    display: block!important;
    margin: 0!important;
  }
</style>


</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">


@include('admin.includes.header')
<!-- right side column. contains the logo and sidebar -->
@include('admin.includes.aside')


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        تنظیمات قالب
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> خانه</a></li>
        <li class="active"> تنظیمات قالب</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-4">
          @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
          @if(isset($pm))
              <div class="alert alert-success">
                {{$pm}}
              </div>

              @endif
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title"> ویرایش {{$selectedTemplate->name}}</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <form role="form" action="{{route('template.update',['size'=>$selectedTemplate->id])}}" method="POST">
                @csrf
                @method('put')
                <div class="box-body">

                  <div class="input-group" style="width: 100%;padding: 10px">
                    <div id="picture" style="width: 100%;margin: 5px auto;">
                      @if($selectedTemplate->image!=null)
                       <img style="width: 100%" src="{{$selectedTemplate->image}}" />
                      @endif
                    </div>
                    <button type="button" class="browse btn btn-primary" id="imageUpload" style="width: 100%;padding: 10px;margin: auto" > تغییر تصویر با ابعاد {{$selectedTemplate->dimansion}} </button>
                    <input  type="text" value="{{$selectedTemplate->image}}" hidden name="mainImage" style="width: 100%;height: 100%" id="featured_image" placeholder="آدرس تصویر" readonly  />

                  </div>

                  @if($selectedTemplate->place=='slide1'||$selectedTemplate->place=='slide2'||$selectedTemplate->place=='slide3'||$selectedTemplate->place=='slide4')

                    <div class="form-group">
                      <label for="exampleInputEmail1">لینک</label>
                      <input type="text" style="direction: ltr;text-align: left;font-family: Arial!important;" class="form-control"  id="link" value="{{$selectedTemplate->link}}" name="link" placeholder="لینک">
                    </div>

                  @endif
                  @if($selectedTemplate->place=='video'||$selectedTemplate->place=='video2')


                    <div class="input-group" style="width: 100%;padding: 10px">

                      <button type="button" class="browse btn btn-primary" id="videoUpload" style="width: 100%;padding: 10px;margin: auto" > تغییر فیلم </button>
                      <input  type="text" value="{{$selectedTemplate->video}}" style="width: 100%;height: 100%;direction: ltr;text-align: left;font-family: Arial!important;" name="mainVideo" id="featured_video" placeholder="آدرس فیلم" readonly  />

                    </div>

                  @endif

                  @if($selectedTemplate->place=='iran')


                    <div class="form-group">
                      <label for="exampleInputEmail1">متن انگلیسی</label>
                      <input type="text" class="form-control"  id="text" value="{{$selectedTemplate->text}}" name="text" placeholder="متن انگلیسی">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">متن عربی</label>
                      <input type="text" class="form-control"  id="link" value="{{$selectedTemplate->link}}" name="link" placeholder="متن عربی">
                    </div>

                  @endif

                  @if($selectedTemplate->place=='gift1'||$selectedTemplate->place=='gift2'||$selectedTemplate->place=='gift3'||$selectedTemplate->place=='bath1'||$selectedTemplate->place=='bath2'||$selectedTemplate->place=='bath3'||$selectedTemplate->place=='bath4'||$selectedTemplate->place=='bath5'||$selectedTemplate->place=='bath6')


                    <div class="form-group">
                      <label for="exampleInputEmail1">متن</label>
                      <input type="text" class="form-control"  id="text" value="{{$selectedTemplate->text}}" name="text" placeholder="متن ">
                    </div>

                    <div class="input-group" style="width: 100%;padding: 10px">
                      <div id="picture2" style="width: 100%;margin: 5px auto;">
                        @if($selectedTemplate->image!=null)
                          <img style="width: 100%" src="{{$selectedTemplate->logo}}" />
                        @endif
                      </div>
                      <button type="button" class="browse btn btn-primary" id="imageUpload2" style="width: 100%;padding: 10px;margin: auto" > تغییر لوگو </button>
                      <input  type="text" value="{{$selectedTemplate->logo}}" hidden name="mainImage2" style="width: 100%;height: 100%" id="featured_image2" placeholder="آدرس لوگو" readonly  />

                    </div>

                  @endif


                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                  <button type="submit" class="btn btn-success" style="width: 100%">ثبت</button>
                </div>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->

          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-8">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">تنظیمات قالب</h3>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-controls">
                <!-- Check all button -->
                <div class="pull-right">



                </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>


                <!-- /.pull-right -->
              </div>
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">

                  <thead>
                  <tr>
                    <th class="mailbox-star">کد</th>
                    <th class="mailbox-star">بخش مربوطه</th>
                    <th class="mailbox-subject">ویرایش</th>
                  </tr>
                  </thead>

                  <tbody>
                  @foreach($templates as $template)
                    <tr>
                      <td class="mailbox-star">{{$template->id}}</td>
                      <td class="mailbox-star"><a> {{$template->name}}</a></td>
                      <td class="mailbox-subject"><a href="{{route('template.edit',['template' => $template->id])}}" class="btn btn-warning fa fa-edit"></a> </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer no-padding">
              <div class="mailbox-controls">
                <!-- Check all button -->
                <div class="pull-right">


                </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                <!-- /.pull-right -->
              </div>
            </div>
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
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
<!-- iCheck -->
<!-- Page Script -->

<!-- AdminLTE for demo purposes -->
<script type="text/javascript" src="/js/jquery.popupWindow.js"></script>

<script>
    $(document).ready(function() {
        $('.page-link').addClass('btn btn-default btn-sm');
        $('.pagination').addClass('display-block');
    });
    $(document).ready(function(){

        $('#imageUpload').popupWindow({
            windowURL:'/roza-admin/elfinder/popup/main',
            windowName:'Filebrowser',
            height:490,
            width:950,
            centerScreen:1
        });
        window.callbackmain=function (file){
            $('#picture').html('<img style="width: 100%" src="' + file + '" /> ');
            $('#featured_image').val(file);
        }
    });


</script>

<script>

    $(document).ready(function(){

        $('#imageUpload2').popupWindow({
            windowURL:'/roza-admin/elfinder/popup/main2',
            windowName:'Filebrowser',
            height:490,
            width:950,
            centerScreen:1
        });
        window.callbackmain2=function (file){
            $('#picture2').html('<img style="width: 100%" src="' + file + '" /> ');
            $('#featured_image2').val(file);
        }
    });


</script>

@if($selectedTemplate->place=='video'||$selectedTemplate->place=='video2')
<script>
    $(document).ready(function() {
        $('.page-link').addClass('btn btn-default btn-sm');
        $('.pagination').addClass('display-block');
    });
    $(document).ready(function(){

        $('#videoUpload').popupWindow({
            windowURL:'/roza-admin/elfinder/popup/videomain',
            windowName:'Filebrowser',
            height:490,
            width:950,
            centerScreen:1
        });
        window.callbackvideomain=function (file){
            $('#featured_video').val(file);
        }
    });

</script>

  @endif
</body>
</html>
