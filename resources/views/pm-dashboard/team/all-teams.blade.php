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
                                        <th class="text-center">Project Completed</th>
                                    </tr>
                                </x-fancy-table-head>
    
                                <x-fancy-table-body>
                                    <tr>
                                        <td class="text-center">
                                            <div class="badge badge-info">Website Development</div>
                                        </td>
     
                                        <td class="text-center">
                                            <div class="badge badge-success">Completed</div>
                                        </td>

                                    </tr>
                                </x-fancy-table-body>
                            </x-fancy-table>
                            <p class="mt-3 text-center" style="line-height: 24px"> 
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab ullam, dolorem esse dolores, voluptate atque sit cupiditate nulla nisi assumenda reprehenderit doloribus quam tempora in? Dolores eum numquam laudantium placeat.
                            </p>
                            
                        </x-card>
                    </div>

                    <div class="col-md-4">
                        <x-card title="Eagle Mobile Team">

                        </x-card>
                    </div>

                    <div class="col-md-4">
                        <x-card title="Web Team 2">

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
