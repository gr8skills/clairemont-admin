<div class="modal fade" id="userDetailModal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">User Detail</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-3">
                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle"
                                         src="{{asset('assets/dist/img/user4-128x128.jpg')}}"
                                         alt="User profile picture">
                                </div>

                                <h3 class="profile-username text-center"></h3>

                                <p class="text-muted text-center profile-email">N/A</p>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Phone</b> <a class="float-right profile-phone">N/A</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Qualification</b> <a class="float-right profile-qualification">N/A</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Country</b> <a class="float-right profile-country">N/A</a>
                                    </li>
                                </ul>

                                <a href="#" class="btn btn-block profile-status"><b></b></a>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="card">
                            <div class="card-header p-2">
                                <div class="d-flex justify-content-between">
                                    <h3 class="card-title">Update user's info</h3>
                                    <button class="btn btn-info btn-sm" id="editButton"><i class="far fa-edit mr-2"></i>Edit
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <form class="form-horizontal">
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputName" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="inputEmail"
                                                   placeholder="Email">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputPhone" class="col-sm-2 col-form-label">Phone</label>
                                        <div class="col-sm-10">
                                            <input type="tel" class="form-control" id="inputPhone" placeholder="Email">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-info" id="formSubmitButton">Submit
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                {{--                <button type="button" class="btn btn-primary">Save changes</button>--}}
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
