@extends('layouts.superadmin_app')

@section('content')
    <div class="container-fluid w-8">
        <div>
            <x-card title="Add a New User" tab1="<a href='{{route('users.index')}}' class='btn btn-primary '>All Users</a>" classes="border border-info">

                <div class="container-fluid px-md-5">


                    <form class="needs-validation row" novalidate="" method="post" enctype="multipart/form-data"
                        action="{{ route('users.store') }}">
                        @csrf
                        <div class="col-md-4 order-md-2 mb-4">

                            <x-card title="User Preview" classes="border border-info">
                                <div class="text-center">
                                    <img class="m-auto" src="{{ asset('assets/images/logo.png') }}" alt="">
                                    <b class="badge badge-info position-absolute"
                                        style="left: 7px; top: 70px;  font-size: 18px;" id="preview_budget">80000PKR</b>
                                    <h5 class="font-weight-bold my-3">Test User</h5>
                                    <hr>
                                    <div class="d-flex justify-content-between">
                                        <span><b class="badge badge-info" id="preview_cat">Website Development</b></span>
                                        <span><b class="badge badge-warning" id="preview_team">Team 1</b></span>
                                    </div>
                                </div>
                            </x-card>



                        </div>
                        <div class="col-md-8 order-md-1">

                            <x-display-errors />

                            <x-display-form-errors />
                            <h4 class="mb-3">User Details</h4>
                            <div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="name">User Name</label>
                                        <input type="text" class="form-control" name="name" id="name"
                                            placeholder="User Name" value="{{old('name')}}" required="">
                                        <div class="invalid-feedback">
                                            User name is required.
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">

                                        <label for="role_id">User Role</label>
                                        <select class="custom-select d-block w-100" name="role_id" id="role_id"
                                            required="">
                                            <option value="">Choose...</option>
                                            @foreach ($roles as $role)
                                                <option @if(old('role_id')==$role->id) selected @endif value="{{ $role->id }}">{{ $role->role_name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a Role.
                                        </div>


                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-md-6 mb-3">

                                        <label for="email">E-mail</label>
                                        <input type="email" class="form-control" id="email"
                                            placeholder="A vaild Email" value="{{old('email')}}" name="email" required="">
                                        <div class="invalid-feedback">
                                            Email field is required.
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="team_id">Team</label>
                                        <select name="team_id" class="custom-select d-block w-100" id="team_id">
                                            <option  value="">Choose...</option> 
                                            @foreach ($teams as $team)
                                                <option @if(old('team_id')==$team->id) selected @endif value="{{ $team->id }}">{{ $team->team_name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            Team is required.
                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-md-6 mb-3">
                                        <label for="phone">Phone</label>
                                        <input type="phone" name="phone" class="form-control" id="phone" placeholder="Phone Number"
                                            value="{{old('phone')}}" required="">
                                        <div class="invalid-feedback">
                                            Invalid Phone.
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="profile_picture">User Image</label>
                                        <input type="file" class=" form-control-file " name="profile_picture"
                                            id="profile_picture">
                                        <div class="invalid-feedback">
                                            Invalid Image.
                                        </div>
                                    </div>
                                </div>



                                <hr class="mb-4">
                                <button class="btn btn-primary btn-lg btn-block" type="submit">Save User</button>
                            </div>
                        </div>
                    </form>

                </div>

            </x-card>
        </div>
    </div>

    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
@endsection
