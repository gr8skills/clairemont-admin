@extends('layouts.master')

@section('page-title')
    {{ ucwords($page->title ?? '') }}
@stop

@section('plugin-styles')
@stop

@section('page-styles')
@stop

@section('content-header')
    Edit {{ ucwords($page->title) }} page
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ ucwords($page->title ?? '') }}</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('page-edit', $page->slug) }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{ $page->title ?? '' }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <input type="text" class="form-control" id="category" readonly value="{{ ucwords($page->category->name) }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                                <div class="col-md-6">
                                    <label for="link">Relative Link</label>
                                    <input type="text" class="form-control" title="link" name="link" readonly value="{{ config('app.front_url') }}/{{$page->category->name}}/">
                                </div>
                                <div class="col-md-6">
                                    <label for="link">Path</label>
                                    <input type="text" class="form-control" title="link" name="link" value="{{$page->link}}" placeholder="{{$page->link?$page->link:'Path'}}">
                                </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="banner">Banner</label>
                                <input type="file" accept="image/*" class="form-control" id="banner" name="banner">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="footerImage">Footer image</label><br>
                                <input type="file" accept="image/*" class="form-control" id="footerImage" name="footerImage">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="summernote">Content</label>
                                <textarea id="summernote" name="content" class="editor-height-2"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="summernote2">Content2</label>
                                <textarea id="summernote2" name="content2" class="editor-height-2">
                                    {!! addcslashes($page->content2 ?? '', '"') !!}
                                </textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="summernote3">Content3</label>
                                <textarea id="summernote3" name="content3" class="editor-height-2">
                                    {!! addcslashes($page->content3 ?? '', '"') !!}
                                </textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="summernote4">Content4</label>
                                <textarea id="summernote4" name="content4" class="editor-height-2">
                                    {!! addcslashes($page->content4 ?? '', '"') !!}
                                </textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="summernote5">Content5</label>
                                <textarea id="summernote5" name="content5" class="editor-height-2">
                                    {!! addcslashes($page->content5 ?? '', '"') !!}
                                </textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="summernote6">Content6</label>
                                <textarea id="summernote6" name="content6" class="editor-height-2">
                                    {!! addcslashes($page->content6 ?? '', '"') !!}
                                </textarea>
                            </div>
                        </div>



                        <div class="mt-2 mb-5">
                            <button type="submit" class="btn btn-info">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('page-plugin')
@stop

@section('page-scripts')
    <script>
        var content = "{!! addcslashes($page->content ?? '', '"') !!}";
        {{--var content2 = "{!! addcslashes($page->content2 ?? '', '"') !!}";--}}
        {{--var content3 = "{!! addcslashes($page->content3 ?? '', '"') !!}";--}}
        {{--var content4 = "{!! addcslashes($page->content4 ?? '', '"') !!}";--}}
        {{--var content5 = "{!! addcslashes($page->content5 ?? '', '"') !!}";--}}
        {{--var content6 = "{!! addcslashes($page->content6 ?? '', '"') !!}";--}}
        $('#summernote').summernote('pasteHTML', content).addClass('editor-height');
        // $('#summernote2').summernote('pasteHTML', content2).addClass('editor-height-2');
        // $('#summernote3').summernote('pasteHTML', content3).addClass('editor-height-2');
        // $('#summernote4').summernote('pasteHTML', content4).addClass('editor-height-2');
        // $('#summernote5').summernote('pasteHTML', content5).addClass('editor-height-2');
        // $('#summernote6').summernote('pasteHTML', content6).addClass('editor-height-2');

        $('#bannerFileButton').on('click', function (evt) {
            $('#banner').click();
        });

        $('#footerFileButton').on('click', function (evt) {
            $('#footerImage').click();
        });
    </script>
@endsection
