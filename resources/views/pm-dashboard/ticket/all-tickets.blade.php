@extends('layouts.superadmin_app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @php
              $title= "Recent Tickets";
            @endphp
            <x-card :title="$title" classes="border border-info">
                <div class="row">

                    <div class="col-md-6">
                            <x-card title="All Un-Solved Tickets" classes="border border-info">
                                <div class="table-responsive ">

                                    <x-fancy-table>
                                        <x-fancy-table-head>
                                            <tr>
                                                <th>Name</th>
                                                <th class="text-center">Project Name</th>
                                                <th class="text-center">Prioriry</th>
                                                <th class="text-center">Actions</th>
                                            </tr>
                                        </x-fancy-table-head>
            
                                        <x-fancy-table-body>
                                            <tr>
                                                <td>
                                                    <div class="widget-content p-0">
                                                        <div class="widget-content-wrapper"> 
                                                            <div class="widget-content-left flex2">
                                                                <div class="widget-heading">Contact Form not working</div>
                                                                <div class="widget-subheading opacity-7">Landing page contact form                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
             
            
                                                <td class="text-center">
                                                    <div class="badge badge-info">UrbanSofts Website</div>
                                                </td>
             
                                                <td class="text-center">
                                                    <div class="badge badge-warning">medium</div>
                                                </td>
            
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-primary btn-sm">
                                                        View/Edit
                                                    </button>
            
                                                    <button type="button" class="btn btn-danger btn-sm">
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>
                                                    <div class="widget-content p-0">
                                                        <div class="widget-content-wrapper"> 
                                                            <div class="widget-content-left flex2">
                                                                <div class="widget-heading">Error while installing</div>
                                                                <div class="widget-subheading opacity-7">Not installing on Oneplus 7                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
             
            
                                                <td class="text-center">
                                                    <div class="badge badge-info">Test Mobile App</div>
                                                </td>
             
                                                <td class="text-center">
                                                    <div class="badge badge-danger">high</div>
                                                </td>
            
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-primary btn-sm">
                                                        View/Edit
                                                    </button>
            
                                                    <button type="button" class="btn btn-danger btn-sm">
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>
                                        </x-fancy-table-body>
                                    </x-fancy-table>
                                </div>
                            </x-card>
                    </div>

                    <div class="col-md-6">
                        <x-card title="All Solved Tickets" classes="border border-info">
                            <div class="table-responsive ">

                              
                                <x-fancy-table>
                                    <x-fancy-table-head>
                                        <tr>
                                            <th>Name</th>
                                            <th class="text-center">Project Name</th>
                                            <th class="text-center">Prioriry</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </x-fancy-table-head>
        
                                    <x-fancy-table-body>
                                        <tr>
                                            <td>
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-wrapper"> 
                                                        <div class="widget-content-left flex2">
                                                            <div class="widget-heading">Renane title in UI ux</div>
                                                            <div class="widget-subheading opacity-7">From saira to saira shah                                                                </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
         
        
                                            <td class="text-center">
                                                <div class="badge badge-info">UrbanSofts Website</div>
                                            </td>
         
                                            <td class="text-center">
                                                <div class="badge badge-success">high</div>
                                            </td>
        
                                            <td class="text-center">
                                                <button type="button" class="btn btn-primary btn-sm">
                                                    View/Edit
                                                </button>
        
                                                <button type="button" class="btn btn-danger btn-sm">
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
            </x-card>
        </div>
    </div>

@endsection


@section("js")
<x-hide-sidebar-on-load></x-hide-sidebar-on-load>
@endsection