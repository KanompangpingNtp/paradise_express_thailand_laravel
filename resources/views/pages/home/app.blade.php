@extends('layout.app')
@section('title', 'Paradise Express')
@section('content')
    <style>
        .section-3 {
            position: relative;
            /* เพื่อให้สามารถใช้ z-index */
            z-index: 2;
        }

        .section-4 {
            position: relative;
            z-index: 1;
            /* ให้ section-4 อยู่ด้านล่าง */
        }
        .section-5 {
            position: relative;
            z-index: 1;
            /* ให้ section-4 อยู่ด้านล่าง */
        }
    </style>
    @include('pages.home.sections.section-1')
    @include('pages.home.sections.section-2')
    <div class="section-3">
        @include('pages.home.sections.section-3')
    </div>
    <div class="section-4">
        @include('pages.home.sections.section-4')
    </div>
    <div class="section-5">
        @include('pages.home.sections.section-5')
    </div>

    @include('pages.home.sections.section-6')
    @include('pages.home.sections.section-7')

@endsection
