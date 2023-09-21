<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายงานสรุปค่าใช้จ่าย</title>
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
                    รายงานสรุปค่าใช้จ่าย
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-header">
                                            รายรับ
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">{{$sumIncome}}</li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-header">
                                            รายจ่าย
                                        </div>
                                        <ul class="list-group list-group-flush">

                                            <li class="list-group-item">{{$sumExpense}}</li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-header">
                                            ยอดคงเหลือ
                                        </div>
                                        <ul class="list-group list-group-flush">
                                        <li class="list-group-item">{{$amount}}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
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