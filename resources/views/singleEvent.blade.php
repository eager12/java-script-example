@php
    $json = json_decode($event->meta);
    $title = 'کالیگرافی نصیرزاده | '.$json->pTitle;
    $enTitle = 'Arts of nasirzadeh | '.$event->title;
    $description = 'برگزاری رویداد '.$json->pTitle.' در  '.$json->pPlace .' در تاریخ '.jDate($event->done_at)->format('%d %B %Y')

@endphp
@extends('layouts.master')
@section('title', App::isLocale('fa')?$title:$enTitle)
@section('description', $description)
@section('headSection')

    <link rel="alternate" hreflang="en"
          href="https://arts.nasirzadeh.com/en/events/{{$event->id}}/{{str_replace(' ','-',$event->title)}}">
    <link rel="alternate"
          href="https://arts.nasirzadeh.com/events/{{$event->id}}/{{str_replace(' ','-',$event->title)}}"
          hreflang="x-default">
    <link rel="canonical"
          href="https://arts.nasirzadeh.com/events/{{$event->id}}/{{str_replace(' ','-',$event->title)}}">

@stop
@section('bodySection')

    <div class="singleEventPageContainer">

        <h1>{{App::isLocale('fa')?$json->pTitle:$event->title}}</h1>
        <p>{{App::isLocale('fa')?jDate($event->done_at)->format('%d %B %Y'):\Carbon\Carbon::parse($event->done_at)->format('d M Y')}}</p>
        {{--        <img src="{{$event->banner}}" alt="">--}}
        <div class="eventBody">
            {!! $event->body !!}
            {!! App::isLocale('fa')?$event->pBody:'' !!}
            <p>{{__('site.eventHeld')}} {{App::isLocale('fa')?$json->pPlace:$event->place}}</p>
        </div>
    </div>
@stop
@section('scriptsSection')
    <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Event",
  "name": "{{App::isLocale('fa')?$json->pTitle:$event->title}}",
  "description": "{{__('site.eventHeld')}} {{App::isLocale('fa')?$json->pPlace:$event->place}}",
  "image": "{{$event->banner}}",
  "startDate": "{{\Carbon\Carbon::parse($event->done_at)->tz('Asia/Tehran')->toAtomString()}}",
  "endDate": "{{\Carbon\Carbon::parse($event->done_at)->addDays(1)->tz('Asia/Tehran')->toAtomString()}}",
  "eventStatus": "https://schema.org/EventScheduled",
  "eventAttendanceMode": "https://schema.org/OfflineEventAttendanceMode",
  "location": {
    "@type": "Place",
    "name": "{{App::isLocale('fa')?$json->pPlace:$event->place}}",
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "",
      "addressLocality": "Tehran",
      "postalCode": "",
      "addressCountry": "IR"
    }
  },
  "organizer": {
        "@type": "Organization",
        "name": "کالیگرافی نصیرزاده",
        "url": "https://arts.nasirzadeh.com"
   },
  "performer": {
    "@type": "PerformingGroup",
    "name": "{{App::isLocale('fa')?$json->pPlace:$event->place}}"
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
    "item": "https://arts.nasirzadeh.com/{{App::isLocale('en')?'en':''}}"
  },{
    "@type": "ListItem",
    "position": 2,
    "name": "رویداد ها",
    "item": "https://arts.nasirzadeh.com/events/{{App::isLocale('en')?'en':''}}"
  },
  {
    "@type": "ListItem",
    "position": 3,
    "name": "برگزاری رویداد {{$json->pTitle}} در  {{$json->pPlace}}
        در تاریخ {{jDate($event->done_at)->format('%d %B %Y')}}",
    "item": "https://arts.nasirzadeh.com/{{App::isLocale('en')?'en/':''}}events/{{$event->id}}
        /{{str_replace(' ','-',$event->title)}}"
  }]
}



    </script>

@stop