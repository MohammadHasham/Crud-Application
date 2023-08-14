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
            <div class="h4">Employee Detail</div>
            <div>
                <a href="{{ route('employees.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>

        <div class="card border-0 shadow-lg">
            <div class="card-body">
                <table class="table table-striped">
                   

                    @foreach ($employee as $id => $employee)
                    <tr valign="middle">
                    
                        <td>
                            @if($employee->image != '' && file_exists(public_path().'/uploads/employees/'.$employee->image))
                            <img src="{{ url('uploads/employees/'.$employee->image) }}" alt="" width="100" height="100">
                            @else
                            <img src="{{ url('assets/images/no.png') }}" alt="" width="100" height="100">
                            @endif
                        </td>
                        <td><strong>{{ $employee->name }}<strong></td>

                    </tr>

                    <tr valign="middle">

                        <td><strong>Email</strong></td>
                        <td>{{ $employee->email }}</td>

                    </tr> 

                    <tr valign="middle">

                        <td><strong>Address</strong></td>
                        <td>{{ $employee->address }}</td>

                    </tr>

                    <tr valign="middle">

                        <td><strong>City</strong></td>
                        <td>{{ $employee->city }}</td>

                    </tr>

                    <tr valign="middle">

                        <td><strong>State</strong></td>
                        <td>{{ $employee->state }}</td>

                    </tr>

                    <tr valign="middle">

                        <td><strong>Country</strong></td>
                        <td>{{ $employee->country }}</td>

                    </tr>

                    <tr valign="middle">

                        <td><strong>D.O.B</strong></td>
                        <td>{{ $employee->dob }}</td>

                    </tr>

                    <tr valign="middle">

                        <td><strong>Gender</strong></td>
                        <td>{{ $employee->gender }}</td>

                    </tr>


                    @endforeach 

                </table>
            </div>
        </div>

        <footer id="footer" style="margin-top: 20px;">
        
            <p>© Copyright MABA</p>
        
        </footer>   
    </div>    
</body>
</html>

