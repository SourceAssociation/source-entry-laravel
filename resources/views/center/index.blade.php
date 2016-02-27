@extends('layouts.center')

@section('name', $user->name)
@section('email', $user->email)

@section('header')
    <div class="uk-margin uk-text-contrast uk-text-center uk-flex uk-flex-center uk-flex-middle" data-uk-parallax="{bg: '-200'}" style="height: 350px; background-image: url(/img/center_bg.jpg); background-size: cover; background-position: 50% 50%; background-repeat: no-repeat;">
        <div class="uk-width-medium-1-2 uk-form">
            <figure class="uk-border-rounded uk-overlay uk-overlay-hover">
                <img src="{{ $user->profile_img or 'img/placeholder_200x200.svg' }}" width="100" height="100" alt="头像">
                <figcaption class="uk-overlay-panel uk-overlay-background uk-overlay-icon"></figcaption>
            </figure>
            <h3 class="uk-margin-top uk-margin-bottom-remove">
                <input type="text" id="user_name" value="@yield('name', '姓名')" class="uk-text-contrast uk-form-blank uk-text-center">
            </h3>
            <p class="uk-text-small uk-margin-small-top uk-margin-bottom">
                <input type="email" id="user_email" value="@yield('email', '邮箱')" class="uk-text-contrast uk-form-blank uk-text-center uk-width-1-1">
            </p>
        </div>
    </div>
@stop

@section('content')

    <div class="uk-grid">
        <div class="uk-width-1-1">
            <p>{{ $user }}</p>
        </div>
    </div>

@stop