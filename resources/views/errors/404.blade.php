@php

    App::setLocale('fa');
@endphp
@extends('layouts.master')
@section('title', 'کالیگرافی ، نقاشی و خط نقاشی حمید نصیرزاده | صفحه یافت نشد')
@section('description','وب سایت رسمی نقاش، طراح گرافیک، کالیگرافیست و هنرمند ایرانی')
@section('headSection')
<style>
    .notFound{
        width:100%;
        height:500px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 30px;
        direction: rtl;
        font-family: yekanL;
    }
</style>


@stop
@section('bodySection')
    <div class="notFound">صفحه مورد نظر یافت نشد!</div>
@stop
@section('scriptsSection')


@stop