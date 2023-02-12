@extends('layouts.manager.index')

@section('title', 'Quản Lý Khoá Học')
@section('breadcrumb')
    <div class="page-header">
        <h3 class="page-title">Quản Lý Khoá Học</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Bảng Điều Khiển</a></li>
                <li class="breadcrumb-item "><a href="{{ route('courses.index') }}">Quản Lý Khoá Học</a></li>
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
                    <h4 class="card-title">Thêm khoá học mới</h4>
                    <form action="{{ route('courses.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group ">
                            <label for="name">Tên Khoá Học</label>
                            <input type="text" name="name"
                                class="form-control @if ($errors->first('name')) is-invalid @endif" id="name"
                                placeholder="Nhập tên khoá học">
                            @if ($errors->first('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="name">Loại Khoá Học</label>
                            <select name="course_type_id"
                                class="form-control @if ($errors->first('course_type_id')) is-invalid @endif">
                                <option value="" hidden>Chọn loại khoá học</option>
                                @foreach ($courseTypes as $courseType)
                                    <option value="{{ $courseType->id }}">{{ $courseType->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->first('course_type_id'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('course_type_id') }}
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="price">Giá Tiền</label>
                            <input type="number" name="price"
                                class="form-control  @if ($errors->first('price')) is-invalid @endif" id="price"
                                placeholder="Nhập giá" min="0" autocomplete="off">
                            @if ($errors->first('price'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('price') }}
                                </div>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-gradient-success mr-2">Lưu</button>
                        <a href="{{ route('courses.index') }}" class="btn btn-light">Huỷ</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
