@extends('layouts.manager.index')

@section('title', 'Quản Lý Khoá Học')
@section('breadcrumb')
    <div class="page-header">
        <h3 class="page-title">Quản Lý Khoá Học</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item "><a href="{{route('courses.courseDetails.index', $course->id)}}">Quản Lý Bài Học Chi Tiết</a></li>
                <li class="breadcrumb-item active" aria-current="page">Sửa bài học</li>
            </ol>
        </nav>
    </div>
@endsection
@section('content')

    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Sửa Bài Học </h4>
                    <form action="{{route('courses.courseDetails.update', ['course_id'=>$course->id,'courseDetail_id'=>$step->id])}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Tên Bài Học</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Nhập Tên"
                                   value="{{$step->name}}">
                        </div>
                        <div class="form-group">
                            <label for="content">Nội Dung</label>
                            <input type="text" name="content" class="form-control" id="content" placeholder="Nhập Nội Dung"
                                   value="{{$step->content}}">
                        </div>
                        <div class="form-group">
                            <label for="description">Miêu Tả</label>
                            <input type="text" name="description" class="form-control" id="description" placeholder="Miêu tả bài học"
                                   value="{{$step->description}}">
                        </div>
                        <div class="form-group">
                            <label for="video">Video</label>
                            <input type="text" name="video" class="form-control" id="video" placeholder="Video"
                                   value="{{$step->video}}">
                        </div>
                        <button type="submit" class="btn btn-gradient-success mr-2">Lưu</button>
                        <a href="{{route('courses.courseDetails.index', $course->id)}}" class="btn btn-gradient-light">Huỷ</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
