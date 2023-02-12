@extends('layouts.manager.index')

@section('title', 'Quản Lý Khoá Học')
@section('breadcrumb')
    <div class="page-header">
        <h3 class="page-title">Quản Lý Khoá Học</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Bảng Điều Khiển</a></li>
                <li class="breadcrumb-item "><a href="{{ route('courses.courseDetails.index', $course->id) }}">Quản Lý Bài Học
                        Chi Tiết</a></li>
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
                    <form action="{{ route('courses.courseDetails.store', $course->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Tên Bài Học</label>
                            <input type="text" name="name"
                                class="form-control @if ($errors->first('name')) is-invalid @endif" id="name"
                                placeholder="Nhập tên bài học">
                            @if ($errors->first('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="content">Nội Dung</label>
                            <input type="text" name="content"
                                class="form-control @if ($errors->first('content')) is-invalid @endif" id="content"
                                placeholder="Nội Dung">
                            @if ($errors->first('content'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('content') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="description">Miêu tả</label>
                            <textarea name="description" class="form-control @if ($errors->first('description')) is-invalid @endif" rows="4"
                                id="description" placeholder="Mieu ta"></textarea>
                            @if ($errors->first('description'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('description') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="video">Video</label>
                            <input type="text" name="video"
                                class="form-control @if ($errors->first('video')) is-invalid @endif" id="video"
                                placeholder="Nhập đường dẫn video">
                            @if ($errors->first('video'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('video') }}
                                </div>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-gradient-success mr-2">Lưu</button>
                        <a href="{{ route('courses.courseDetails.index', $course->id) }}" class="btn btn-light">Huỷ</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
