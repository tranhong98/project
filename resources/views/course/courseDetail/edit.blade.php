@extends('layouts.manager.index')

@section('title', 'Quản Lý Khoá Học')
@section('breadcrumb')
    <div class="page-header">
        <h3 class="page-title">Quản Lý Khoá Học</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item "><a href="{{ route('courses.courseDetails.index', $course->id) }}">Quản Lý Bài Học
                        Chi Tiết</a></li>
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
                    <form
                        action="{{ route('courses.courseDetails.update', ['course_id' => $course->id, 'courseDetail_id' => $step->id]) }}"
                        method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $step->id }}">
                        <div class="form-group">
                            <label for="name">Tên Bài Học</label>
                            <input type="text" name="name"
                                class="form-control @if ($errors->first('name')) is-invalid @endif" id="name"
                                placeholder="Nhập Tên" value="{{ $step->name }}">
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
                                placeholder="Nhập Nội Dung" value="{{ $step->content }}">
                            @if ($errors->first('content'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('content') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="description">Miêu Tả</label>
                            <input type="text" name="description"
                                class="form-control @if ($errors->first('description')) is-invalid @endif" id="description"
                                placeholder="Miêu tả bài học" value="{{ $step->description }}">
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
                                placeholder="Video" value="{{ $step->video }}">
                            @if ($errors->first('video'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('video') }}
                                </div>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-gradient-success mr-2">Lưu</button>
                        <a href="{{ route('courses.courseDetails.index', $course->id) }}"
                            class="btn btn-gradient-light">Huỷ</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
