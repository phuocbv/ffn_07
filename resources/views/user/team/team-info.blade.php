@extends('layouts.user.app')
@section('title')
    @lang('user.team_info')
@stop
@section('content')
    <h1 class='page-header'></h1>
    <ol class='breadcrumb'>
        <li><a href="{{ route('home') }}">@lang('text.home_title')</a></li>
        @if ($team)
            <li>
                <a href="{{ route('team.show', $team->id) }}">
                    {{ $team->name }}
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
            @if ($team)
                <h2 class='title-team-info'><b>
                    @lang('user.team_info')
                </b></h2>
                <div class='form-group'>
                    {!! Form::label('name', 'Team Name:') !!}
                    {!! Form::label('teamName', $team->name) !!}
                </div>
                <div class='form-group'>
                    {!! Form::label(null, 'Team Info:') !!}
                    {!! Form::label('teamName', $team->introduction, []) !!}
                </div>  
                <div class='form-group'>
                    {!! Form::label(null, 'Country:') !!}
                    {!! Form::label('teamName', $team->country->name) !!}
                </div>
                <div class='form-group'>
                    {!! Form::label(null, 'Logo:') !!}
                    @if ($team->logo)
                        {!! Html::image($team->logo, null, ['class' => 'img-circle', 'id' => 'avatar', 
                            'width' => '200', 'height' => '200']) !!}
                    @endif
                </div>
                <div class='col-md-12 col-lg-12 col-sm-12 col-xs-12'>
                    <table class='table table-bordered'>
                        <thead>
                            <tr>
                                <th align='center'>@lang('user.team_column_name')</th>
                                <th align='center'>@lang('user.team_columb_introduction')</th>
                                <th align='center'>@lang('user.team_column_position')</th>
                                <th align='center'>@lang('user.team_column_country')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($team->players as $key => $element)
                                <tr>
                                    <td align='center'><a href='{{ route('player.show', $element->id) }}'>{{ $element->name }}</a></td>
                                    <td align='center'>{{ $element->introduction }}</td>
                                    <td align='center'>{{ $element->position->name }}</td>
                                    <td align='center'>{{ $element->country->name }}</td>
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
