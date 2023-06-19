
function blogvalidate() {

        var flag = 1;
        $('#tag_title').html('تگ ها');
        $('#image_title').html('تصویر نوشته ');
        $('input').removeClass('wronginput');
        $('a').removeClass('fa fa-exclamation-triangle text-danger');
    if($('#draft').prop('checked')===false) {
        var catCount = $('input.tags:checked').length;
        if (catCount === 0) {
            $('#tag_title').html('<span style="color:red">تگ ها <i class="fa fa-exclamation-triangle"></i></span>');
            flag = 0;
        }
        if ($('#featured_image').val() === '') {
            $('#image_title').html('<span style="color:red">تصویر نوشته <i class="fa fa-exclamation-triangle"></i></span>');
            flag = 0;
        }
        if ($('#title').val() === '') {
            $('#title').addClass('wronginput');
            flag = 0;
        }


    }
    else if($('#draft').prop('checked')===true){
        if ($('#title').val() === '') {
            $('#title').addClass('wronginput');
            flag = 0;
        }
    }

    if (flag === 0) {
        return false;
    }
    else if (flag === 1) {
        return true;
    }

}