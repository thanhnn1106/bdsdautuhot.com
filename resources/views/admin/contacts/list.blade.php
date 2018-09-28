@extends('admin.layout')
@section('content')
<!-- Breadcrumb-->
<div class="breadcrumb-holder">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Danh sách Tin tức</li>
        </ul>
    </div>
</div>

<?php
    $contactStatus = config('site.contact_status.label');
?>
<section>
    <div class="container-fluid">
        @include('notifications')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h1>Danh sách tin nhắn của khách</h1>
                    </div>
                    <div class="card-header">
                        <form id="searchUser" method="GET" action="{{ route('admin.contacts') }}">
                            <div class="form-group row">
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <select class="form-control" name="filter_status" onchange="this.form.submit();">
                                                <option value="">All</option>
                                                @foreach ($contactStatus as $key => $value)
                                                <option @if ($filter_status != '' && (int)$key === (int)$filter_status) selected="selected" @endif value="{{ $key }}">{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{ csrf_field() }}
                        </form>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tên người gửi</th>
                                        <th>Số điện thoại</th>
                                        <th>Email</th>
                                        <th>Nội dung</th>
                                        <th>Trạng thái</th>
                                        <th>Ngày gửi</th>
                                        <th>Ngày cập nhật</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($contacts->count() == 0)
                                        <tr><td colspan="8" align="center">Data not found</td></tr>
                                    @else
                                    <?php $i = 1; ?>
                                    @foreach($contacts as $contact)
                                    <tr>
                                        <th style="@if ($contact->status == 0) font-weight: bold;color: black; @endif">{{ $i++ }}</th>
                                        <td style="@if ($contact->status == 0) font-weight: bold;color: black; @endif">{{ $contact->name }}</td>
                                        <td style="@if ($contact->status == 0) font-weight: bold;color: black; @endif">{{ $contact->phone }}</td>
                                        <td style="@if ($contact->status == 0) font-weight: bold;color: black; @endif">{{ $contact->email }}</td>
                                        <td style="@if ($contact->status == 0) font-weight: bold;color: black; @endif">{{ $contact->message }}</td>
                                        <td style="@if ($contact->status == 0) font-weight: bold;color: black; @endif">{{ $contactStatus[$contact->status] }}</td>
                                        <td style="@if ($contact->status == 0) font-weight: bold;color: black; @endif">{{ $contact->created_at }}</td>
                                        <td style="@if ($contact->status == 0) font-weight: bold;color: black; @endif">{{ $contact->updated_at }}</td>
                                        <td style="@if ($contact->status == 0) font-weight: bold;color: black; @endif">
                                            <a href="{{ route('admin.contacts.edit', ['id' => $contact->id]) }}" class="btn btn-warning btn-xs">
                                                Cập nhật
                                            </a>
                                            <a href="javascript:void(0);" onclick="return fncDeleteConfirm(this);"
                                               data-message="Are you sure delete this contact?"
                                               data-url="{{ route('admin.contacts.delete', ['id' => $contact->id]) }}"
                                               class="btn btn-danger btn-xs">
                                               Xoá
                                            </a>
                                        </td>
                                    </strong>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('footer_script')
@endsection