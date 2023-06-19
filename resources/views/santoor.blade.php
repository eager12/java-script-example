@extends('layouts.master')
@section('title', App::isLocale('fa') ? 'کالیگرافی ، نقاشی و خط نقاشی حمید نصیرزاده | سنتور' : 'Arts Of Nasirzadeh')
@section('description', 'Hamid Nasirzadeh')
@section('headSection')
    <link rel="alternate" hreflang="en" href="https://arts.nasirzadeh.com/en/santoor">
    <link rel="alternate" href="https://arts.nasirzadeh.com/santoor" hreflang="x-default">
    <link rel="canonical" href="https://arts.nasirzadeh.com/santoor">

    <style>
        .galleryHeader {
            background-image: url('{{ findObjectByPos($template, 'santoorHeader')->value }}');
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
                    {{ __('site.santoor') }}
                </h3>
                <p> {{ __('site.santoor') }}</p>
                {{--         <p> </p> --}}
            </div>
            <div class="galleryPageItemsContainer">
                @foreach ($products as $product)
                    @php
                        $json = json_decode($product->meta);
                    @endphp
                    <a title="{{ $json->pName }}"
                        href="{{ App::isLocale('en') ? '/en' : '' }}/santoor/{{ $product->id }}/{{ str_replace(' ', '-', $product->name) }}"
                        class="galleryPageItem">
                        <div class="galleryPageItemImage">
                            <img src="{{ $product->image }}" alt="ساز سنتور با عنوان {{ $json->pName }}"
                                title="ساز سنتور با عنوان {{ $json->pName }}">
                        </div>
                        <div class="galleryPageItemData">
                            <p>{{ __('site.santoor_name') }}
                                : {{ App::isLocale('fa') ? $json->pName ?? '' : $product->name }}</p>
                            <p>{{ __('site.santoorType') }}
                                : {{ App::isLocale('fa') ? $json->pInstrumentType ?? '' : $product->instrumentType }}</p>
                            <p>{{ __('site.woodType') }}
                                : {{ App::isLocale('fa') ? $json->pWoodType ?? '' : $product->WoodType }}</p>
                            <p>{{ __('site.buildDate') }}
                                : {{ App::isLocale('fa') ? $json->pBuildDate ?? '' : $product->buildDate }}</p>
                            <p>{{ __('site.price') }}: {{ number_format($product->price) }} {{__('site.toman')}} </p>
                            <p>{{ __('site.saleState') }}
                                : {{ $product->selled?__('site.saled'): __('site.notSaled') }}
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
    "name": "سنتور",
    "item": "https://arts.nasirzadeh.com/santoor"
  }]
}

    </script>

@stop
