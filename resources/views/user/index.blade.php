@extends('layouts.manager.index')

@section('title', 'Quản Lý Người Dùng')
@section('breadcrumb')
<div class="page-header">
    <h3 class="page-title">Quản Lý Người Dùng</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Bảng Điều Khiển</a></li>
            <li class="breadcrumb-item active" aria-current="page">Quản Lý Người Dùng</li>
        </ol>
    </nav>
</div>
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <a href="{{route('users.create')}}" class="btn btn-success float-right mb-3">Thêm mới</a>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Tên Người Dùng</th>
                            <th>Email</th>
                            <th>Số Điện Thoại</th>
                            <th>Loại Người Dùng</th>
                            <th>Thẻ Ngân Hàng</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="{{ assetStorageAvatar($user->avatar) }}" alt="">
                                    <div class="ml-2">
                                        {{ $user->name }}
                                    </div>
                                </div>
                            </td>
                            <td>
                                {{ $user->email }}
                            </td>
                            <td>
                                {{ $user->phone }}
                            </td>
                            <td>
                                {{ $user->type ? 'Quản Trị Viên' : 'Khách Hàng' }}
                            </td>
                            <td class="text-center">
                                @if($user->card)
                                <form action="{{route('cards.update', $user->card->id)}}" method="POST">
                                    <select name="confirm" id="" class="form-control" onchange="this.form.submit()">
                                        <option value="1" @if($user->card->confirm==1)selected @endif>Đã Xác Minh</option>
                                        <option value="0" @if($user->card->confirm==0)selected @endif>Chưa Xác Minh</option>
                                    </select>
                                    @csrf
                                </form>
                                @else
                                <span>Chưa Tạo Thẻ</span>
                                @endif
                            </td>
                            <td style="width: 10%;">
                                <div class="d-flex justify-content-center">
                                    <a class="btn btn-warning btn-sm mr-2" href="{{ route('users.edit', $user->id) }}">Sửa</a>
                                    <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit">Xoá</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="px-5">
                <div class="float-right">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
