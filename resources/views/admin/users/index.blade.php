@extends('admin.layouts.app')

@section('content')
<style>
    .content-wrapper { background-color: #f4f6f9; }
    .card { border-radius: 10px; }
    .card-header { background-color: #ffffff; border-bottom: 1px solid #e3e6f0; }
    .table th, .table td { vertical-align: middle; text-align: right; }
    .btn-primary { background-color: #4e73df; border-color: #4e73df; }
    .btn-primary:hover { background-color: #2e59d9; border-color: #2e59d9; }
    .filter-form .form-control { border-radius: 0.35rem; }
    .filter-form select, .filter-form input { margin-bottom: 10px; }
</style>

<div class="content-wrapper" dir="rtl">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">المستخدمون</h1>
                </div>
                <div class="col-sm-6">
                    <div class="float-left">
                        <a href="{{ route('users.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> إضافة مستخدم جديد
                        </a>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary card-outline w-100">
                        <div class="card-header" dir="rtl" style="display: flex; justify-content: space-between; align-items: center;">
                            <h3 class="card-title">قائمة المستخدمين</h3>
                            <div class="card-tools">
                                <form action="{{ route('users.index') }}" method="GET" class="filter-form">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <input type="text" name="search" class="form-control" placeholder="بحث باسم أو بريد إلكتروني..." value="{{ request('search') }}">
                                        </div>
                                        <div class="col-md-3">
                                            <select name="role" class="form-control">
                                                <option value="">-- الدور --</option>
                                                @foreach(\App\Models\Role::all() as $role)
                                                    <option value="{{ $role->name }}" {{ request('role') == $role->name ? 'selected' : '' }}>{{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <button type="submit" class="btn btn-primary btn-block">
                                                <i class="fas fa-filter"></i> فلترة
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show text-right" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            @if (session('error'))
                                <div class="alert alert-danger alert-dismissible fade show text-right" role="alert">
                                    {{ session('error') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered table-striped text-right m-0">
                                    <thead class="bg-light">
                                        <tr>
                                            <th style="width: 25%">الاسم</th>
                                            <th style="width: 25%">البريد الإلكتروني</th>
                                            <th style="width: 25%">الدور</th>
                                            <th style="width: 25%">الإجراءات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($users as $user)
                                            <tr>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->roles->pluck('name')->implode('، ') }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-primary">
                                                            <i class="fas fa-edit"></i> تعديل
                                                        </a>
                                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;" class="ml-1">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('هل أنت متأكد؟')">
                                                                <i class="fas fa-trash"></i> حذف
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center text-muted p-4">
                                                    <i class="fas fa-exclamation-triangle fa-2x"></i><br>
                                                    لا توجد مستخدمين مسجلين
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer bg-light clearfix w-100">
                            <small class="text-muted">آخر تحديث: {{ now()->format('Y-m-d H:i') }}</small>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection