@extends('layouts.superadmin_app')

@section('content')
    <div class="container-fluid w-8">
        <div>
            <x-card title="Add Tasks To &nbsp;<span class='text-primary fsize-2'>{{ Str::upper($project->project_name) }}</span>"
                tab1="<a href='{{ route('project.edit',['project'=>$project->id]) }}' class='btn btn-primary '>Go To Project</a>"
                classes="border border-info">

                <div class="container-fluid px-md-5">

                    <x-display-errors />

                    <x-display-form-errors />
                    <form enctype="multipart/form-data" autocomplete="off" class="needs-validation row" novalidate=""
                        method="post" action="{{ route('tasks.store') }}">
                        @csrf
                        <input type="text" hidden name="project_id" value="{{$project->id}}">
                        <div class="col-md-12 order-md-1">
                            <div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="task_name">Task Name</label>
                                        <input type="text" class="form-control" name="task_name" id="task_name"
                                            placeholder="Task Title" value="{{ old('task_name') }}" required="">
                                        <div class="invalid-feedback">
                                            Task name is required.
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3">

                                        <label for="task_lead_id">Task Lead</label>
                                        <select class="custom-select d-block w-100" name="task_lead_id" id="task_lead_id"
                                            required="">
                                            <option value="">Choose...</option>
                                            @foreach ($team_members as $mem)
                                                <option @selected(old('task_lead_id') == $mem->id) value="{{ $mem->id }}">
                                                    {{ $mem->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a Task Lead.
                                        </div>
                                    </div>

                                    <div class="col-md-3 mb-3">

                                        <label for="task_deadline">Task Deadline</label>
                                        <input type="date" value="{{old("task_deadline")}}" class="form-control" name="task_deadline" id="task_deadline"
                                            required>
                                        <div class="invalid-feedback">
                                            Please select a Deadline.
                                        </div>
                                    </div>

                                    <div class="col-md-2 mb-3">

                                        <label for="priority">Task Priority</label>
                                        <select class="form-control" name="priority" id="priority" required>
                                            <option  value="">Select...</option>
                                            <option @selected(old('priority') == 'high') value="high">High</option>
                                            <option @selected(old('priority') == 'medium') value="medium">Medium</option>
                                            <option @selected(old('priority') == 'low') value="low">Low</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a Priority.
                                        </div>
                                    </div>
                                </div>




                                <div class="row">

                                    <div class="col-md-10 mb-3">
                                        <label for="task_description">Task Description</label>
                                        <textarea rows="7" class="form-control" name="task_description" id="task_description"
                                            placeholder="Summary of the Task" required="">{{ old('task_description') }}</textarea>
                                        <div class="invalid-feedback">
                                            Invalid description.
                                        </div>
                                    </div>

                                    <div class="col-md-2 mb-3">

                                        <label for="task_step_no">Step No. <span
                                                class="text-muted">(optional)</span></label>
                                        <input type="number" placeholder="Step Number" class="form-control" name="task_step_no" id="task_step_no">

                                        <div class="invalid-feedback">
                                            Please select a Deadline.
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <button class="btn btn-primary btn-lg btn-block" type="submit">Add Task</button>
                                </div>

                            </div>
                        </div>
                    </form>

                </div>

            </x-card>

    
        </div>
    </div>


    <div class="container-fluid w-8">
        <div>
            @php
                $tabb = '';
                if (Auth::user()->userCan('can_add_task') || Auth::user()->isTeamLead($project->team_id)) {
                    $tabb = "<a href='" . route('tasks.create') . "?project_id=$project->id' class='btn btn-primary'>Add Tasks</a>";
                }
            @endphp
            <x-card title="<h4><b>Project Tasks</b></h4>" :tab1="$tabb" classes="border border-info">


                <div class="table-responsive">

                    <x-fancy-table>
                        <x-fancy-table-head>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Task Name</th>
                                {{-- <th class="text-center">Description</th> --}}
                                <th class="text-center">Priority</th>
                                <th class="text-center">Lead</th>
                                <th class="text-center">Days Left</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </x-fancy-table-head>

                        <x-fancy-table-body>

                            @php
                            $i=1;
                            @endphp
                            @foreach ($tasks as $task)
                            <tr>
                                <td class="text-center">{{ $i }}</td>

                                <td>
                                    <div class="widget-content p-0">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left flex2">
                                                <div class="widget-heading"><a
                                                        href="{{ route('tasks.edit', $task->id) }}">{{ $task->task_name }}</a>
                                                </div>
                                                <div class="widget-subheading opacity-7">
                                                    <b>{{ Str::limit($task->task_description, 20) }}</b>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                {{-- <td class="text-center">{{ $task}}</td> --}}

                                <td class="text-center">
                                    <div class="badge badge-info">{{ $task->priority }}</div>
                                </td>

                                <td class="text-center">{{ $task->teamLead->name }}</td>

                                @php
                                $now= new DateTime();
                                $then= new DateTime($task->task_deadline);
                            
                                $interval = $then->diff($now);
                                
                                @endphp
                                <td class="text-center text-underline">
                                    <div class="badge badge-secondary">{{ $interval->days }} Day(s)</div>
                                    </td>

                                <td class="text-center">
                                    <div class="badge badge-@if( $task->status=='complete'){{'success'}} @else{{'warning'}} @endif">{{ $task->status }}</div>
                                </td>

                                <td class="text-center">
                                    <a href="{{ route('tasks.edit', $project->id) }}" type="button"
                                        class="btn btn-primary btn-sm">
                                        View/Edit
                                    </a>

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

                    <div>
                        {{$tasks->links()}}
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
