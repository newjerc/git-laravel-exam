<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายงานแสดงรายรับรายจ่ายตามเดือน</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container text-center">
        <br>
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="card">
                    <div class="card-header">
                        รายงานแสดงรายรับรายจ่ายตามเดือน
                    </div>
                    <div class="card-body">
                        <div class="container">
                            @foreach($sumIncome as $i)
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            รายรับ {{$i->month}}
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">{{$i->income}}</li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            รายจ่าย
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @endforeach
                        </div>

                    </div>
                    <blockquote class="blockquote mb-0">



                    </blockquote>

                </div>
                <br>
                <a href="{{route('index')}}" class="btn btn-secondary" style="text-align:center;">กลับหน้าหลัก</a>
            </div>
        </div>
    </div>
    </div>
</body>

</html>