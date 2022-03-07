@extends('layouts.master')

@section('page-title', 'Site setting')

@section('plugin-styles')
@stop

@section('page-styles')
    <style>
        .logo-placeholder img {
            width: 200px;
            height: auto;
        }
        .sponsor {
            position: relative;
            width: 150px;
        }
        .sponsor-image {
            width: 150px;
        }
        .tools {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            bottom: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            opacity: 0;
            transition: all 200ms ease-in;
            background-color: white;
        }
        .tools:hover {
            opacity: 0.9;
        }
    </style>
@stop

@section('content-header', 'Site setting')

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('site-setting-update-name') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Site display name</label>
                    <input
                        id="name"
                        class="form-control"
                        type="text"
                        name="name"
                        value="{{$setting->display_name ?? ''}}"
                    >
                </div>
                <div class="form-group">
                    <label for="name">Portal URL</label>
                    <input
                        id="portal"
                        class="form-control"
                        type="text"
                        name="portal_url"
                        value="{{$setting->portal_url ?? ''}}"
                    >
                </div>
                <div class="form-group">
                    <label for="name">Social Media Links</label>
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <input
                                id="portal"
                                class="form-control"
                                type="text"
                                name="facebook_url"
                                value="{{$setting->facebook_url ?? ''}}"
                                placeholder="{{$setting->facebook_url ?? 'Facebook'}}"
                            >
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <input
                                id="portal"
                                class="form-control"
                                type="text"
                                name="instagram_url"
                                value="{{$setting->instagram_url ?? ''}}"
                                placeholder="{{$setting->instagram_url ?? 'Instagram'}}"
                            >
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <input
                                id="twitter_url"
                                class="form-control"
                                type="text"
                                name="twitter_url"
                                value="{{$setting->twitter_url ?? ''}}"
                                placeholder="{{$setting->twitter_url ?? 'Twitter'}}"
                            >
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name">Phone Numbers</label>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <input
                                id="primary_section_phone"
                                class="form-control"
                                type="text"
                                name="primary_section_phone"
                                value="{{$setting->primary_section_phone ?? ''}}"
                                placeholder="{{$setting->primary_section_phone ?? 'Primary Section Phone'}}"
                            >
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <input
                                id="secondary_section_phone"
                                class="form-control"
                                type="text"
                                name="secondary_section_phone"
                                value="{{$setting->secondary_section_phone ?? ''}}"
                                placeholder="{{$setting->secondary_section_phone ?? 'Secondary Section Phone'}}"
                            >
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="name">School Email</label>
                        <input
                            id="school_email"
                            class="form-control"
                            type="text"
                            name="school_email"
                            value="{{$setting->school_email ?? ''}}"
                        >
                    </div>
                    <div class="form-group">
                        <label for="name">School Address</label>
                        <input
                            id="school_address"
                            class="form-control"
                            type="text"
                            name="school_address"
                            value="{{$setting->school_address ?? ''}}"
                        >
                    </div>
                    <div class="form-group">
                        <label for="summernote">About The Lagoon School</label>
                        <textarea id="summernote" name="content" class="editor-height" placeholder="About The Lagoon School"></textarea>
                    </div>

                </div>
                <div>
                    <button class="btn btn-sm btn-info" type="submit" id="saveSetting">Save</button>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('site-setting-update-logo') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="logo">Logo</label><br/>
                    <input accept="image/*" class="d-none" id="logo" type="file" name="logo">
                    <button class="btn btn-sm btn-info" id="logoSelect" type="button">
                        @if(!!$setting->logo) Change @else Select @endif logo
                    </button>
                    <span class="text-info ml-3">Max size: 1MB</span>
                </div>
                <div class="logo-placeholder py-3" id="logo-placeholder">
                    <img
                        src="@if(!!$setting->logo) /images/{{ $setting->logo }} @endif"
                        alt="current logo"
                        class="@if(!$setting->logo) d-none @endif"
                    >
                </div>
                <div>
                    <button class="btn btn-sm btn-info" type="submit" id="saveLogo">Save</button>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Sponsors</h4>
                <a href="{{route('sponsors-create')}}" class="btn btn-sm btn-info">Add new</a>
            </div>
        </div>
        <div class="card-body">
            @if($sponsors->count() > 0)
                <div class="form-group">
                    <label>
                        <input type="checkbox" id="toggleSponsorsDisplay" @if($setting->display_sponsors === 1) checked @endif> Display sponsors
                    </label>
                </div>
                @foreach($sponsors as $sponsor)
                    <div class="d-flex flex-row align-items-center">
                        <div class="sponsor">
                            <div><img src="{{ !!$sponsor->image ? '/images/' . $sponsor->image : '' }}" alt="" class="sponsor-image"></div>
                            <p class="text-center">{{$sponsor->name}}</p>
                            <div class="tools">
                                <a href="{{route('sponsors-delete', $sponsor->id)}}"><i class="fas fa-trash-alt"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="d-flex justify-content-center">
                    <b>No sponsors yet. Start by adding some</b>
                </div>
            @endif
        </div>
    </div>
@stop

@section('page-plugin')
@stop

@section('page-scripts')
    <script>
        var content = "{!! addcslashes($setting->about_school ?? '', '"') !!}";
        $('#summernote').summernote('pasteHTML', content).addClass('editor-height');

        var request = undefined;

        $('#logoSelect').on('click', function () {
            $('#logo').click()
        });

        $('#logo').on('change', function (evt) {
            if (evt.target.files[0]) {
                var imgSrc = URL.createObjectURL(evt.target.files[0]);
                $('#logo-placeholder').find('img').removeClass('d-none').attr('src', imgSrc);
            }
        });

        $('#toggleSponsorsDisplay').on('change', function () {
            if (request) {
                request.abort();
            }
            request = $.ajax({
                url: '/sponsors/toggle-display',
                dataType: 'json'
            });
            request.done(function (res) {
                console.log('Request operation response - ', res);
            });
            request.fail(function (_, __, errMsg) {
                console.log('Network request failed with the following error - ', errMsg);
            })
        });
    </script>
@endsection
