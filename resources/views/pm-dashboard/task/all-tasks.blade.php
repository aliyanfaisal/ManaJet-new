@extends('layouts.superadmin_app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @php
              $title= "All ".(isset($_GET['status']) ? $_GET['status'] : '')." Tasks";
            @endphp
            <x-card :title="$title" classes="border border-info">
                <div class="row">

                    <div class="col-md-3">
                        <form class="needs-validation" novalidate="" method="post">

                            <x-card title="Tasks expiring soon" classes="border border-info"    >
                                
                            </x-card>
                        </form>


                    </div>
                    <div class="table-responsive col-md-9">

                        <x-fancy-table>
                            <x-fancy-table-head>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Task Title</th>
                                    <th class="text-center">Project</th>
                                    <th class="text-center">Priority</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </x-fancy-table-head>

                            <x-fancy-table-body>
                                <tr>
                                    <td class="text-center text-muted">#1</td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper"> 
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-heading">Install Wordpress</div>
                                                    <div class="widget-subheading opacity-7" style="font-size: 12px">
                                                        <i class="fa fa-user"> Aliyan Faisal </i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
 

                                    <td class="text-center">
                                        <div class="badge badge-info">Aliyan's Website</div>
                                    </td>
 
                                    <td class="text-center">
                                        <div class="badge badge-success">Completed</div>
                                    </td>

                                    <td class="text-center">
                                        <button type="button" class="btn btn-primary btn-sm">
                                            View/Edit
                                        </button>

                                        <button type="button" class="btn btn-success btn-sm">
                                            Mark Complete
                                        </button>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="text-center text-muted">#1</td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper"> 
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-heading">Install Wordpress</div>
                                                    <div class="widget-subheading opacity-7" style="font-size: 12px">
                                                        <i class="fa fa-user"> Aliyan Faisal </i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
 

                                    <td class="text-center">
                                        <div class="badge badge-info">Aliyan's Website</div>
                                    </td>
 
                                    <td class="text-center">
                                        <div class="badge badge-success">Completed</div>
                                    </td>

                                    <td class="text-center">
                                        <button type="button" class="btn btn-primary btn-sm">
                                            View/Edit
                                        </button>

                                        <button type="button" class="btn btn-success btn-sm">
                                            Mark Complete
                                        </button>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="text-center text-muted">#2</td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper"> 
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-heading">Createa a contact Form</div>
                                                    <div class="widget-subheading opacity-7" style="font-size: 12px">
                                                        <i class="fa fa-user"> Saira</i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
 

                                    <td class="text-center">
                                        <div class="badge badge-info">lingo lad</div>
                                    </td>
 
                                    <td class="text-center">
                                        <div class="badge badge-success">penfing</div>
                                    </td>

                                    <td class="text-center">
                                        <button type="button" class="btn btn-primary btn-sm">
                                            View/Edit
                                        </button>

                                        <button type="button" class="btn btn-success btn-sm">
                                            Mark Complete
                                        </button>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="text-center text-muted">#3</td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper"> 
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-heading">Build landing page</div>
                                                    <div class="widget-subheading opacity-7" style="font-size: 12px">
                                                        <i class="fa fa-user"> Aliyan Faisal </i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
 

                                    <td class="text-center">
                                        <div class="badge badge-info">UrbanSofts website</div>
                                    </td>
 
                                    <td class="text-center">
                                        <div class="badge badge-success">Completed</div>
                                    </td>

                                    <td class="text-center">
                                        <button type="button" class="btn btn-primary btn-sm">
                                            View/Edit
                                        </button>

                                        <button type="button" class="btn btn-success btn-sm">
                                            Mark Complete
                                        </button>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="text-center text-muted">#4</td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper"> 
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-heading">Ui Ux Designing</div>
                                                    <div class="widget-subheading opacity-7" style="font-size: 12px">
                                                        <i class="fa fa-user"> zeshan </i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
 

                                    <td class="text-center">
                                        <div class="badge badge-info">Aliyan's Website</div>
                                    </td>
 
                                    <td class="text-center">
                                        <div class="badge badge-success">Pending</div>
                                    </td>

                                    <td class="text-center">
                                        <button type="button" class="btn btn-primary btn-sm">
                                            View/Edit
                                        </button>

                                        <button type="button" class="btn btn-success btn-sm">
                                            Mark Complete
                                        </button>
                                    </td>
                                </tr>
                            </x-fancy-table-body>
                        </x-fancy-table>
                    </div>


                </div>
            </x-card>
        </div>
    </div>



@endsection

@section("js")
<x-hide-sidebar-on-load></x-hide-sidebar-on-load>
@endsection