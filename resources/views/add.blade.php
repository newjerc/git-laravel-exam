<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพื่มข้อมูล</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <br>
        <h1 style="text-align: center;">เพิ่ม</h1>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('addTransaction')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <div>
                                    <label class="form-label">ประเภท</label>
                                    <select class="form-select" aria-label="Default select example" name="tr_type">
                                        <option selected disabled>เลือกประเภท</option>
                                        @foreach($type as $row)
                                        <option value="{{$row->t_id}}">{{$row->t_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('tr_type')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label>ชื่อรายการใช้จ่าย:</label>
                                    <input type="text" class="form-control" name="tr_name">
                                    @error('tr_name')
                                    <span class="text-danger my-2">{{$message}}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label>จำนวนเงิน:</label>
                                    <input type="text" class="form-control" name="tr_amount">
                                    @error('tr_amount')
                                    <span class="text-danger my-2">{{$message}}</span>
                                    @enderror
                                </div>
                                <div>
                                    <label>วันที่ใช้จ่าย:</label>
                                    <input type="date" class="form-control" name="tr_date_paid">
                                    @error('tr_date_paid')
                                    <span class="text-danger my-2">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <input type="submit" value="บันทึก" class="btn btn-primary">
                            <a href="{{route('index')}}" class="btn btn-secondary">ยกเลิก</a>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>
</body>

</html>