@extends('layouts.master')
@section('title', App::isLocale('fa') ? 'کالیگرافی ، نقاشی و خط نقاشی حمید نصیرزاده | آثار' : 'Arts Of Nasirzadeh')
@section('description', 'Hamid Nasirzadeh')
@section('headSection')
    <link rel="alternate" hreflang="en" href="https://arts.nasirzadeh.com/en/gallery">
    <link rel="alternate" href="https://arts.nasirzadeh.com/gallery" hreflang="x-default">
    <link rel="canonical" href="https://arts.nasirzadeh.com/gallery">

    <style>
        .galleryHeader {
            background-image: url('{{ findObjectByPos($template, 'galleryHeader')->value }}');
        }
    </style>
@stop
@section('bodySection')
    <div class="galleryHeader">

    </div>

    <div class="galleryPageContainer">

        <div>
            <div class="canvasTitle galleryPageTitle">
                <h3>
                    {{ __('site.gallery') }}
                </h3>
                <p> {{ __('site.gallery') }}</p>
                {{--         <p> </p> --}}
            </div>
            <div class="galleryPageItemsContainer">
                @foreach ($products as $product)
                    @php
                        $json = json_decode($product->meta);
                    @endphp
                    <a title="{{ $json->pName }}"
                        href="{{ App::isLocale('en') ? '/en' : '' }}/gallery/{{ $product->id }}/{{ str_replace(' ', '-', $product->name) }}"
                        class="galleryPageItem">
                        <div class="galleryPageItemImage">
                            <img src="{{ $product->image }}" alt="اثر خط نقاشی با عنوان {{ $json->pName }}"
                                title="اثر خط نقاشی با عنوان {{ $json->pName }}">
                        </div>
                        <div class="galleryPageItemData">
                            <p>{{ __('site.product_title') }}
                                : {{ App::isLocale('fa') ? $json->pName ?? '' : $product->name }}</p>
                            <p>{{ __('site.size') }}: {{ $json->size }}</p>
                            <p>{{ __('site.technique') }}
                                : {{ App::isLocale('fa') ? $json->pTechnique ?? '' : $json->technique }}</p>
                            <p>{{ __('site.perform_date') }}
                                : {{ App::isLocale('fa') ? $json->pPerformDate ?? '' : $json->performDate }}</p>
                            <p>{{ __('site.price') }}:@if ($product->price == 0)
                                    {{ __('site.saled') }} @else{{ number_format($product->price) }}
                                    {{ __('site.toman') }}
                                @endif
                            </p>
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
    "name": "آثار",
    "item": "https://arts.nasirzadeh.com/gallery"
  }]
}

    </script>

@stop
