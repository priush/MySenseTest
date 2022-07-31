@include('partials/header')
 
            @include('partials/sidebar')

<!-- Content Start -->
<div class="content">
@include('partials/navbar')
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Add Employee</h6>
                            <form class="form-horizontal" action="{{route('store_employee')}}" method="post" enctype="multipart/form-data" name="add_provider">
					            @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Empolyee Id</label>
                                    <input type="text" class="form-control" name="empId" id="empId"
                                        aria-describedby="emailHelp">
                                    
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" id="empName"
                                        aria-describedby="emailHelp">
                                    
                                </div>
                                <div class="mb-3">
                                <label for="designation" class="form-label">Designation</label>
                                    <input type="text" class="form-control" name="designation" id="designation"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                <label for="doj" class="form-label">Date of Joining</label>
                                    <input type="date" class="form-control" name="doj" id="doj"
                                        aria-describedby="emailHelp">
                                </div>
                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
                                    <div class="col-sm-10">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender"
                                                id="gridRadios1" value="female" checked>
                                            <label class="form-check-label" for="gridRadios1">
                                               Female
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="gender"
                                                id="gridRadios2" value="male">
                                            <label class="form-check-label" for="gridRadios2">
                                                Male
                                            </label>
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="mb-3">
                                   <textarea class="form-control" placeholder="Address"
                                        id="floatingTextarea" name="address" style="height: 150px;"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                        </div>
                    </div>
                   
            <!-- Widgets End -->
            @include('partials/footer')
