<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        {!! \Artesaos\SEOTools\Facades\SEOTools::generate() !!}
        <title>{{ $title ?? 'Page Title' }}</title>
        <link rel="stylesheet" href="{{ asset('/assets/plugins/global/plugins.bundle.css') }}">
        <link rel="stylesheet" href="{{ asset('/assets/css/style.bundle.css') }}">
        @livewireStyles
        @vite(['resources/css/app.css'])
        @yield("styles")
        @stack("styles")
    </head>
    <body id="body" class="header-fixed header-tablet-and-mobile-fixed bgi-no-repeat bgi-position-y-top bgi-size-cover w-100 h-350px" style="background-image: url({{ asset('/storage/wall/default.png') }})">

        <div class="d-flex flex-column flex-root">
            <div class="page d-flex flex-row flex-column-fluid">
                <div class="wrapper d-flex flex-column flex-row-fluid" id="wrapper">
                    <x-layouts.includes.header />
                    <div class="toolbar py-5 pb-lg-15 bg-opacity-75" id="toolbar">
                        <div id="toolbar_container" class="container-xxl d-flex flex-stack flex-wrap"></div>
                    </div>
                    <div id="content_container" class="h-auto d-flex flex-column-fluid align-items-start container-xxl bg-white rounded-4 bot-mask bg-mask">
                        <div id="content" class="content flex-row-fluid h-auto my-10">
                            @if(isset($slot))
                                {{ $slot }}
                            @else
                                @yield("content")
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
            <i class="ki-duotone ki-arrow-up">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="{{ asset('/assets/plugins/global/plugins.bundle.js') }}" defer></script>
        <script src="{{ asset('/assets/js/scripts.bundle.js') }}"></script>
        @livewireScripts
        @vite(['resources/js/app.js'])
        <x-livewire-alert::scripts />
        <x-livewire-alert::flash />
        <x:pharaonic-tagify::scripts />
        <x:pharaonic-select2::scripts />
        @yield("scripts")
        @stack('scripts')
    </body>
</html>
