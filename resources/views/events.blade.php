@extends('layouts.master')
@section('title', App::isLocale('fa')?'کالیگرافی ، نقاشی و خط نقاشی حمید نصیرزاده | رویداد ها':'Arts Of Nasirzadeh')
@section('description', 'Hamid Nasirzadeh')
@section('headSection')
    <link rel="alternate" hreflang="en" href="https://arts.nasirzadeh.com/en/events">
    <link rel="alternate" href="https://arts.nasirzadeh.com/events" hreflang="x-default">
    <link rel="canonical" href="https://arts.nasirzadeh.com/events">

    <style>
        .eventsHeader{
            background-image: url('{{findObjectByPos($template,'eventsHeader')->value}}');
        }

    </style>

@stop
@section('bodySection')
    <div class="eventsHeader">

    </div>

    <div class="eventsPageContainer">

        <div>
            <div class="canvasTitle eventPageTitle">
                <h3>
                    {{ __('site.events') }}
                </h3>
                <p>{{ __('site.events') }}</p>
                {{--         <p> </p>--}}
            </div>
            <div class="eventPageItemsContainer">
                @foreach($events as $event)
                    @php
                        $json = json_decode($event->meta);
                    @endphp
                    <a title="{{$event->title}}" href="{{App::isLocale('en')?'/en':''}}/events/{{$event->id}}/{{str_replace(' ','-',$event->title)}}">
                        <div class="eventPageItem">
                            <div class="eventPageItemImage">
                                <img src="{{$event->banner}}" alt="{{$json->pTitle}}" title="{{$json->pTitle}}">
                            </div>
                            <div class="eventPageItemData">
                                <p>{{ __('site.product_title') }}: {{App::isLocale('fa')?$json->pTitle??'':$event->title}}</p>
                                <p>{{ __('site.place') }}: {{App::isLocale('fa')?$json->pPlace??'':$event->place}}</p>
                                <p>{{ __('site.date') }}: {{App::isLocale('fa')?jDate($event->done_at)->format('%d %B %Y'):\Carbon\Carbon::parse($event->done_at)->format('d M Y')}}</p>
                            </div>
                        </div>
                    </a>

                @endforeach
            </div>
        </div>
    </div>
@stop
@section('scriptsSection')
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
    "name": "رویداد ها",
    "item": "https://arts.nasirzadeh.com/events"
  }]
}
</script>

@stop