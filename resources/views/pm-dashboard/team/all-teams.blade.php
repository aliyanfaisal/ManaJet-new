@extends('layouts.superadmin_app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @php
                $title = 'All Teams';
            @endphp
            <x-card :title="$title">
                <div class="row">

                    <div class="col-md-4">
                        <x-card title='<b class=" fsize-2">Elite Web Team</b>' tab1='<b class="badge badge-info" id="preview_cat">Website Development</b>'>

                            <x-fancy-table>
                                <x-fancy-table-head>
                                    <tr>
                                        <th class="text-center">Team Lead</th>
                                        <th class="text-center">Projects Completed</th>
                                    </tr>
                                </x-fancy-table-head>
    
                                <x-fancy-table-body>
                                    <tr>
                                        <td class="text-center">
                                            <div class="badge badge-info">Aliyan Faisal</div>
                                        </td>
     
                                        <td class="text-center">
                                            <div class="badge badge-success">5</div>
                                        </td>

                                    </tr>
                                </x-fancy-table-body>
                            </x-fancy-table>
                            <p class="mt-3 text-center" style="line-height: 24px"> 
                                A web development team under aliya faisal
                            </p>
                            
                        </x-card>
                    </div>

                    <div class="col-md-4">
                        <x-card title="Eagle Mobile Team" tab1='<b class="badge badge-info" id="preview_cat">Graphics</b>'>
                            <x-fancy-table>
                                <x-fancy-table-head>
                                    <tr>
                                        <th class="text-center">Team Lead</th>
                                        <th class="text-center">Projects Completed</th>
                                    </tr>
                                </x-fancy-table-head>
    
                                <x-fancy-table-body>
                                    <tr>
                                        <td class="text-center">
                                            <div class="badge badge-info">Zeshan</div>
                                        </td>
     
                                        <td class="text-center">
                                            <div class="badge badge-success">2</div>
                                        </td>

                                    </tr>
                                </x-fancy-table-body>
                            </x-fancy-table>
                            <p class="mt-3 text-center" style="line-height: 24px"> 
                            Graphic designing team
                            </p>
                        </x-card>
                    </div>

                    <div class="col-md-4">
                        <x-card title="Web Team 2" tab1='<b class="badge badge-info" id="preview_cat">Website Development</b>'>
                            <x-fancy-table>
                                <x-fancy-table-head>
                                    <tr>
                                        <th class="text-center">Team Lead</th>
                                        <th class="text-center">Projects Completed</th>
                                    </tr>
                                </x-fancy-table-head>
    
                                <x-fancy-table-body>
                                    <tr>
                                        <td class="text-center">
                                            <div class="badge badge-info">Saira</div>
                                        </td>
     
                                        <td class="text-center">
                                            <div class="badge badge-success">3</div>
                                        </td>

                                    </tr>
                                </x-fancy-table-body>
                            </x-fancy-table>
                            <p class="mt-3 text-center" style="line-height: 24px"> 
                            Web Development team 2
                            </p>
                        </x-card>
                    </div>


                </div>
            </x-card>
        </div>
    </div>
@endsection


@section('js')
    <x-hide-sidebar-on-load></x-hide-sidebar-on-load>
@endsection
