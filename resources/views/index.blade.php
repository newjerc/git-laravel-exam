<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('index')}}">Exercise</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('show.addform')}}">เพิ่มข้อมูล</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('report.transaction')}}">รายงานรายรับ-รายจ่าย</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('report.income-expense')}}">รายงานสรุปค่าใช้จ่าย</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                    </li>
                </ul>
                <form class="d-flex" role="search" action="{{route('search')}}" method="GET">
                    @csrf
                    <label>ค้นหาตามเดือน</label>
                    <select class="form-select" aria-label="Default select example" name="search">
                        <option selected disabled>เลือกเดือนเพื่อค้นหา</option>
                        <option value="01">มกราคม</option>
                        <option value="02">กุมภาพันธ์</option>
                        <option value="03">มีนาคม</option>
                        <option value="04">เมษายน</option>
                        <option value="05">พฤษภาคม</option>
                        <option value="06">มิถุนายน</option>
                        <option value="07">กรกฎาคม</option>
                        <option value="08">สิงหาคม</option>
                        <option value="09">กันยายน</option>
                        <option value="10">ตุลาคม</option>
                        <option value="11">พฤศจิกายน</option>
                        <option value="12">ธันวาคม</option>
                    </select>
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container text-center">
        @if(session("success"))
        <div class="alert alert-success">{{session('success')}}</div>
        @endif
        @if(session("error"))
        <div class="alert alert-danger">{{session('error')}}</div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ประเภทรายการ</th>
                            <th scope="col">ชื่อรายการ</th>
                            <th scope="col">จำนวนเงิน</th>
                            <th scope="col">วันที่ใช้จ่าย</th>
                            <th scope="col">วันเวลาที่บันทึกข้อมูล</th>
                            <th scope="col">วันเวลาที่ปรับปรุงข้อมูล</th>
                            <th scope="col">จัดการข้อมูล</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(empty($result))
                        @foreach($list as $row)
                        <tr>
                            <td>{{$row->typeName->t_name}}</td>
                            <td>{{$row->tr_name}}</td>
                            <td>{{$row->tr_amount}}</td>
                            <td>{{$row->tr_date_paid}}</td>
                            <td>{{$row->created_at}}</td>
                            <td>{{$row->updated_at}}</td>
                            <td>
                                <a href="{{url('/transaction/edit/'.$row->id)}}" class="btn btn-warning">แก้ไข</a>
                                | <a href="{{url('/transaction/delete/'.$row->id)}}" class="btn btn-danger" onclick="return confirm('คุณต้องการลบข้อมูลหรือไม่')">ลบ</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                @if(!empty($message))
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 offset-md-4">
                            <div class="alert alert-danger">{{$message}}</div>
                        </div>
                    </div>
                </div>
                <div>
                    @endif
                    @foreach($result as $row)

                    <tr>
                        <td>{{$row->typeName->t_name}}</td>
                        <td>{{$row->tr_name}}</td>
                        <td>{{$row->tr_amount}}</td>
                        <td>{{$row->tr_date_paid}}</td>
                        <td>{{$row->created_at}}</td>
                        <td>{{$row->updated_at}}</td>
                        <td>
                            <a href="{{url('/transaction/edit/'.$row->id)}}" class="btn btn-warning">แก้ไข</a>
                            | <a href="{{url('/transaction/delete/'.$row->id)}}" class="btn btn-danger" onclick="return confirm('คุณต้องการลบข้อมูลหรือไม่')">ลบ</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
</body>

</html>