@extends('layouts.superadmin_app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <x-card title="All Projects Categories">
                <div class="row">

                    <div class="col-md-4">
                        <form class="needs-validation" novalidate="" method="post">

                            <x-card title="Add New Category">
                                <div class="">
                                    <div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="cat_name">Category Name</label>
                                                <input type="text" class="form-control" name="cat_name"
                                                    id="cat_name" placeholder="Category Name" value=""
                                                    required="">
                                                <div class="invalid-feedback">
                                                    Category name is required.
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">

                                                <label for="parent_cat_id">Parent Category</label>
                                                <select class="custom-select d-block w-100" name="parent_cat_id"
                                                    id="parent_cat_id" >
                                                    <option value="">Choose...</option>
                                                    <option>United States</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    Invalid Parent Category.
                                                </div>


                                            </div>
                                        </div>

                                        <div>
                                            <label for="cat_description">Category Description</label>
                                            <textarea class="form-control mb-3" name="cat_description" id="cat_description" rows="5"></textarea>
                                        </div>

                                        <button class="btn btn-primary btn-lg btn-block" type="submit">Add Category</button>


                                    </div>
                                </div>
                            </x-card>
                        </form>


                    </div>
                    <div class="table-responsive col-md-8">

                        <x-fancy-table>
                            <x-fancy-table-head>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Name</th>
                                    <th class="text-center">Parent Category</th>
                                    <th class="text-center">Description</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </x-fancy-table-head>

                            <x-fancy-table-body>
                                <tr>
                                    <td class="text-center text-muted">#347</td>
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
