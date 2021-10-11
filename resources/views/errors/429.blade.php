@extends('errors::layout')

@section('title', __('Too Many Requests'))
@section('code', '429')
<div class="d-flex flex-column flex-center flex-column-fluid p-10">
    <img src="{{ asset('assets/media/illustrations/exclamation.svg')}}" alt="" class="mw-100 mb-10 h-lg-450px" />
    <!--end::Illustration-->
    <!--begin::Message-->
    <h1 class="fw-bold mb-10" style="color: #A3A3C7">You are not authorized to perform this action!</h1>
    <!--end::Message-->
    <!--begin::Link-->
    <a href="{{ route('dashboard') }}" class="btn btn-primary">Return Home</a>
    <!--end::Link-->
</div>
<!--end::Authentication - 404 Page-->