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
            <div class="h4">Employees</div>
            <div>
                <a href="{{ route('employees.create') }}" class="btn btn-primary">Add Employee</a>
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
                        <td>{{ $employee->dob }}</td>
                        <td>{{ $employee->gender }}</td>
                        <td>
                            <a href="{{ route('employees.show',$employee->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('employees.edit',$employee->id) }}" class="btn btn-primary btn-sm">Update</a>
                            <a href="#" onclick="deleteEmployee({{ $employee->id }})" class="btn btn-danger btn-sm">Delete</a>

                            <form id="employee-edit-action-{{ $employee->id }}" action="{{ route('employees.destroy',$employee->id) }}" method="post">
                                @csrf
                                @method('delete')
                            </form>
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

        <div class="mt-5">
            {{ $employees->links() }}
        </div>
        <footer id="footer" style="margin-top: 20px;">
        
            <p>© Copyright MABA</p>
        
        </footer>
    </div>
   
    
    
</body>
</html>
<script>
    function deleteEmployee(id) {
        if (confirm("Are you sure you want to delete?")) {
            document.getElementById('employee-edit-action-'+id).submit();
        }
    }
</script>