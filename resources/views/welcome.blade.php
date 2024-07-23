@extends('public.layout.app')
@section('styles')
    <style>
        .animate-scroll-container {
            -webkit-mask: linear-gradient(90deg,
                    transparent,
                    white 20%,
                    white 80%,
                    transparent);
            mask: linear-gradient(90deg, transparent, white);

            .animate-scroll {
                animation: animate-scroll var(--animation_speed, 120s) infinite linear;

                &:hover {
                    animation-play-state: paused;
                }
            }

            .animate-scroll[data-speed='slow'] {
                --animation_speed: 120s
            }

            .animate-scroll[data-speed='medium'] {
                --animation_speed: 60s
            }

            .animate-scroll[data-speed='fast'] {
                --animation_speed: 20s
            }
        }

        @keyframes animate-scroll {
            to {
                transform: translate(calc(-50% - 0.8rem));
            }
        }
    </style>
@endsection
@section('content')
    <div id="home">
        @include('public._sections.banner', ['banner' => $homePage->banner])
        @include('public._sections.about')
        @include('public._sections.webinfo')
        @include('public._sections.our-programs')
        @include('public._sections.our-galleries')
        @include('public._sections.our-partners')
        @include('public._sections.work-process')
        @include('public._sections.contact')
    </div>
@endsection
@section('js')
    @vite('resources/js/public/aos-animation.js')
    @vite('resources/js/public/home.js')
@endsection
