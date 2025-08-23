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
    .img-circle { border: 2px solid #4e73df; }
    .card-tools .input-group { margin-left: 10px; }
    .filter-form select, .filter-form input { margin-bottom: 10px; }
</style>

<div class="content-wrapper" dir="rtl">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">المتطوعون</h1>
                </div>
                <div class="col-sm-6">
                    <div class="float-left">
                        <a href="{{ route('volunteers.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> إضافة متطوع جديد
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
                    <div class="card card-primary card-outline">
                        <div class="card-header" dir="rtl">
                            <h3 class="card-title">قائمة المتطوعين</h3>
                            <div class="card-tools">
                                <form action="{{ route('volunteers.index') }}" method="GET" class="filter-form">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <input type="text" name="search" class="form-control" placeholder="بحث باسم أو رقم قومي..." value="{{ request('search') }}">
                                        </div>
                                        <div class="col-md-3">
                                            <select name="nationality" class="form-control">
                                                <option value="">-- الجنسية --</option>
                                                @foreach(\App\Models\Person::distinct()->pluck('nationality')->filter() as $nationality)
                                                    <option value="{{ $nationality }}" {{ request('nationality') == $nationality ? 'selected' : '' }}>{{ $nationality }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <select name="job_title" class="form-control">
                                                <option value="">-- الوظيفة --</option>
                                                @foreach(\App\Models\Person::distinct()->pluck('job_title')->filter() as $job_title)
                                                    <option value="{{ $job_title }}" {{ request('job_title') == $job_title ? 'selected' : '' }}>{{ $job_title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <select name="department" class="form-control">
                                                <option value="">-- القسم --</option>
                                                @foreach(\App\Models\Person::distinct()->pluck('department')->filter() as $department)
                                                    <option value="{{ $department }}" {{ request('department') == $department ? 'selected' : '' }}>{{ $department }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" name="availability_times" class="form-control" placeholder="أوقات التوفر..." value="{{ request('availability_times') }}">
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
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered table-striped text-right">
                                    <thead class="bg-light">
                                        <tr>
                                            <th style="width: 10%">صورة المتطوع</th>
                                            <th style="width: 15%">اسم الشخص</th>
                                            <th style="width: 15%">البريد الإلكتروني</th>
                                            <th style="width: 15%">الرقم القومي</th>
                                            <th style="width: 15%">الجنسية</th>
                                            <th style="width: 15%">الوظيفة</th>
                                            <th style="width: 15%">القسم</th>
                                            <th style="width: 20%">الإجراءات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($volunteers as $volunteer)
                                            <tr>
                                                <td>
                                                    <div class="text-center">
                                                        <img src="{{ $volunteer->image_url }}" alt="Volunteer Image" class="img-circle img-fluid elevation-2" style="max-width: 50px; max-height: 50px;">
                                                    </div>
                                                </td>
                                                <td>{{ $volunteer->person->name ?? 'غير متوفر' }}</td>
                                                <td>{{ $volunteer->person->email ?? 'غير متوفر' }}</td>
                                                <td>{{ $volunteer->person->national_number ?? 'غير متوفر' }}</td>
                                                <td>{{ $volunteer->person->nationality ?? 'غير متوفر' }}</td>
                                                <td>{{ $volunteer->person->job_title ?? 'غير متوفر' }}</td>
                                                <td>{{ $volunteer->person->department ?? 'غير متوفر' }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="{{ route('volunteers.edit', $volunteer) }}" class="btn btn-warning btn-sm">
                                                            <i class="fas fa-edit"></i> تعديل
                                                        </a>
                                                        <form action="{{ route('volunteers.destroy', $volunteer) }}" method="POST" class="d-inline ml-1">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('هل أنت متأكد من الحذف؟')">
                                                                <i class="fas fa-trash"></i> حذف
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="8" class="text-center text-muted p-4">
                                                    <i class="fas fa-exclamation-triangle fa-2x"></i><br>
                                                    لا يوجد متطوعون مسجلون
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer bg-light clearfix">
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