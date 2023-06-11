<!DOCTYPE html>
<html lang="en">
<head>
    @include('error.head')

    <style>
        .error-box{
            min-width:100vw;
            min-height:100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .error-box .content{
            display: grid;
            align-items: center;
            justify-content: center;
        }
        .redirect-btn{
            width:fit-content;
            margin: auto;
        }
    </style>
</head>
<body>
    <div class="bg-dark error-box">
        <div class="content">
            @if(session()->has('message'))
                <h2 class="text-danger text-capitalize">
                    {{session()->get('message')}}
                </h2>
                <a href="{{url('/')}}" class="redirect-btn btn btn-secondary">Go to {{session()->get('usertype')}}</a>
            @endif
        </div>
    </div>   
</body>
</html>