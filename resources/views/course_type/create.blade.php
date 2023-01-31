@extends('layouts.manager.index')

@section('title', 'Quản Lý Thể Loại')
@section('breadcrumb')
    <div class="page-header">
        <h3 class="page-title">Quản Lý Thể Loại</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Bảng Điều Khiển</a></li>
                <li class="breadcrumb-item "><a href="{{route('course-types.index')}}">Quản Lý Thể Loại</a></li>
                <li class="breadcrumb-item active" aria-current="page">Thêm Mới</li>
            </ol>
        </nav>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Thêm Mới Thể Loại </h4>
                    <form action="{{route('course-types.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Tên Thể Loại</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name">
                        </div>
                        <button type="submit" class="btn btn-gradient-success mr-2">Gửi</button>
                        <a href="{{route('course-types.index')}}" class="btn btn-light">Huỷ</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
