@extends('layouts.superadmin_app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <x-card title="All Projects" classes="border border-info">
                <div class="table-responsive">

                    <x-fancy-table>
                        <x-fancy-table-head>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Title</th>
                                <th class="text-center">Team</th>
                                <th class="text-center">Category</th>
                                <th class="text-center">Progress</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </x-fancy-table-head>

                        <x-fancy-table-body>
                            <tr>
                                <td class="text-center text-muted">#1</td>
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
                                                <div class="widget-heading">UrbanSofts website</div>
                                                <div class="widget-subheading opacity-7"> <b>A portfilio website</b>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td class="text-center">Team 1</td>

                                <td class="text-center">
                                    <div class="badge badge-info">Website Development</div>
                                </td>

                                <td class="text-center">
                                    <x-progress-card title="Income Targex" value="72" color="info" showCard="false">

                                    </x-progress-card>
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

                            <tr>
                                <td class="text-center text-muted">#1</td>
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
                                                <div class="widget-heading">Test Mobile App</div>
                                                <div class="widget-subheading opacity-7"> <b>An Android App</b>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td class="text-center">Team 1</td>

                                <td class="text-center">
                                    <div class="badge badge-info">Mobile Development</div>
                                </td>

                                <td class="text-center">
                                    <x-progress-card title="Income Targex" value="22" color="info" showCard="false">

                                    </x-progress-card>
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

                            <tr>
                                <td class="text-center text-muted">#3</td>
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
                                                <div class="widget-heading">A Test website</div>
                                                <div class="widget-subheading opacity-7"> <b>An e-commerce website</b>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td class="text-center">Team 1</td>

                                <td class="text-center">
                                    <div class="badge badge-info">Website Development</div>
                                </td>

                                <td class="text-center">
                                    <x-progress-card title="Income Targex" value="77" color="info" showCard="false">

                                    </x-progress-card>
                                </td>
                                <td class="text-center">
                                    <div class="badge badge-warning">Pending</div>
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
