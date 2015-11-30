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
    <div id="crop-avatar">
        <div class="avatar-view" title="Change the avatar">
            <img src="/img/avatar.jpeg" alt="Avatar">
        </div>
        <form class="avatar-form" action="crop.php" enctype="multipart/form-data" method="post">
            <div class="uk-grid">
                <div class="avatar-body uk-width-1-1">
                    <!-- Upload image and data -->
                    <div class="avatar-upload">
                        <input type="hidden" class="avatar-src" name="avatar_src">
                        <input type="hidden" class="avatar-data" name="avatar_data">
                        <div class="uk-form-file">
                            <button type="button" class="uk-button-file">选择头像</button>
                            <input type="file" class="avatar-input" id="avatarInput" name="avatar_file">
                        </div>
                    </div>
                    <!-- Crop and preview -->
                    <div class="uk-grid">
                        <div class="uk-width-3-4">
                            <div class="avatar-wrapper"></div>
                        </div>
                        <div class="uk-width-1-4">
                            <div class="avatar-preview preview-lg"></div>
                            <div class="avatar-preview preview-md"></div>
                            <div class="avatar-preview preview-sm"></div>
                        </div>
                    </div>
                    <div class="uk-grid avatar-btns">
                        <div class="uk-width-3-4">
                            <div class="uk-button-group">
                                <button type="button" class="uk-button uk-button-primary" data-method="rotate" data-option="-90" title="Rotate -90 degrees">Rotate Left</button>
                                <button type="button" class="uk-button uk-button-primary" data-method="rotate" data-option="-15">-15deg</button>
                                <button type="button" class="uk-button uk-button-primary" data-method="rotate" data-option="-30">-30deg</button>
                                <button type="button" class="uk-button uk-button-primary" data-method="rotate" data-option="-45">-45deg</button>
                            </div>
                            <div class="uk-button-group">
                                <button type="button" class="uk-button uk-button-primary" data-method="rotate" data-option="90" title="Rotate 90 degrees">Rotate Right</button>
                                <button type="button" class="uk-button uk-button-primary" data-method="rotate" data-option="15">15deg</button>
                                <button type="button" class="uk-button uk-button-primary" data-method="rotate" data-option="30">30deg</button>
                                <button type="button" class="uk-button uk-button-primary" data-method="rotate" data-option="45">45deg</button>
                            </div>
                        </div>
                        <div class="uk-width-1-4">
                            <button type="submit" class="uk-button uk-button-primary uk-block avatar-save">Done</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="uk-width-small-1-1 uk-width-medium-1-4"></div>

        <!-- Loading state -->
        <div class="loading" aria-label="Loading" role="img" tabindex="-1"></div>
    </div>
@stop