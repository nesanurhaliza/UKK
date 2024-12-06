<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @extends('assessor')
    @section('content')
        <div class="container mt-50"  id="" >
                <div class="card">
                    <div class="card-header py-3">
                        <h4 class="m-0 font-weight-bold text-primary">kompetensi standar</h4>
                    </div>
                        <div class="card-body">
                            <div class="col-md-6">
                                <h3 class="m-0 font-weight-bold text-primary">Hasil Ujian</h3>
                                <h4 class="m-0 font-weight-bold text-primary mt-2">pilih standar</h4>
                            </div>
                        </div>
                        <!-- table head dark -->
                        <div class="table-responsive mt-5">
                            <table class="table table-bordered" id="dataTable" width="50%" cellspacing="0">
                                <thead>
                                    <tr class="text-center ">
                                        <th>NO</th>
                                        <th>CODE</th>
                                        <th>TITLE</th>
                                        <th>DESKRIPSI</th>
                                        <th>MAJOR_ID</th>
                                        {{-- <th>ASSESSOR_ID</th> --}}
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($standar as $key => $item)
                                    <tr>
                                        <th>{{ $key+1}}</th>
                                        <th>{{$item->unit_code}}</th>
                                        <th>{{$item->unit_title}}</th>
                                        <th>{{$item->unit_deskripsi}}</th>
                                        <th>{{$item->jurusan->nama_jurusan}}</th>
                                        <th>{{$item->assessor->user->name}}</th>
                                        <th>
                                        <a href="/manajement.editstandar/{{ $item->id }}"><button class="btn btn-primary">Edit</button></a>
                                        <a href="/manajement.standar/delete/{{ $item->id}}"><button class="btn btn-danger">Hapus</button></a>
                                       </th>
                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                </div>
        </div>
        @endsection
</body>
</html>
