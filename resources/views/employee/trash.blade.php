<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>First Laravel Project</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
</head>
<body>

    <div class="bg-dark py-3">
        <div class="container">
            <div class="h4 text-white">Crud Application</div>
        </div>
    </div>

    <div class="container ">
        <div class="d-flex justify-content-between py-3">
            <div class="h4">Customer Trash List</div>
            <div>
                <a href="{{ route('employees.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>

        @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
        @endif

        <div class="card border-0 shadow-lg">
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <th width="30">ID</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Country</th>
                        <th>D.O.B</th>
                        <th>Gender</th>

                        <th width="200">Action</th>
                    </tr>

                    @if($employees->isNotEmpty())
                    @foreach ($employees as $employee)
                    <tr valign="middle">
                        <td>{{ $employee->id }}</td>
                        <td>
                            @if($employee->image != '' && file_exists(public_path().'/uploads/employees/'.$employee->image))
                            <img src="{{ url('uploads/employees/'.$employee->image) }}" alt="" width="50" height="50" class="rounded-circle">
                            @else
                            <img src="{{ url('assets/images/no.png') }}" alt="" width="50" height="50" class="rounded-circle">
                            @endif
                        </td>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->address }}</td>
                        <td>{{ $employee->city }}</td>
                        <td>{{ $employee->state }}</td>
                        <td>{{ $employee->country }}</td>
                        <td>{{ get_formatted_date($employee->dob, "d-M-Y")}}</td>
                        <td>{{ $employee->gender }}</td>
                        <td>
                            <a href="{{ route('employees.restore',['id' => $employee->id]) }}" class="btn btn-success btn-sm">Restore</a>
                            <a href="{{ route('employees.forcedelete',['id' => $employee->id]) }}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                    
                    @else
                    <tr>
                        <td colspan="6">Record Not Found</td>
                    </tr>
                    @endif

                </table>
            </div>
        </div>

       
        <footer id="footer" style="margin-top: 20px;">
        
            <p>© Copyright MABA</p>
        
        </footer>
    </div>
   
    
    
</body>
</html>
