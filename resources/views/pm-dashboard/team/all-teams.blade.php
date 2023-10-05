@extends('layouts.superadmin_app')

@section('content')

<style>
    .badge{
        font-size: 100%
    }
</style>
    <div class="row">
        <div class="col-md-12">
            @php
                $title = 'All Teams';
            @endphp
            <x-card :title="$title">
                <div class="row">

                    @foreach ($teams as $team )
                    <div class="col-md-4">
                        <x-card title='<b class=" fsize-2">{{$team->team_name}}</b>' tab1='<b class="badge badge-info" id="preview_cat">{{$team->category->cat_name}}</b>'>

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
                                            <div class="badge badge-info" style="font-size:100%">{{$team->teamLead->name}}</div>
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
                    @endforeach
 

                </div>
            </x-card>
        </div>
    </div>
@endsection


@section('js')
    <x-hide-sidebar-on-load></x-hide-sidebar-on-load>
@endsection
