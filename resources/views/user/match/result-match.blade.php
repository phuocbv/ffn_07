@extends('layouts.user.app')
@section('title')
    @lang('user.result')
@stop
@section('content')
    <h1 class='page-header'></h1>
    <ol class='breadcrumb'>
        <li><a href="{{ route('home') }}">@lang('text.home_title')</a></li>
        @if (count($matchs) > 0)
            <li>
                <a href="{{ route('showMatchResult', $matchs[0]->leagueSeason->league->id) }}">
                    {{ $matchs[0]->leagueSeason->league->name }}
                </a>
            </li>
            <li>
                <a href="{{ route('showMatchResult', $matchs[0]->leagueSeason->id) }}">
                    {{ $matchs[0]->leagueSeason->year }}
                </a>
            </li>
        @endif
    </ol>
    <hr>
    <div class='row'>
        <div class='col-md-2 col-lg-2 col-sm-3 col-xs-3'>
            @include('user.news.other-news')
        </div>
        <div class='col-lg-7 col-sm-9 col-md-7 col-xs-9'>    
            <h2 class='title-match-info'><b>@lang('user.football_result')</b></h2>
            <div>
                <ol class='breadcrumb'></ol>
            </div>
            @if (count($matchs) > 0)
                <div>@lang('user.league_season') {{ $matchs[0]->leagueSeason->year }}</div>
                <div class='space20'></div>
                <div class='col-md-12 col-lg-12 col-sm-12 col-xs-12'>
                    <table class='table table-bordered'>
                        <thead>
                            <tr>
                                <th class='center-text'>@lang('user.column_start_time')</th>
                                <th class='center-text'>@lang('user.column_end_time')</th>
                                <th colspan='3' class='center-text'>@lang('user.matches')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($matchs as $key => $element)
                                <tr>
                                    <td align='center'>{{ $element->start_time }}</td>
                                    <td align='center'>{{ ($element->status == 1) ? '---' : $element->end_time }}</td>
                                    <td align='center' width='15%'>
                                        <a href="{{ route('team.show', $element->findTeam($element->team1_id)->id) }}">
                                            {{ $element->findTeam($element->team1_id)->name }}
                                        </a>
                                    </td>
                                    <td align='center' class='color-red'>
                                        <div>{{ ($element->status == config('view.number_zero')) ? '?' : $element->team1_goal }} 
                                            - {{ ($element->status == config('view.number_zero')) ? '?' : $element->team2_goal }}</div>
                                        <div>{{ ($element->status == 1) ? Lang::get('user.updating') : '' }}</div>
                                    </td>
                                    <td align='center' width='15%'>
                                        <a href="{{ route('team.show', $element->findTeam($element->team2_id)->id) }}">
                                            {{ $element->findTeam($element->team2_id)->name }}
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
        <div class='col-lg-3 col-sm-12 col-md-3 col-xs-12'>
            @include('user.news.readest_news')
        </div>
    </div>
@stop
