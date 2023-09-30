@extends('layouts.superadmin_app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @php
              $title= "Recent Tickets";
            @endphp
            <x-card :title="$title">
                <div class="row">

                    <div class="col-md-6">
                            <x-card title="All Un-Solved Tickets">
                                <div class="table-responsive ">

                                    <x-fancy-table>
                                        <x-fancy-table-head>
                                            <tr>
                                                <th>Name</th>
                                                <th class="text-center">Parent Category</th>
                                                <th class="text-center">Description</th>
                                                <th class="text-center">Actions</th>
                                            </tr>
                                        </x-fancy-table-head>
            
                                        <x-fancy-table-body>
                                            <tr>
                                                <td>
                                                    <div class="widget-content p-0">
                                                        <div class="widget-content-wrapper"> 
                                                            <div class="widget-content-left flex2">
                                                                <div class="widget-heading">Ruben Tillman</div>
                                                                <div class="widget-subheading opacity-7">Etiam sit amet orci eget
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
             
            
                                                <td class="text-center">
                                                    <div class="badge badge-info">Website Development</div>
                                                </td>
             
                                                <td class="text-center">
                                                    <div class="badge badge-success">Completed</div>
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
                        <x-card title="All Solved Tickets">
                            <div class="table-responsive ">

                                <x-fancy-table>
                                    <x-fancy-table-head>
                                        <tr>
                                            <th>Name</th>
                                            <th class="text-center">Parent Category</th>
                                            <th class="text-center">Description</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </x-fancy-table-head>
        
                                    <x-fancy-table-body>
                                        <tr>
                                            <td>
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-wrapper"> 
                                                        <div class="widget-content-left flex2">
                                                            <div class="widget-heading">Ruben Tillman</div>
                                                            <div class="widget-subheading opacity-7">Etiam sit amet orci eget
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
         
        
                                            <td class="text-center">
                                                <div class="badge badge-info">Website Development</div>
                                            </td>
         
                                            <td class="text-center">
                                                <div class="badge badge-success">Completed</div>
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