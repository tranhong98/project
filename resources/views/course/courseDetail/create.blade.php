@extends('layouts.manager.index')

@section('title', 'Quản Lý Khoá Học')
@section('breadcrumb')
<div class="page-header">
    <h3 class="page-title">Quản Lý Khoá Học</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Bảng Điều Khiển</a></li>
            <li class="breadcrumb-item "><a href="{{route('courses.courseDetails.index', $course->id)}}">Quản Lý Bài Học Chi Tiết</a></li>
            <li class="breadcrumb-item active" aria-current="page">Thêm mới</li>
        </ol>
    </nav>
</div>
@endsection
@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Thêm bài học mới</h4>
                <form action="{{route('courses.courseDetails.store', $course->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Tên Khoá Học</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label for="content">Nội Dung</label>
                        <input type="text" name="content" class="form-control" id="content" placeholder="Nội Dung">
                    </div>
                    <!-- <div class="form-group">
                        <label for="image">Ảnh</label>
                        <input type="file" name="image" class="form-control" id="image">
                    </div> -->
                    <div class="form-group">
                        <label for="description">Miêu tả</label>
                        <textarea name="description" class="form-control" rows="4" id="description" placeholder="Mieu ta"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="video">Video</label>
                        <input type="text" name="video" class="form-control" id="video" placeholder="Video">
                    </div>
                    <button type="submit" class="btn btn-gradient-success mr-2">Gửi</button>
                    <a href="{{route('courses.courseDetails.index', $course->id)}}" class="btn btn-light">Huỷ</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
