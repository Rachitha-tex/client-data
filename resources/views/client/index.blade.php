<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>

    @if (Session::has('message'))
        <div class="alert alert-success">
            {{Session::get('message')}}
        </div>
    @endif
    <div class="container">
        <h2 class="text-center">Create New Client</h2>
        <a href="{{route('show')}}" class="btn btn-warning  mb-4">View Data</a>

        <form action="{{route('store')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" class="form-label">Full Name :</label>
                        <input type="text" placeholder="Full Name..." name="fullname" class="form-control">
                    </div>
                    @error('fullname')
                       <p class="text-danger"> {{$message}} </p>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" class="form-label">Address :</label>
                        <input type="text" placeholder="Address..." name="address" class="form-control">
                    </div>
                    @error('address')
                   <p class="text-danger"> {{$message}} </p>
                @enderror
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" class="form-label">Contact Number :</label>
                        <input type="text" placeholder="Contact Number..." name="contact" class="form-control">
                    </div>
                    @error('contact')
                   <p class="text-danger"> {{$message}} </p>
                @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" class="form-label">Gender :</label>
                        <br>
                        <input type="radio"  name="gender" value="Male" class="ml-4">Male
                        <input type="radio"  name="gender" value="FeMale" > Female

                    </div>
                    @error('gender')
                   <p class="text-danger"> {{$message}} </p>
                @enderror
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" class="form-label">Birth Day :</label>
                        <input type="date"  name="dob" class="form-control">
                    </div>
                    @error('dob')
                   <p class="text-danger"> {{$message}} </p>
                @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="" class="form-label">Select Membership :</label>
                        
                        <select id="" class="form-control" name="membership">
                            <option selected>Enter Value</option>
                            <option value="1">VIP</option>
                            <option value="2">Gold</option>
                            <option value="3">General</option>

                        </select>

                    </div>
                    @error('membership')
                   <p class="text-danger"> {{$message}} </p>
                @enderror
                </div>
            </div>
            <button class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>
    
</body>
</html>