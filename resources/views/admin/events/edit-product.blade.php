<!DOCTYPE html>
<html>
<head>
  <title>ویرایش محصول | حوله رزا</title>

  @include('admin.includes.headerLinks')
<style>
  .display-none{
    display: none!important;
  }
  .hidden{
    visibility: hidden;
  }
  .variableImage{
    width: 50px;
  }
  .add-gallery{
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
    .deletegaler{
        display: block;
        background-color: rgba(0,0,0,0.3);
        transform: translateY(-100px);
    }
  .wronginput{
    border: red 1px solid;
  }

</style>
  <link rel="stylesheet" href="{{asset('/panel-admin/css/persian-datepicker-0.4.5.min.css')}}" />
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script type="text/javascript" src="/js/jquery.popupWindow.js"></script>

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
        ویرایش محصول
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> خانه</a></li>
        <li >محصولات</li>
        <li class="active">ویرایش محصول</li>
      </ol>
    </section>
<form action="{{route('products.update',['product' => $product->id])}}" method="post" enctype="multipart/form-data">
{{csrf_field()}}
{{method_field('put')}}

<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">
          @if(isset($pm))
            <a  class="btn btn-success btn-block margin-bottom">            {{$pm}}
            </a>


          @endif
          <a href="{{route('products.index')}}" class="btn btn-primary btn-block margin-bottom">بازگشت</a>

          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title" id="category_title">دسته بندی ها</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                @foreach($categories as $category)

                <li>
                  <a>{{$category->name}}
                       <div class="material-switch pull-left">
                              <input name="cat{{$category->id}}" id="cat{{$category->id}}" @if($product->hasCategory($category->id)) checked @endif type="checkbox" class="categories"/>
                              <label for="cat{{$category->id}}" class="label-info"></label>
                            </div>
                  </a>
                </li>
                @endforeach
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title" id="image_title">تصویر کالا</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="input-group" style="width: 100%;padding: 10px">
                <div id="picture" style="width: 100%;margin: 5px auto;"><img src="{{$product->image}}" style="width: 100%;margin: 5px auto;"></div>
                <button type="button" class="browse btn btn-primary" id="imageUpload" style="width: 100%;padding: 10px;margin: auto" > تغییر تصویر </button>
                <input  type="text" hidden name="mainImage" style="width: 100%;height: 100%" value="{{$product->image}}" id="featured_image" placeholder="آدرس تصویر" readonly  />

              </div>
            </div>
            <!-- /.box-body -->
          </div>

          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">گالری کالا</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="input-group gallery-box" id="gallery-box" style="display: block;">
                {{--<a href="#" class="col-sm-4 add-gallery"> <img src="/images/18.jpg" style="width: 100%"> </a>--}}
                @foreach($product->galleries as $gallery)
                  @php $galleryArray[]=$gallery->address  @endphp
                  @endforeach
                  <a href="/arts-admin/elfinder/popup/gallery1" class="col-sm-4 add-gallery" id="gallery1"> @if(isset($galleryArray[0])) <img src="{{$galleryArray[0]}}" style="width: 100%;height:100%"><span class="deletegaler" id="deletegallery8" onclick="deleteGallery1Image()">X</span> @else + @endif </a>
                  <input hidden type="text" style="width: 100%;height: 100%" id="featured_image1" @if(isset($galleryArray[0])) value="{{$galleryArray[0]}}" @endif placeholder="آدرس تصویر" readonly name="gallery1" />
                  <a href="/arts-admin/elfinder/popup/gallery2" class="col-sm-4 add-gallery" id="gallery2"> @if(isset($galleryArray[1])) <img src="{{$galleryArray[1]}}" style="width: 100%;height:100%"><span class="deletegaler " id="deletegallery8" onclick="deleteGallery2Image()">X</span> @else + @endif  </a>
                  <input hidden type="text" style="width: 100%;height: 100%" id="featured_image2" placeholder="آدرس تصویر" readonly name="gallery2" @if(isset($galleryArray[1])) value="{{$galleryArray[1]}}" @endif />
                  <a href="/arts-admin/elfinder/popup/gallery3" class="col-sm-4 add-gallery" id="gallery3"> @if(isset($galleryArray[2])) <img src="{{$galleryArray[2]}}" style="width: 100%;height:100%"><span class="deletegaler " id="deletegallery8" onclick="deleteGallery3Image()">X</span> @else + @endif  </a>
                  <input hidden type="text" style="width: 100%;height: 100%" id="featured_image3" placeholder="آدرس تصویر" readonly name="gallery3" @if(isset($galleryArray[2])) value="{{$galleryArray[2]}}" @endif />
                  <a href="/arts-admin/elfinder/popup/gallery4" class="col-sm-4 add-gallery" id="gallery4"> @if(isset($galleryArray[3])) <img src="{{$galleryArray[3]}}" style="width: 100%;height:100%"><span class="deletegaler " id="deletegallery8" onclick="deleteGallery4Image()">X</span> @else + @endif  </a>
                  <input hidden type="text" style="width: 100%;height: 100%" id="featured_image4" placeholder="آدرس تصویر" readonly name="gallery4" @if(isset($galleryArray[3])) value="{{$galleryArray[3]}}" @endif />
                  <a href="/arts-admin/elfinder/popup/gallery5" class="col-sm-4 add-gallery" id="gallery5"> @if(isset($galleryArray[4])) <img src="{{$galleryArray[4]}}" style="width: 100%;height:100%"><span class="deletegaler " id="deletegallery8" onclick="deleteGallery5Image()">X</span> @else + @endif  </a>
                  <input hidden type="text" style="width: 100%;height: 100%" id="featured_image5" placeholder="آدرس تصویر" readonly name="gallery5" @if(isset($galleryArray[4])) value="{{$galleryArray[4]}}" @endif />
                  <a href="/arts-admin/elfinder/popup/gallery6" class="col-sm-4 add-gallery" id="gallery6"> @if(isset($galleryArray[5])) <img src="{{$galleryArray[5]}}" style="width: 100%;height:100%"><span class="deletegaler " id="deletegallery8" onclick="deleteGallery6Image()">X</span> @else + @endif  </a>
                  <input hidden type="text" style="width: 100%;height: 100%" id="featured_image6" placeholder="آدرس تصویر" readonly name="gallery6" @if(isset($galleryArray[5])) value="{{$galleryArray[5]}}" @endif />
                  <a href="/arts-admin/elfinder/popup/gallery7" class="col-sm-4 add-gallery" id="gallery7"> @if(isset($galleryArray[6])) <img src="{{$galleryArray[6]}}" style="width: 100%;height:100%"><span class="deletegaler " id="deletegallery8" onclick="deleteGallery7Image()">X</span> @else + @endif  </a>
                  <input hidden type="text" style="width: 100%;height: 100%" id="featured_image7" placeholder="آدرس تصویر" readonly name="gallery7" @if(isset($galleryArray[6])) value="{{$galleryArray[6]}}" @endif />
                  <a href="/arts-admin/elfinder/popup/gallery8" class="col-sm-4 add-gallery" id="gallery8"> @if(isset($galleryArray[7])) <img src="{{$galleryArray[7]}}" style="width: 100%;height:100%"><span class="deletegaler " id="deletegallery8" onclick="deleteGallery8Image()">X</span> @else + @endif  </a>
                  <input hidden type="text" style="width: 100%;height: 100%" id="featured_image8" placeholder="آدرس تصویر" readonly name="gallery8" @if(isset($galleryArray[7])) value="{{$galleryArray[7]}}" @endif />
                  <a href="/arts-admin/elfinder/popup/gallery9" class="col-sm-4 add-gallery" id="gallery9"> @if(isset($galleryArray[8])) <img src="{{$galleryArray[8]}}" style="width: 100%;height:100%"><span class="deletegaler " id="deletegallery8" onclick="deleteGallery9Image()">X</span> @else + @endif  </a>
                  <input hidden type="text" style="width: 100%;height: 100%" id="featured_image9" placeholder="آدرس تصویر" readonly name="gallery9" @if(isset($galleryArray[8])) value="{{$galleryArray[8]}}" @endif />


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
                <input class="form-control" name="title" id="title" placeholder="نام محصول" value="{{$product->name}}">
              </div>

              <div class="form-group">
                <input class="form-control" name="english_title" id="english_title" placeholder="Product name" value="{{$product->english_name}}">
              </div>

              <div class="form-group">
                <input class="form-control" name="arabic_title" id="arabic_title" placeholder="اسم المنتج" value="{{$product->arabic_name}}">
              </div>

              <div class="form-group">
                    <textarea id="ckeditor" name="ckeditor" class="form-control" style="height: 300px">
                    {!! $product->short_description !!}
                    </textarea>
              </div>

            </div>
            <!-- /.box-body -->

            <!-- /.box-footer -->
          </div>



          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">جزئیات محصول</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab_1" id="pricetab" data-toggle="tab">قیمت</a></li>
                  <li><a href="#tab_2" id="colorstab" class="hidden" data-toggle="tab">رنگ ها</a></li>
                  <li><a href="#tab_3" id="sizetab" class="hidden" data-toggle="tab">سایز ها</a></li>
                  <li><a href="#tab_4" data-toggle="tab">توضیحات اضافی</a></li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                    <div class="input-group">
                      <span class="input-group-addon">قیمت اصلی</span>
                      <input type="number" id="mainprice" name="mainprice" pattern="[0-9]*"  onkeypress="return validatenumericsnum(event);" class="form-control" value="{{$product->price}}" placeholder="قیمت اصلی به تومان">
                    </div>

                    <div class="input-group">
                      <span class="input-group-addon">موجودی انبار</span>
                      <input type="number" id="mainqty" name="mainqty" pattern="[0-9]*"  onkeypress="return validatenumericsnum(event);" class="form-control" value="{{$product->qty}}" placeholder="موجودی انبار">
                    </div>

                    <div class="input-group" style="height: 50px">
                      <label class="input-group-addon" for="colorvariable"> متغیر رنگ؟</label>
                      <div class="material-switch pull-right" style="margin-top: 15px">
                        <input name="colorvariable" id="colorvariable" type="checkbox" @if($product->variable!=0) checked @endif onclick="colorVariable()" class="colorvariable"/>
                        <label for="colorvariable"  class="label-info" ></label>
                      </div>
                    </div>


                    <div class="input-group" style="height: 50px">
                      <label class="input-group-addon" for="sizevariable"> متغیر سایز؟</label>
                      <div class="material-switch pull-right" style="margin-top: 15px">
                        <input name="sizevariable" id="sizevariable" onclick="sizeVariable()" @if($product->variable==2) checked @endif type="checkbox" class="sizevariable"/>
                        <label for="sizevariable"  class="label-info"></label>
                      </div>
                    </div>


                    <div class="input-group"  style="height: 50px">
                      <label class="input-group-addon" for="off">فعال کردن حراج؟</label>
                      <div class="material-switch pull-right" style="margin-top: 15px">
                        <input name="off" id="off" type="checkbox" onclick="showOff()" @if($product->off->count()!=0) checked @endif class="offcheck"/>
                        <label for="off" onclick="showOff()" class="label-info"></label>
                      </div>
                    </div>


                    <div class="display-none" id="offDetails">
                      <div class="input-group">
                        <span class="input-group-addon">درصد تخفیف</span>
                        <input type="number" name="offpercent" pattern="[0-9]*"  onkeypress="return validatenumericsnum(event);" @if($product->off->count()!=0) @foreach($product->off as $off) @php $offpercent=$off->percent @endphp @endforeach value="{{$offpercent}}" @endif class="form-control" placeholder="درصد تخفیف بین ۱ تا ۱۰۰ درصد">
                      </div>
                      <div class="input-group" style="z-index: 999;">
                        <span class="input-group-addon">تاریخ شروع حراج</span>
                        <input type="text"  id="tarikhstart" class="form-control pull-right" style="z-index: 999999;">
                        <input hidden type="text" name="offstart" id="tarikhStartAlt" class="form-control pull-right hidden">


                        <span class="input-group-addon">تاریخ پایان حراج</span>
                        <input type="text"  id="tarikhend" class="form-control pull-right">
                        <input hidden type="text" name="offend" id="tarikhEndAlt" class="form-control pull-right hidden">

                      </div>

                    </div>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_2">
                    <div class="box-group" id="accordion">
                    @foreach($colors as $color)
                      <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                        <div class="panel box box-primary">
                          <div class="box-header with-border">
                            <h4 class="box-title">
                              <a data-toggle="collapse" data-parent="#accordion" id="titleColor{{$color->id}}" href="#collapse{{str_replace('#','',$color->english_name)}}">
                                {{$color->name}}
                              </a>
                            </h4>
                            <div class="material-switch pull-left">
                              <input name="{{$color->id}}" id="{{$color->id}}" @if($product->hasColor($color->id)) checked @endif type="checkbox"  class="colors"/>
                              <label for="{{$color->id}}" class="label-success"></label>
                            </div>

                            <div id="collapse{{str_replace('#','',$color->english_name)}}" class="panel-collapse collapse">
                              <div class="box-body color-box-body">
                                <div class="input-group">
                                  <span class="input-group-addon" id="picture{{str_replace('#','',$color->english_name)}}">@if($product->hasColor($color->id)) <a onclick="deleteImage('{{str_replace('#','',$color->english_name)}}')"><i class="fa fa-times btn btn-danger btn-lg"></i></a><img class="variableImage" src="@foreach($selectedColors as $selectedColor) @if($selectedColor->product_id==$product->id && $selectedColor->color_id==$color->id){{$selectedColor->image}} @endif @endforeach" />  @else تصویر @endif</span>
                                  <button type="button" class="browse btn btn-primary" id="imageUpload{{str_replace('#','',$color->english_name)}}" > انتخاب تصویر </button>
                                  <input type="text" style="width: 100%;height: 100%" id="featured_image{{str_replace('#','',$color->english_name)}}" placeholder="آدرس تصویر" value="@foreach($selectedColors as $selectedColor) @if($selectedColor->product_id==$product->id && $selectedColor->color_id==$color->id){{$selectedColor->image}} @endif @endforeach" readonly name="imageColor{{$color->id}}" />
                                </div>
                              </div>
                            </div>

                          </div>

                        </div>
                      @endforeach
                      <div class="btn btn-success color-accept" id="submit">تایید</div>
                    </div>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane ajax-content" id="tab_3">

                  @foreach($sizes as $size)
                    <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                      <div class="panel box box-primary">
                        <div class="box-header with-border">
                          <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion" id="titleSize{{$size->id}}" href="#collapse{{$size->english_name}}">
                              {{$size->name}}
                            </a>
                          </h4>
                          <div class="material-switch pull-left">
                            <input name="Size{{$size->id}}" id="Size{{$size->id}}" @if($product->hasSize($size->id)) checked @endif type="checkbox" class="sizes"/>
                            <label for="Size{{$size->id}}" class="label-success"></label>
                          </div>

                          <div id="collapse{{$size->english_name}}" class="panel-collapse collapse">
                            <div class="box-body size-box-body">

                              <div class="input-group">
                                <span class="input-group-addon">قیمت محصول</span>
                                <input type="number" pattern="[0-9]*" name="priceSize{{$size->id}}" id="priceSize{{$size->id}}"  onkeypress="return validatenumericsnum(event);"  @foreach($selectedSizes as $selectedSize) @if($selectedSize->product_id==$product->id && $selectedSize->size_id==$size->id) value="{{$selectedSize->price}}" @endif @endforeach class="form-control" placeholder="قیمت به تومان">
                              </div>

                            </div>
                          </div>

                        </div>

                      </div>
                    @endforeach

                  </div>
                  <div class="tab-pane" id="tab_4">
                    <div class="box-group" id="accordion">
                      <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                      <div class="panel box box-primary">
                        <div class="box-header with-border">
                          <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapselongdesc">
                              توضیحات بیشتر محصول
                            </a>
                          </h4>
                        </div>
                        <div id="collapselongdesc" class="panel-collapse collapse">
                          <div class="box-body">
                            <div class="form-group">
                    <textarea id="ckeditorlongdesc" name="ckeditorlongdesc" class="form-control" style="height: 300px">
            {!!                     $product->long_description !!}
                    </textarea>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="panel box box-primary">
                        <div class="box-header with-border">
                          <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseinfo">
                              اطلاعات بیشتر درباره محصول
                            </a>
                          </h4>
                        </div>
                        <div id="collapseinfo" class="panel-collapse collapse">
                          <div class="box-body">
                            <div class="form-group">
                    <textarea id="ckeditorinfo" name="ckeditorinfo" class="form-control" style="height: 300px">
            {!!                     $product->info !!}

                    </textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <div class="pull-right">

                <label for="draft" type="button" class="btn btn-default"><i class="fa fa-pencil"></i>
                    <input name="draft" id="draft" type="checkbox"/>
                    <label for="draft" class="label-info"></label>

                  پیش نویس</label>
                <button type="submit" class="btn btn-primary" onclick="return productvalidate()"><i class="fa fa-share"></i> انتشار</button>
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


<script>


    $(document).ready(function() {
        colorVariable();
        sizeVariable();
        showOff();
    });
</script>
<script>
    $(document).ready(function () {

        $('#tarikhstart').persianDatepicker({
            altField: '#tarikhStartAlt',
            altFormat: 'X',
            format: 'D MMMM YYYY HH:mm a',
            observer: true,
            timePicker: {
                enabled: true
            }
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

    $(document).ready(function(){

        $('#imageUpload').popupWindow({
            windowURL:'/arts-admin/elfinder/popup/main',
            windowName:'Filebrowser',
            height:490,
            width:950,
            centerScreen:1
        });
        window.callbackmain=function (file){
            $('#picture').html('<a onclick="deletemainImage()"><i class="fa fa-times btn btn-danger btn-lg"></i></a><img style="width: 50%" src="' + file + '" /> ');
            $('#featured_image').val(file);
        }
    });

    function deletemainImage() {
        $('#picture').html('');
        $('#featured_image').val('');
    }



    $(document).ready(function(){

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

    $(document).ready(function(){

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

    $(document).ready(function(){

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

    $(document).ready(function(){

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

    $(document).ready(function(){

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

    $(document).ready(function(){

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

    $(document).ready(function(){

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
//////////////////////////////////////////
    $(document).ready(function(){

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
///////////////////////////////////////////
    $(document).ready(function(){

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


    @foreach($colors as $color)

    $(document).ready(function(){

        $('#imageUpload{{str_replace('#','',$color->english_name)}}').popupWindow({
            windowURL:'/arts-admin/elfinder/popup/{{str_replace('#','',$color->english_name)}}',
            windowName:'Filebrowser',
            height:490,
            width:950,
            centerScreen:1
        });
        window.callback{{str_replace('#','',$color->english_name)}}=function (file){
            $('#picture{{str_replace('#','',$color->english_name)}}').html('<a onclick="deleteImage(\'{{str_replace('#','',$color->english_name)}}\')"><i class="fa fa-times btn btn-danger btn-lg"></i></a><img class="variableImage" src="' + file + '" /> ');
            $('#featured_image{{str_replace('#','',$color->english_name)}}').val(file);
        }
    });

    @endforeach
    function deleteImage(id) {
        $('#picture'+id).html('تصویر');
        $('#featured_image'+id).val('');
    }




</script>
</body>
</html>
