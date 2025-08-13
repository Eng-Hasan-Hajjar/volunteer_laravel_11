@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper" dir="rtl">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">المتطوعون</h1>
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
                                <form action="{{ route('volunteers.index') }}" method="GET" class="input-group input-group-sm" style="width: 250px;">
                                    <input type="text" name="search" class="form-control float-right" placeholder="بحث باسم أو رقم قومي..." value="{{ request('search') }}">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-hover table-bordered table-striped text-right">
                                <thead>
                                    <tr>
                                        <th style="width: 10%">صورة المتطوع</th>
                                        <th style="width: 20%">اسم الشخص</th>
                                        <th style="width: 20%">البريد الإلكتروني</th>
                                        <th style="width: 20%">الرقم القومي</th>
                                        <th style="width: 30%">الإجراءات</th>
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
                                            <td colspan="5" class="text-center text-muted p-4">
                                                <i class="fas fa-exclamation-triangle fa-2x"></i><br>
                                                لا يوجد متطوعون مسجلون
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
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