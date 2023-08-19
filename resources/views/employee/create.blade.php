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
            <div class="h4">Registration Form</div>
            <div>
                <a href="{{ route('employees.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>

        <form action="{{ route('employees.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card border-0 shadow-lg">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" placeholder="Enter Name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                        @error('name')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" name="email" id="email" placeholder="Enter Email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                        @error('email')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input name="address" id="address" cols="30" rows="4" placeholder="Enter Address" class="form-control" value="{{ old('address') }}">
                    </div>

                    <div class="mb-3">
                        <label for="city" class="form-label">City</label>
                        <input name="city" id="city" cols="30" rows="4" placeholder="Enter City" class="form-control" value="{{ old('city') }}">
                    </div>

                    <div class="mb-3">
                        <label for="state" class="form-label">State</label>
                        <input name="state" id="state" cols="30" rows="4" placeholder="Enter State" class="form-control" value="{{ old('state') }}">
                    </div>

                    <div class="mb-3">
                        <label for="country" class="form-label">Country</label>
                        <input name="country" id="country" cols="30" rows="4" placeholder="Enter Country" class="form-control" value="{{ old('country') }}">
                    </div>

                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label><br>
                        <input type="radio" name="gender" value="Male" value="{{ old('gender') }}"> Male
                        <input type="radio" name="gender" value="Female" value="{{ old('gender') }}"> Female
                        <input type="radio" name="gender" value="Other" value="{{ old('gender') }}"> Other

                    </div>

                    <div class="mb-3">
                        <label for="dob">D.O.B</label>
                        <input type="date" id="dob" name="dob" class="form-control @error('dob') is-invalid @enderror" value="{{ old('dob') }}">
                        @error('dob')
                        <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" placeholder="Enter Password" class="form-control @error('password') is-invalid @enderror">
                        @error('password')
                        <p class="invalid-feedback">{{ $message }}</p>
                         @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" class="form-control @error('password_confirmation') is-invalid @enderror">
                        @error('password_confirmation')
                        <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Upload Image</label>
                        <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">

                        @error('image')
                            <p class="invalid-feedback">{{ $message }}</p>
                        @enderror
                    </div>

                </div>
            </div>

            <button class="btn btn-primary mt-3">Save Customer</button>

        </form>
        <footer id="footer" style="margin-top: 20px;">

            <p>© Copyright MABA</p>

         </footer>
    </div>
</body>
</html>
