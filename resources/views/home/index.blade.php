@extends('layouts.front')

@section('content')

    @include('home.sections.baner')
    @include('home.sections.steps')
    @include('home.sections.prizes')

    @if($isEndContest)
        @if($isEndPromotion)
            @if($isEndResult)
{{--                todo: @include('home.sections.take-end-result')--}}
{{--                todo: @include('home.sections.winner-end-result')--}}
            @else
{{--                todo: @include('home.sections.take-end-promotion')--}}
{{--                todo: @include('home.sections.winner-end-promotion')--}}
            @endif
        @else
{{--            todo: @include('home.sections.take-end-contest')--}}
{{--            todo: @include('home.sections.winner-end-contest')--}}
        @endif
    @else
        @include('home.sections.take')
    @endif

    @include('home.sections.statute')
    @include('home.sections.applications')
    @include('home.sections.week')
    @include('home.sections.tips')
    @include('home.sections.products')
    @include('home.sections.contact')

@endsection
