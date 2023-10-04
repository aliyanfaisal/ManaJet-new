@extends('layouts.superadmin_app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <x-card title="All Users" tab1="<a href='{{route('users.create')}}' class='btn btn-primary '>Add New User</a>">
                <div class="table-responsive">

                    <x-fancy-table>
                        <x-fancy-table-head>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Title</th>
                                <th class="text-center">User Name</th>
                                <th class="text-center">Role</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Phone</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </x-fancy-table-head>

                        <x-fancy-table-body>
                            <tr>
                                <td class="text-center text-muted">#347</td>
                                <td>
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left mr-3">
                                                <div class="widget-content-left">
                                                    <img width="40" class="rounded-circle"
                                                        src="assets/images/avatars/3.jpg" alt="">
                                                </div>
                                            </div>
                                            <div class="widget-content-left flex2">
                                                <div class="widget-heading">Ruben Tillman</div>
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td class="text-center">Berlin</td>

                                <td class="text-center">
                                    <div class="badge badge-info">Website Development</div>
                                </td>

                                <td class="text-center">
                                    
                                </td>
                                <td class="text-center">
                                    <div class="badge badge-success">Completed</div>
                                </td>

                                <td class="text-center">
                                    <button type="button"
                                        class="btn btn-primary btn-sm">
                                        View
                                    </button>

                                    <button type="button"
                                        class="btn btn-danger btn-sm">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        </x-fancy-table-body>
                    </x-fancy-table>
                </div>

            </x-card>
        </div>
    </div>
@endsection
