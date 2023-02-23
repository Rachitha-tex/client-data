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
        <h2 class="text-center">All Client</h2>
        <a href="{{route('client.index')}}" class="btn btn-primary">Create Client</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Name with initials</th>
                    <th>Address</th>
                    <th>Reverse Address</th>
                    <th>Number Local Format</th>
                    <th>Number International Format</th>
                    <th>Contact Number type</th>
                    <th>Gender</th>
                    <th>Birthday</th>
                    <th>Age</th>
                    <th>Membership Type</th>
                    <th>Membership Value before Tax</th>
                    <th>Membership Value after tax</th>


                </tr>
            </thead>

            <tbody>
                @foreach ($client as $item)
                    <tr>
                    <td>{{$item->fn}}</td>    
                    <td>{{$item->na}}</td> 
                    <td>{{$item->ad}}</td> 
                    <td></td>
                    <td>{{$item->con}}</td>
                    <td>{{$item->ip}}</td>  
                    <td>{{$item->ph}}</td>  
                    <td>{{$item->g}}</td>  
                    <td>{{$item->bd}}</td> 
                    <td>{{$item->age}} years</td> 
                    <td>{{$item->m}}</td> 
                    <td>{{number_format( $item->val,2)}}</td>
                    <td>
                        {{number_format( $item->val * 0.12 + $item->val,2)}}
                    </td>






                    <tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
</body>
</html>