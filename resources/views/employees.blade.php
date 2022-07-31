@include('partials/header')
 
            @include('partials/sidebar')

<!-- Content Start -->
<div class="content">
@include('partials/navbar')
            <!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Employee List</h6>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Designation</th>
                                            <th scope="col">DOJ</th>
                                            <th scope="col">Gender</th>
                                            <th scope="col">Address</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if(!empty($employees))
                                        @foreach($employees as $key => $emp)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{ucwords($emp->emp_name)}}</td>
                                            <td>{{$emp->emp_designation}}</td>
                                            <td>{{$emp->emp_date_of_join}}</td>
                                            <td>{{ucfirst($emp->emp_gender)}}</td>
                                            <td>{{$emp->emp_address}}</td>
                                            <td class="text-center">
                                             <a href="{{route('edit_emp',$emp->id)}}"><i class='fa fa-edit'></i> </a>&nbsp;&nbsp; <a href="{{route('delete_emp', $emp->id)}}" onclick="return confirm('Are you sure you want to delete this Employee?');"> <i class='fa fa-trash'></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Table End -->
                   
            @include('partials/footer')
