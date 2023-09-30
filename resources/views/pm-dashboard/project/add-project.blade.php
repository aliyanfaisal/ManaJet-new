@extends('layouts.superadmin_app')

@section('content')
    <div class="container-fluid w-8">
        <div>
            <x-card title="Add a New Project">

                <div class="container-fluid px-md-5">


                    <form class="needs-validation row" novalidate="">
                        <div class="col-md-4 order-md-2 mb-4">
                            <x-card title="Project Preview">
                                <div class="text-center">
                                    <img class="m-auto" src="{{ asset('assets/images/logo.png') }}" alt="">
                                    <b class="badge badge-info position-absolute" style="left: 7px; top: 70px;  font-size: 18px;" id="preview_budget">80000PKR</b>
                                    <h5 class="font-weight-bold my-3">Test Project</h5>
                                    <hr>
                                    <div class="d-flex justify-content-between">
                                        <span><b class="badge badge-info" id="preview_cat">Website Development</b></span>
                                        <span><b class="badge badge-warning" id="preview_team">Team 1</b></span>
                                    </div>
                                </div>
                            </x-card>


                            <h5 class="mb-3">Project Status</h5>

                            <div class="d-block my-3">
                                <div class="custom-control custom-radio">
                                    <input id="project_status" name="project_status" type="radio"
                                        class="custom-control-input" checked="" required="">
                                    <label class="custom-control-label" for="project_status">Publish</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input id="project_status" name="project_status" type="radio"
                                        class="custom-control-input" required="">
                                    <label class="custom-control-label" for="project_status">Draft</label>
                                </div>
                            </div>
                            <hr class="mb-4">
                            <button class="btn btn-primary btn-lg btn-block" type="submit">Save Project</button>


                        </div>
                        <div class="col-md-8 order-md-1">
                            <h4 class="mb-3">Project Details</h4>
                            <div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="project_name">Project Name</label>
                                        <input type="text" class="form-control" name="project_name" id="project_name"
                                            placeholder="Project Title" value="" required="">
                                        <div class="invalid-feedback">
                                            Project name is required.
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">

                                        <label for="project_category">Project Category</label>
                                        <select class="custom-select d-block w-100" name="project_category"
                                            id="project_category" required="">
                                            <option value="">Choose...</option>
                                            <option>United States</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a Category.
                                        </div>


                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-md-6 mb-3">

                                        <label for="budget">Project budget</label>
                                        <input type="text" class="form-control" value="0" id="budget"
                                            placeholder="" value="" required="">
                                        <div class="invalid-feedback">
                                            Budget field is required.
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="team_id">Team</label>
                                        <select name="team_id" class="custom-select d-block w-100" id="team_id"
                                            required="">
                                            <option value="">Choose...</option>
                                            <option>Teams</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Team is required.
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-12  mb-3">
                                        <label for="project_image">Project Image</label>
                                        <input type="file" class=" form-control-file " name="project_image"
                                            id="project_image">
                                        <div class="invalid-feedback">
                                            Invalid Image.
                                        </div>
                                        <hr>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="project_description">Project Description</label>
                                    <textarea rows="7" class="form-control" name="project_description" id="project_description"
                                        placeholder="1234 Main St" required=""></textarea>
                                    <div class="invalid-feedback">
                                        Invalid description.
                                    </div>
                                </div>


                            </div>
                        </div>
                    </form>

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
