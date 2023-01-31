@extends('layouts.manager.index')

@section('title', 'Quản Lý Người Dùng')
@section('breadcrumb')
<div class="page-header">
    <h3 class="page-title">Manager Users</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Bảng Điều Khiển</a></li>
            <li class="breadcrumb-item "><a href="{{route('users.index')}}">Quản Lý Người Dùng</a></li>
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
                <h4 class="card-title">Thêm Mới Người Dùng</h4>
                <form action="{{route('users.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Tên Người Dùng</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" id="email" placeholder="Enter Email">
                    </div>
                    <div class="form-group">
                        <label for="phone">Số Điện Thoại</label>
                        <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter Phone">
                    </div>
                    <div class="form-group">
                        <label for="avatar">Avatar</label>
                        <input type="file" name="avatar" class="form-control" id="avatar">
                    </div>
                    <div class="form-group form-check">
                        <label for="is_manager">
                            <input name="type" type="checkbox" id="is_manager" value="{{ \App\Models\User::ADMIN_TYPE }}"> Là Quản Trị Viên
                        </label>
                    </div>
                    <button type="submit" class="btn btn-gradient-success mr-2">Gửi</button>
                    <a href="{{route('users.index')}}" class="btn btn-light">Huỷ</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
