@extends('layouts.master')
@section('title', App::isLocale('fa')?'کالیگرافی ، نقاشی و خط نقاشی حمید نصیرزاده':'Arts Of Nasirzadeh')
@section('description', App::isLocale('fa')?'وب سایت رسمی نقاش، طراح گرافیک، کالیگرافیست و هنرمند ایرانی':'Hamid Nasirzadeh')
@section('headSection')
    <link rel="alternate" hreflang="en" href="https://arts.nasirzadeh.com/en">
    <link rel="alternate" href="https://arts.nasirzadeh.com/" hreflang="x-default">
    <link rel="canonical" href="https://arts.nasirzadeh.com">

    <style>

        .resBgFixed {
            position: fixed;
            background-image: @if(App::isLocale('fa')) url("{{findObjectByPos($template,'bodyBgFa')->value}}") @else url("{{findObjectByPos($template,'bodyBg')->value}}") @endif;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            width: 100vw;
            height: 100vh;
            z-index: -1;
        }
    </style>


@stop
@section('bodySection')
    <div class="intro">
        <img src="/images/introPattern.svg" alt="گالیگرافی حمید نصیرزاده" title="گالیگرافی حمید نصیرزاده">
        <div class="introContent">
            <p>
                {{__('site.official_site_of')}}
                <br/>
                {{__('site.owner_description')}}
            </p>
            <h2>
                {{__('site.hamid')}}
                <br/>
                {{__('site.nasirzadeh')}}
            </h2>
            <div class="portfolioBtn" onclick="window.location.href=@if(App::isLocale('fa'))'/gallery' @else '/en/gallery' @endif ">
                {{__('site.gallery')}}
            </div>

        </div>
    </div>
    <div class="homepageDivider">
    </div>
    <div class="homepageRecentWorksContainer">
        <div class="recentWorks">
            <h3>{{__('site.recent_works')}}</h3>
            <div class="recentWorkItemsContainer">
                <div><a title="آثار اخیر" href="@if(App::isLocale('fa'))'/gallery' @else '/en/gallery' @endif"><img src="{{findObjectByPos($template,'recent1')->value}}" title="کالیگرافی های اخیر" alt="آثار اخیر"></a></div>
                <div><a title="آثار اخیر" href="@if(App::isLocale('fa'))'/gallery' @else '/en/gallery' @endif"><img src="{{findObjectByPos($template,'recent2')->value}}" title="کالیگرافی های اخیر" alt="کالیگرافی های اخیر"></a></div>
                <div><a title="آثار اخیر" href="@if(App::isLocale('fa'))'/gallery' @else '/en/gallery' @endif"><img src="{{findObjectByPos($template,'recent3')->value}}" title="کالیگرافی های اخیر" alt="خط نقاشی های اخیر"></a></div>
            </div>
        </div>
    </div>
    <div class="selfInterviewSection">
        <h1>
            {{__('site.name_of_owner')}}
            <br/>
            {{__('site.owner_description')}}
        </h1>
    </div>
    <div class="canvasSection">
        <div class="canvasTitle">
            <h3>
                {{__('site.canvas')}}
            </h3>
            <p>{{__('site.canvas')}}</p>
            <p>{{__('site.selected_canvas')}}</p>
        </div>
        <div class="canvasItemsContainer">
            <div><img  alt="گالیگرافی حمید نصیرزاده" title="گالیگرافی حمید نصیرزاده" src="{{findObjectByPos($template,'canvas1')->value}}" alt=""></div>
            <div><img  alt="گالیگرافی حمید نصیرزاده" title="گالیگرافی حمید نصیرزاده" src="{{findObjectByPos($template,'canvas2')->value}}" alt=""></div>
            <div><img  alt="گالیگرافی حمید نصیرزاده" title="گالیگرافی حمید نصیرزاده" src="{{findObjectByPos($template,'canvas3')->value}}" alt=""></div>
            <div><img  alt="گالیگرافی حمید نصیرزاده" title="گالیگرافی حمید نصیرزاده" src="{{findObjectByPos($template,'canvas4')->value}}" alt=""></div>
            <div><img  alt="گالیگرافی حمید نصیرزاده" title="گالیگرافی حمید نصیرزاده" src="{{findObjectByPos($template,'canvas5')->value}}" alt=""></div>
            <div><img  alt="گالیگرافی حمید نصیرزاده" title="گالیگرافی حمید نصیرزاده" src="{{findObjectByPos($template,'canvas6')->value}}" alt=""></div>
            <div><img  alt="نقاشی خط حمید نصیرزاده" title="نقاشی خط حمید نصیرزاده" src="{{findObjectByPos($template,'canvas7')->value}}" alt=""></div>
            <div><img  alt="نقاشیخط حمید نصیرزاده" title="نقاشیخط حمید نصیرزاده" src="{{findObjectByPos($template,'canvas8')->value}}" alt=""></div>
            <div><img  alt="نقاشی حمید نصیرزاده" title="نقاشی حمید نصیرزاده" src="{{findObjectByPos($template,'canvas9')->value}}" alt=""></div>
            <div><img  alt="خط نقاشی حمید نصیرزاده" title="خط نقاشی حمید نصیرزاده" src="{{findObjectByPos($template,'canvas10')->value}}" alt=""></div>

        </div>
    </div>
    <div class="blogSection">
        <div class="homeBlogItemsContainer">
            <div>
                <h2>{{__('site.recent_events')}}</h2>
                <a title="همه رویداد ها" href="@if(App::isLocale('fa'))  /events @else /en/events @endif">{{__('site.view_all_events')}}</a>
            </div>
            @foreach($events as $event)
                @php
                    $json = json_decode($event->meta);
                @endphp
                <a title="{{$event->title}}" href=" {{App::isLocale('en')?'/en':''}}/events/{{$event->id}}/{{str_replace(' ','-',$event->title)}}">
                    <h3>
                        {{App::isLocale('fa')?$json->pTitle??'':$event->title}}
                    </h3>
                    <div class="eventInfo">
                        <div>
                            <i class="fa fa-user"></i>
                            <p>{{App::isLocale('fa')?$json->pPlace??'':$event->place}}</p>
                        </div>
                        <div>
                            <i class="fa fa-clock"></i>
                            <p>{{App::isLocale('fa')?enToFa(jDate($event->done_at)->format('%d %B %Y')):\Carbon\Carbon::parse($event->done_at)->format('d M Y')}}</p>
                        </div>
                    </div>
                </a>
            @endforeach
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

@stop