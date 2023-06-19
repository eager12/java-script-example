@extends('layouts.master')
@section('title', App::isLocale('fa')?'کالیگرافی ، نقاشی و خط نقاشی حمید نصیرزاده | بیوگرافی':'Arts Of Nasirzadeh')

@section('description', 'Hamid Nasirzadeh')
@section('headSection')
    <link rel="alternate" hreflang="en" href="https://arts.nasirzadeh.com/en/biography">
    <link rel="alternate" href="https://arts.nasirzadeh.com/biography" hreflang="x-default">
    <link rel="canonical" href="https://arts.nasirzadeh.com/biography">

    <style>
        .aboutPageIntroContainer {
            background-image: url('{{findObjectByPos($template,'biographyHeader')->value}}');
        }

    </style>
@stop
@section('bodySection')
    <div class="aboutPageIntroContainer">
        <div class="aboutPageIntro">
            <div>
                <img alt="هنرمند حمید نصیرزاده" title="هنرمند حمید نصیرزاده" src="{{App::isLocale('fa')?findObjectByPos($template,'selfieImageFa')->value:findObjectByPos($template,'selfieImage')->value}}">
                <div class="aboutPageIntroText">
                    <p>
                        @if (App::isLocale('en'))
                            Hamid Nasirzadeh
                        @else
                            حمید نصیرزاده
                        @endif
                    </p>
                    <p>
                        @if (App::isLocale('en'))
                            Born February 10, 1970
                        @else
                            متولد ۲۲ بهمن ۱۳۴۸
                        @endif
                    </p>
                    <p>
                        @if (App::isLocale('en'))
                            Graduated in painting from "Mirk" Conservatory of Visual Arts, Tabriz, 1990
                        @else
                            فارغ التحصیل رشته نقاشی از هنرستان هنرهای تجسمی «میرک» تبریز ۱۳۶۹
                        @endif
                    </p>
                    <p>
                        @if (App::isLocale('en'))
                            Bachelor of Graphic Design from Tehran University of Arts, Spring 1995
                        @else
                            لیسانس طراحی گرافیک از دانشگاه هنر تهران، بهار ۱۳۷۴
                        @endif
                    </p>
                    <p>
                        @if (App::isLocale('en'))
                            Master of Graphics from Tehran University of Arts, 2010
                        @else
                            کارشناسی ارشد ارتباط تصویری(گرافیک) از دانشگاه هنر تهران در سال ۱۳۸۸
                        @endif
                    </p>
                    <p>
                        @if (App::isLocale('en'))
                            Official member of Iranian Graphic Designers Association 2006
                        @else
                            عضو رسمی انجمن طراحان گرافیک ایران ۱۳۸۵
                        @endif

                    </p>
                    <p>
                        @if (App::isLocale('en'))
                            Prominent member of the Great Thought Foundation 2016
                        @else
                            عضو برجسته بنیاد فکر بزرگ ۱۳۹۵
                        @endif
                    </p>
                    <p>
                        @if (App::isLocale('en'))
                            MBA degree from Mahan Business Institute 2018
                        @else
                            مدرک MBA از موسسه عالی ماهان ۱۳۹۷
                        @endif
                    </p>
                    <p>
                        @if (App::isLocale('en'))
                            PhD student in Business Leadership at Mahan Business School
                        @else
                            دانشجوی دکتری رشته رهبری در کسب و کار از موسسه عالی ماهان
                        @endif
                    </p>
                    <p>
                        @if (App::isLocale('en'))
                            fields of activity :
                        @else
                            حوزه های فعالیت
                        @endif
                    </p>
                    <p>
                        @if (App::isLocale('en'))
                            Graphic designer, painter and calligrapher
                        @else
                            طراح گرافیک، نقاش و کالیگرافیست
                        @endif
                    </p>
                    <p>
                        @if (App::isLocale('en'))
                            Coach and teacher of personal development
                        @else
                            کوچ و مدرس توسعه فردی
                        @endif
                    </p>
                    <p>
                        @if (App::isLocale('en'))
                            Santour musician, composer and teacher
                        @else
                            نوازنده و سازنده سنتور
                        @endif
                    </p>
                    <p>
                        @if (App::isLocale('en'))
                            Founder of Aras towel brand
                        @else
                            بنیانگذار برند حوله ارس
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="aboutActivityFieldsContainer">
        <div class="aboutActivityFields">
            <div class="aboutPageFieldsTitle">
                <h2>{{__('site.activity_fields')}}</h2>
            </div>
            <div class="aboutPageFieldsGrid">
                <a title="کالیگرافی حمید نصیرزاده" href="https://arts.nasirzadeh.com" target="_blank"><img
                            src="{{findObjectByPos($template,'about1')->value}}" alt="کالیگرافی حمید نصیرزاد" title="کالیگرافی حمید نصیرزاد"></a>
                <a title="کالیگرافی حمید نصیرزاده" href="https://arts.nasirzadeh.com" target="_blank"><img
                            src="{{findObjectByPos($template,'about2')->value}}" alt="کالیگرافی حمید نصیرزاده" title="کالیگرافی حمید نصیرزاده"></a>
                <a title="وب سایت شخصی حمید نصیرزاده" href="https://nasirzadeh.com" target="_blank"><img
                            src="{{findObjectByPos($template,'about3')->value}}" alt="وب سایت شخصی حمید نصیرزاده" title="وب سایت شخصی حمید نصیرزاده"></a>
                <a title="حوله ارس" href="https://arastowel.com" target="_blank"><img
                            src="{{findObjectByPos($template,'about4')->value}}" alt="حوله ارس" title="حوله ارس"></a>
            </div>
        </div>
    </div>
@stop
@section('scriptsSection')
    <script type="application/ld+json">
{
  "@context": "https://schema.org/",
  "@type": "Person",
  "name": "حمید نصیرزاده",
  "url": "https://arts.nasirzadeh.com",
  "image": "{{App::isLocale('fa')?findObjectByPos($template,'selfieImageFa')->value:findObjectByPos($template,'selfieImage')->value}}",
  "sameAs": [
    "https://www.pinterest.com/artsnasirzadeh/",
    "https://www.instagram.com/arts.nasirzadeh/"
  ],
  "jobTitle": "نقاش، طراح گرافیک، کالیگرافیست و هنرمند ایرانی",
  "worksFor": {
    "@type": "Organization",
    "name": "کالیگرافی و خط نقاشی نصیرزاده | arts of nasirzadeh"
  }
}
</script>
    <script type="application/ld+json">
{
  "@context": "https://schema.org/",
  "@type": "BreadcrumbList",
  "itemListElement": [{
    "@type": "ListItem",
    "position": 1,
    "name": "کالیگرافی و خط نقاشی نصیرزاده",
    "item": "https://arts.nasirzadeh.com"
  },{
    "@type": "ListItem",
    "position": 2,
    "name": "بیوگرافی حمید نصیرزاده",
    "item": "https://arts.nasirzadeh.com/biography"
  }]
}
</script>

@stop