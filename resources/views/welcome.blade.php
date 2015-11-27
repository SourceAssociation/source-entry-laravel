@extends('layouts.app')

@section('title', "首页")

@section('content')

    <div class="uk-container">
        <div class="uk-container-center uk-panel-box site-closed">
            <div class="uk-panel uk-panel-header">
                @if (!$closed)
                    <h3 class="uk-panel-title uk-text-center">本站开启时间：
                        <time>{{ $start }} 至 </time>
                        <time>{{ $end }}</time>
                    </h3>
                    <div class="uk-text-left">{!! $notice !!}</div>
                @else
                    <h3 class="uk-panel-title uk-text-center">{{ $title }}</h3>
                    <div class="uk-text-left">{!! $description !!}</div>
                    <hr class="uk-panel-divider">
                    <div class="uk-margin-small-top uk-text-center">
                        <button class="uk-button login-btn" data-uk-modal="{target:'#login',center:true}">登录</button>
                    </div>
                @endif
            </div>
        </div>
    </div>

@stop
