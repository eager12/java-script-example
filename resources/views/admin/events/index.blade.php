<!DOCTYPE html>
<html>
<head>
  <title> رویداد ها</title>

  @include('admin.includes.headerLinks')

  <link rel="stylesheet" href="https://arastowel.com/panel-admin/css/persian-datepicker-0.4.5.min.css" />
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
        رویداد ها
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> خانه</a></li>
        <li class="active"> رویداد ها</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <a href="{{route('events.create')}}" class="btn btn-primary btn-block margin-bottom">افزودن رویداد  جدید</a>

          <div class="box box-solid">
            <!-- /.box-body -->
          </div>
          <!-- /. box -->

          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">رویداد ها</h3>

              <div class="box-tools pull-right">
                <div class="has-feedback">
{{--                  <form action="{{route('events.search')}}" method="get">--}}
{{--                  <input type="text" name="search" class="form-control input-sm" placeholder="جستجو">--}}
{{--                    <button type="submit" class="fa fa-search form-control-feedback" value="search"></button>--}}
{{--                  </form>--}}
                </div>
              </div>
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

                <div class="pull-left">
{{--                {{$events->links()}}--}}

                <!-- /.btn-group -->
                </div>
                <!-- /.pull-right -->
              </div>
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">

                  <thead>
                  <tr>
                    <th class="mailbox-star">کد رویداد </th>
                    <th class="mailbox-star">عنوان رویداد </th>
                    <th class="mailbox-name">محل برگزاری</th>
                    <th class="mailbox-subject">تاریخ</th>
                    <th class="mailbox-subject">ویرایش</th>
                    <th class="mailbox-subject">حذف</th>

                  </tr>
                  </thead>

                  <tbody>
                  @foreach($events as $event)

                  <tr>
                    <td class="mailbox-star">{{$event->id}}</td>
                    <td class="mailbox-star"> {{$event->title}}</td>
                    <td class="mailbox-star"> {{$event->place}}</td>
                    <td class="mailbox-star" style="direction: ltr;text-align: right;"> {{\Carbon\Carbon::parse($event->done_at)->format('d M Y')}}</td>

                    <td class="mailbox-subject"><a href="{{route('events.edit',['event' => $event->id])}}" class="btn btn-warning fa fa-edit"></a> </td>
                    <td class="mailbox-subject">
                      <form action="{{route('events.destroy',['event'=>$event->id])}}" method="post">
                        {{method_field('delete')}}
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-danger fa fa-trash"></button>
                      </form>
                    </td>

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
                <div class="pull-left">
{{--                {{$events->links()}}--}}

                <!-- /.btn-group -->
                </div>
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
<script>
    $(document).ready(function() {
        $('.page-link').addClass('btn btn-default btn-sm');
        $('.pagination').addClass('display-block');
    });

</script>
</body>
</html>
