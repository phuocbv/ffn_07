@extends('layouts.user.app')
@section('title')
    @lang('user.player_info')
@stop
@section('content')
    <h1 class='page-header'></h1>
    <ol class='breadcrumb'>
        <li><a href="{{ route('home') }}">@lang('text.home_title')</a></li>
        @if ($player)
            <li>
                <a href="{{ route('team.show', $player->team->id) }}">
                    {{ $player->team->name }}
                </a>
            </li>
            <li>
                <a href="{{ route('player.show', $player->id) }}">
                    {{ $player->name }}
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
            @if ($player)
                <h2 class='title-player-info'><b>
                    @lang('user.player_info')
                </b></h2>
                <div class='form-group'>
                    {!! Form::label('name', 'Player Name:') !!}
                    {!! Form::label('playerName', $player->name) !!}
                </div>
                <div class='form-group'>
                    {!! Form::label(null, 'Player Info:') !!}
                    {!! Form::label('playerInfo', $player->introduction) !!}
                </div>
                <div class='form-group'>
                    {!! Form::label(null, 'Position:') !!}
                    {!! Form::label('position', $player->position->name) !!}
                </div>
                <div class='form-group'>
                    {!! Form::label(null, 'Birthday:') !!}
                    {!! Form::label('birthday', $player->birthday) !!}
                </div>
                <div class='form-group'>
                    {!! Form::label(null, 'Team:') !!}
                    {!! Form::label('team', $player->team->name) !!}
                </div>
                <div class='form-group'>
                    {!! Form::label(null, 'Country:') !!}
                    {!! Form::label('country', $player->country->name) !!}
                </div>
                <div class='form-group'>
                    {!! Form::label(null, 'Avatar:') !!}
                    @if ($player->avatar)
                        {!! Html::image($player->avatar, null, ['class' => 'img-circle', 'id' => 'avatar', 'width' => '200', 'height' => '200']) !!}
                    @endif
                </div>
            @endif
        </div>
        <div class='col-lg-3 col-sm-12 col-md-3 col-xs-12'>
            @include('user.news.readest_news')
        </div>
    </div>
@stop
