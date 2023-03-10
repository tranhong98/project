@extends('layouts.manager.index')

@section('title', 'Quản Lý Người Dùng')
@section('breadcrumb')
<div class="page-header">
    <h3 class="page-title">Sửa Thông Tin</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Bảng Điều Khiển</a></li>
            <li class="breadcrumb-item "><a href="{{route('users.index')}}">Quản Lý Người Dùng</a></li>
            <li class="breadcrumb-item active" aria-current="page">Sửa Người Dùng</li>
        </ol>
    </nav>
</div>
@endsection
@section('content')

<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Sửa Người Dùng</h4>
                <form action="{{route('users.update', $user->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Tên Người Dùng</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name" value="{{$user->name}}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" id="email" placeholder="Enter Email" value="{{$user->email}}">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter Phone" value="{{$user->phone}}">
                    </div>
                    <div class="form-group">
                        <label for="avatar">Avatar</label>
                        <input type="file" name="avatar" class="form-control" id="avatar">
                    </div>
                    <button type="submit" class="btn btn-gradient-success mr-2">Lưu</button>
                    <a href="{{route('users.index')}}" class="btn btn-gradient-light">Huỷ</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
