@extends('layouts.superadmin_app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <x-card title="All User Roles">
                <div class="row">

                    <div class="col-md-4">
                        <form class="needs-validation" novalidate="" method="post"
                            action="{{ route('user-roles.store') }}">
                            @csrf
                            <x-card title="Add New Role">
                                <div class="">

                                    <x-display-errors />

                                    <x-display-form-errors />
                                    <div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="role_name">Role Name</label>
                                                <input type="text" class="form-control" name="role_name" id="role_name"
                                                    placeholder="Role Name" value="{{old('role_name')}}" required="">
                                                <div class="invalid-feedback">
                                                    Role name is required.
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">

                                                <label for="parent_id">Parent Role</label>
                                                <select class="custom-select d-block w-100" name="parent_id"
                                                    id="parent_id">
                                                    @php
                                                        $roles_dropdown = $roles->filter(function ($value, $key) {
                                                            if ($value->parent_id == '') {
                                                                return true;
                                                            }
                                                        });
                                                    @endphp
                                                    <option value="">Choose...</option>
                                                    @foreach ($roles_dropdown as $role)
                                                        <option @if(old("parent_id")==$role->id) selected @endif value="{{ $role->id }}">{{ $role->role_name }}</option>
                                                    @endforeach

                                                </select>
                                                <div class="invalid-feedback">
                                                    Invalid Parent Role.
                                                </div>


                                            </div>
                                        </div>

                                        <div>
                                            <label for="role_description">Role Description</label>
                                            <textarea required class="form-control mb-3" name="role_description" id="role_description" rows="5">{{old('role_description')}}</textarea>
                                        </div>

                                        <h6 class="mb-3">Role Status</h6>

                                        <div class="d-block my-3">
                                            <div class="custom-control custom-radio">
                                                <input id="status1" name="status" type="radio"
                                                    class="custom-control-input" checked value="active"  >
                                                <label class="custom-control-label" for="status1">Active</label>
                                            </div>
                                            
                                            <div class="custom-control custom-radio">
                                                <input id="status" name="status" type="radio"
                                                    class="custom-control-input" value="draft" >
                                                <label class="custom-control-label" for="status">Draft</label>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary btn-lg btn-block" type="submit">Add
                                            Role</button>


                                    </div>
                                </div>
                            </x-card>
                        </form>


                    </div>
                    <div class="table-responsive col-md-8">

                        <x-fancy-table>
                            <x-fancy-table-head>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Role Name</th>
                                    <th class="">Parent Role</th>
                                    <th class="">Description</th>
                                    <th class="">Actions</th>
                                </tr>
                            </x-fancy-table-head>

                            <x-fancy-table-body>
                                @php
                                    $i = isset($_GET['page']) ? intval($_GET['page']) : 0;
                                    $i++;
                                @endphp
                                @foreach ($roles as $role)
                                    <tr>
                                        <td class="text-center text-muted">#{{ $i }}</td>
                                        <td>
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left flex2">
                                                        <div class="widgtext-centeret-heading">{{ $role->role_name }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        @php
                                            $parentRole = $role->parentRole();
                                        @endphp

                                        <td class=" ">
                                            @if ($parentRole)
                                                <div class="badge badge-warning">{{ $parentRole->role_name }}</div>
                                            @endif
                                        </td>

                                        <td class=" ">
                                            <div class="widget-subheading opacity-7">
                                                {{ Illuminate\Support\Str::limit($role->role_description, 40) }}
                                            </div>
                                        </td>

                                        <td class=" ">
                                            <button type="button" class="btn btn-primary btn-sm">
                                                View/Edit
                                            </button>

                                            <button type="button" class="btn btn-danger btn-sm">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>

                                    @php
                                        $i++;
                                    @endphp
                                @endforeach
                            </x-fancy-table-body>
                        </x-fancy-table>
                    </div>


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
