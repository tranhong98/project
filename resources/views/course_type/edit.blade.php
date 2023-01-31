@extends('layouts.manager.index')

@section('title', 'Quản Lý Thể Loại')
@section('breadcrumb')
<div class="page-header">
    <h3 class="page-title">Manager Course Types</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Bảng Điều Khiển</a></li>
            <li class="breadcrumb-item "><a href="{{route('course-types.index')}}">Quản Lý Thể Loại</a></li>
            <li class="breadcrumb-item active" aria-current="page">Sửa</li>
        </ol>
    </nav>
</div>
@endsection
@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Sửa Thể Loại</h4>
                <form action="{{route('course-types.update', $courseType->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Tên Thể Loại</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name" value="{{$courseType->name}}">
                    </div>
                    <button type="submit" class="btn btn-gradient-success mr-2">Lưu</button>
                    <a href="{{route('course-types.index')}}" class="btn btn-gradient-light">Huỷ</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
