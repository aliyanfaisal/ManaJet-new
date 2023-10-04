@extends('layouts.superadmin_app')

@section('content')
    <div class="container-fluid w-8">
        <div>
            <x-card title="Add a New Team">

                <div class="container-fluid px-md-5">


                    <div class="needs-validation row" novalidate="">
                        <form class="col-md-6 order-md-2">
                            <x-card title="Add Team Members" classes="w-100">
                                <div class="col-md-6 mb-3">
                                    <label for="">Add to Team</label>
                                    <select class="custom-select d-block w-100" id="add_to_team" required="">
                                        <option value="">Choose...</option>
                                        <option>United States</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Project name is required.
                                    </div>
                                </div>

                                <hr>
                                <div>
                                    <h5>Current Members</h5>
                                    <div class="d-flex flex-wrap">
                                        <div class="form-check mr-4">
                                            <input class="form-check-input" type="checkbox" name="team_members"
                                                value="" id="" checked>
                                            <label class="form-check-label" style="font-size: 16px" for="">
                                                Aliyan Faisal
                                            </label>
                                        </div>
                                        <div class="form-check mr-4">
                                            <input class="form-check-input" type="checkbox" name="team_members"
                                                value="" id="" checked>
                                            <label class="form-check-label" style="font-size: 16px" for="">
                                                Ali Developer
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <button class="mt-5 btn btn-primary btn-lg btn-block" type="submit">Update Members</button>

                            </x-card>

                        </form>
                        <form class="col-md-6 order-md-1">
                            <h4 class="mb-3">Team Details</h4>
                            <div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="team_name">Team Name</label>
                                        <input type="text" class="form-control" name="team_name" id="team_name"
                                            placeholder="Team Name" value="" required="">
                                        <div class="invalid-feedback">
                                            Project name is required.
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">

                                        <label for="team_category">Team Category</label>
                                        <select class="custom-select d-block w-100" name="team_category" id="team_category"
                                            required="">
                                            <option value="">Choose...</option>
                                            @foreach ($p_cats as $cat)
                                                <option value="{{ $cat->id }}">{{ $cat->cat_name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a Category.
                                        </div>


                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="team_lead_id">Team Lead</label>
                                        <select name="team_lead_id" class="custom-select d-block w-100" id="team_lead_id"
                                            required="">
                                            <option value="">Choose...</option>
                                            <option>Teams</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Team is required.
                                        </div>
                                    </div>

                                </div>

                                <div class="mb-3">
                                    <label for="team_description">Team Description</label>
                                    <textarea rows="7" class="form-control" name="team_description" id="team_description" placeholder="1234 Main St"
                                        required=""></textarea>
                                    <div class="invalid-feedback">
                                        Invalid description.
                                    </div>
                                </div>

                                <button class="mt-5 btn btn-primary btn-lg btn-block" type="submit">Save Team</button>

                            </div>
                        </form>
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


@section('js')

    <script>

        if (token == "") {
            alert("Please login again, Token error")

        } else {

            $(document).on("change","#team_category", function(){
                afbGetUsers($(this).val()).then(function(data){
                   
                    $(data).each(function(user){ 
                        $("#team_lead_id").append("<option>"+($(this)[0].name)+"</option>")
                    })
                })
                
            })

 


        }


    </script>
@endsection
