@extends('layouts.manager.index')

@section('title', 'Quản Lý Người Dùng')
@section('breadcrumb')
    <div class="page-header">
        <h3 class="page-title">Quản Lý Đơn Hàng</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Bảng Điều Khiển</a></li>
                <li class="breadcrumb-item active" aria-current="page">Quản Lý Đơn Hàng</li>
            </ol>
        </nav>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Tên Người Dùng</th>
                            <th>Email</th>
                            <th>Khoá Học</th>
                            <th>Trạng Thái</th>
                            <th>Tiến Trình</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($courseUsers as $courseUser)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ assetStorageAvatar($courseUser->user->avatar) }}" alt="">
                                        <div class="ml-2">
                                            {{ $courseUser->user->name }}
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    {{ $courseUser->user->email }}
                                </td>
                                <td>
                                    {{ $courseUser->course->name }}
                                </td>
                                <td>
                                    @switch($courseUser->status)
                                        @case(0)
                                        Đang Đặt Hàng
                                        @break
                                        @case(1)
                                        Chưa Thanh Toán
                                        @break
                                        @case(2)
                                        Đang Học
                                        @break
                                        @default
                                        Đã Hoàn Thành
                                    @endswitch
                                </td>
                                <td>
                                    @if($courseUser->status == config('default.status.course_user.start'))
                                        {{ $courseUser->progress }} %
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($courseUser->status == config('default.status.course_user.in_order') || $courseUser->status == config('default.status.course_user.in_order') )
                                        <form action="{{ route('courseUser.destroy', $courseUser->id) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger">Huỷ</button>
                                        </form>
                                    @endif
                                    @if($courseUser->status == config('default.status.course_user.un_paid')  )
                                        <form action="{{ route('courseUser.destroy', $courseUser->id) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <input type="hidden" name="status"
                                                   value="{{ config('default.status.course_user.paid') }}">
                                            <button class="btn btn-success">Thanh Toán</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="px-5">
                    <div class="float-right">
                        {{ $courseUsers->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
