@extends('layouts.avatar')

@section('header')
    <div class="uk-margin uk-text-contrast uk-text-center uk-flex uk-flex-center uk-flex-middle" data-uk-parallax="{bg: '-100'}" style="height: 240px; background-image: url(/img/center_bg.jpg); background-size: cover; background-position: 50% 50%; background-repeat: no-repeat;">
        <div class="uk-width-medium-1-2 uk-form">
            <h1 class="uk-text-contrast uk-margin-top uk-margin-bottom-remove">上传头像</h1>
            <p class="uk-text-contrast uk-text-small uk-margin-small-top uk-margin-bottom">
                上传你的头像，会让我们更好地认识你~~
            </p>
        </div>
    </div>
@stop

@section('content')
    <!-- 提示 -->
        <div class="uk-grid">
            <div class="uk-width-1-1 uk-text-center">
                <p class="padding-top-sm text-blue-depth-4">（默认图片为样张，请点击上传按钮上传自己的照片~）</p>
            </div>
        </div>
    <div id="crop-avatar">
        <form class="avatar-form" action="avatar" enctype="multipart/form-data" method="post">
            {{ csrf_field() }}
            <div class="uk-grid">
                <div class="avatar-body uk-width-1-1">
                    <!-- Upload image and data -->
                    <div class="avatar-upload">
                        <input type="hidden" class="avatar-src" name="avatar_src">
                        <input type="hidden" class="avatar-data" name="avatar_data">
                    </div>
                    <!-- Crop and preview -->
                    <div class="uk-grid">
                        <div class="uk-width-3-4">
                            <div class="avatar-wrapper">
                                <img class="avatar-img" src="/img/avatar.jpeg" alt="Avatar">
                            </div>
                        </div>
                        <div class="uk-width-1-4">
                            <div class="avatar-preview preview-lg"></div>
                            <div class="avatar-preview preview-md"></div>
                            <div class="avatar-preview preview-sm"></div>
                        </div>
                    </div>
                    <div class="uk-grid avatar-btns">
                        <div class="uk-width-1-1 uk-width-medium-3-4">
                            <div class="uk-margin-top-remove">
                                <div class="uk-button-group">
                                    <div class="uk-form-file">
                                        <button type="button" class="uk-button uk-button-primary uk-icon-upload"></button>
                                        <input type="file" class="avatar-input" id="avatarInput" name="avatar_file" accept="image/*">
                                    </div>
                                    <button type="button" class="uk-button uk-button-primary uk-icon-refresh" data-method="reset"></button>
                                </div>
                                <div class="uk-button-group">
                                    <button type="button" class="uk-button uk-button-primary uk-icon-arrows" data-method="setDragMode" data-option="move"></button>
                                    <button type="button" class="uk-button uk-button-primary uk-icon-crop" data-method="setDragMode" data-option="crop"></button>
                                </div>
                                <div class="uk-button-group">
                                    <button type="button" class="uk-button uk-button-primary uk-icon-check" data-method="crop"></button>
                                    <button type="button" class="uk-button uk-button-primary uk-icon-remove" data-method="clear"></button>
                                </div>
                                <div class="uk-button-group">
                                    <button type="button" class="uk-button uk-button-primary uk-icon-search-plus" data-method="zoom" data-option="0.1"></button>
                                    <button type="button" class="uk-button uk-button-primary uk-icon-search-minus" data-method="zoom" data-option="-0.1"></button>
                                </div>
                                <div class="uk-button-group">
                                    <button type="button" class="uk-button uk-button-primary uk-icon-arrow-left" data-method="move" data-option="-10" data-second-option="0"></button>
                                    <button type="button" class="uk-button uk-button-primary uk-icon-arrow-right" data-method="move" data-option="10" data-second-option="0"></button>
                                    <button type="button" class="uk-button uk-button-primary uk-icon-arrow-up" data-method="move" data-option="0" data-second-option="-10"></button>
                                    <button type="button" class="uk-button uk-button-primary uk-icon-arrow-down" data-method="move" data-option="0" data-second-option="10"></button>
                                </div>
                                <div class="uk-button-group">
                                    <button type="button" class="uk-button uk-button-primary uk-icon-arrows-h" data-method="scaleX" data-option="-1"></button>
                                    <button type="button" class="uk-button uk-button-primary uk-icon-arrows-v" data-method="scaleY" data-option="-1"></button>
                                </div>
                                <div class="uk-button-group">
                                    <button type="button" class="uk-button uk-button-primary" data-method="zoomTo" data-option="1">100%</button>
                                    <button type="button" class="uk-button uk-button-primary" data-method="rotateTo" data-option="180">180°</button>
                                </div>
                            </div>
                            <div class="uk-margin-small-top">
                                <div class="uk-button-group">
                                    <button type="button" class="uk-button uk-button-primary" data-method="rotate" data-option="-90" title="Rotate -90 degrees">Rotate Left</button>
                                    <button type="button" class="uk-button uk-button-primary" data-method="rotate" data-option="-15">-15°</button>
                                    <button type="button" class="uk-button uk-button-primary" data-method="rotate" data-option="-30">-30°</button>
                                    <button type="button" class="uk-button uk-button-primary" data-method="rotate" data-option="-45">-45°</button>
                                </div>
                                <div class="uk-button-group">
                                    <button type="button" class="uk-button uk-button-primary" data-method="rotate" data-option="90" title="Rotate 90 degrees">Rotate Right</button>
                                    <button type="button" class="uk-button uk-button-primary" data-method="rotate" data-option="15">15°</button>
                                    <button type="button" class="uk-button uk-button-primary" data-method="rotate" data-option="30">30°</button>
                                    <button type="button" class="uk-button uk-button-primary" data-method="rotate" data-option="45">45°</button>
                                </div>
                            </div>
                        </div>
                        <div class="uk-width-1-1 uk-width-medium-1-4">
                            <button type="submit" class="uk-button uk-button-primary uk-block avatar-save">保存</button>
                            <a href="{{ config('app.url').'/center' }}" class="uk-button uk-button-danger uk-block avatar-save">返回</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- Loading state -->
        <div class="loading" aria-label="Loading" role="img" tabindex="-1"></div>
    </div>
@stop