@extends('layouts.master')

@section('page-title', 'Landing Page')

@section('plugin-styles')
    <link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@stop

@section('page-styles')
    <style>
        .slide-card {
            width: 320px;
            height: 123px;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 0;
            margin-bottom: 10px;
            overflow: hidden;
            transform: translateY(5px);
            transition: all 0.3s ease;
            position: relative;
            display: flex;
            flex-direction: column;
            display: flex;
            justify-content: center;
            align: center;
        }

        .slide-card:hover {
            transform: translateY(0px);
        }

        #btn-delete {
            position: absolute;
            top: 0;
            right: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
            transition: opacity 0.3s ease;
        }

        #btn-delete:hover {
            opacity: 0.8;
        }

    </style>
@stop

@section('content-header', 'Landing Page')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="card-title text-uppercase">Slider images</h3>
                        <a href="{{ route('slide-create') }}" class="btn btn-sm btn-primary">Add New</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="d-flex flex-column flex-md-row flex-md-wrap ">
                        @if ($slideImages->count() > 0)
                            @foreach ($slideImages as $slide)
                                <div class="slide-card mr-sm-3"
                                     style="background: url({{ asset('/images/' . $slide->image_path) }}) center/cover no-repeat padding-box">
                                    <button type="button" class="btn btn-danger" id="btn-delete" data-toggle="modal"
                                            data-target="#deleteModal" data-slide="{{ $slide->id }}">
                                        Delete
                                    </button>
                                </div>
                            @endforeach
                        @else
                            <div class="d-flex justify-content-center w-100">
                                <div class="alert alert-warning">
                                    <p class="text-center p-0 m-0">No slide images found.</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" id="studentLifePageList">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Landing page</h3>
                </div>

                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Title</th>
                            <th>Link</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $count = 0;
                        @endphp
                        @if($pages->count() > 0)
                            @foreach($pages as $page)
                                @php
                                    $count++;
                                @endphp
                                <tr>
                                    <td>{{ $count }}</td>
                                    <td>{{ ucwords($page->title) }}</td>
                                    <td>
                                        <a href="{{ config('app.front_url') }}/{{$page->category->name}}/{{ $page->path }}"
                                           target="_blank">{{ config('app.front_url') }}/{{$page->category->name}}/{{ $page->path }}</a>
                                    </td>
                                    <td class="text-right">
                                        <a href="{{ route('page-edit', $page->slug) }}" class="btn btn-sm btn-info @if($page->completed === 1) disabled @endif">
                                            <i class="far fa-edit mr-1"></i>Edit</a>
                                        {{--                                        <a href="{{ route('page-delete', $page->slug) }}" class="btn btn-sm btn-danger"><i class="far fa-trash-alt mr-1"></i>Delete</a>--}}
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('includes.modals.delete-modal')
@stop

@section('page-plugin')
    <!-- DataTables  & Plugins -->
    <script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/plugins/jszip/jszip.min.js')}}"></script>
    <script src="{{asset('assets/plugins/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{asset('assets/plugins/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
@stop

@section('page-scripts')
    <script>
        $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        var request = undefined;

        $('#deleteModal').on('show.bs.modal', function(evt) {
            var button = $(evt.relatedTarget);
            var slideId = button.data('slide');
            var modal = $(this);
            modal.find('#modalTitle').text('slide image');
            modal.find('#modalPrompt').text('slide image');

            modal.find('#modalDeleteBtn').on('click', function(e) {
                e.preventDefault();

                if (request) request.abort();

                blockPage();

                request = $.ajax({
                    url: '/delete-slide/' + slideId,
                    type: 'DELETE',
                });

                request.done(function(resp, textStatus) {
                    unBlockPage();
                    console.log(textStatus);
                    return;

                    if (textStatus == 'success') {
                        button.closest('.slide-card').remove();
                        modal.modal('hide');
                        toastAlert('Slide image deleted successfully.', 'Success', 'success');
                    } else {
                        toastAlert('Something went wrong.', 'Error', 'error');
                    }
                });

                request.fail(function(jqXHR, textStatus, errorMessage) {
                    unBlockPage();
                    toastAlert('Something went wrong.', 'Error', 'error');
                });
            });
        });
    </script>
@endsection
