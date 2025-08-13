@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper" dir="rtl">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">الدعم المالي</h1>
                </div>
                <div class="col-sm-6">
                    <div class="float-left">
                        <a href="{{ route('financial-supports.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> إضافة دعم مالي جديد
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
                            <h3 class="card-title">قائمة الدعم المالي</h3>
                            <div class="card-tools">
                                <form action="{{ route('financial-supports.index') }}" method="GET" class="input-group input-group-sm" style="width: 250px;">
                                    <input type="text" name="search" class="form-control float-right" placeholder="بحث باسم المنظمة أو نوع الدعم..." value="{{ request('search') }}">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-search"></i>
                                        </button>
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
                            <table class="table table-hover table-bordered table-striped text-right m-0">
                                <thead>
                                    <tr>
                                        <th style="width: 30%">المنظمة</th>
                                        <th style="width: 30%">نوع الدعم</th>
                                        <th style="width: 20%">قيمة التمويل</th>
                                        <th style="width: 20%">الإجراءات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($financialSupports as $financialSupport)
                                        <tr>
                                            <td>{{ $financialSupport->organization->organization_name ?? 'غير متوفر' }}</td>
                                            <td>{{ $financialSupport->type_support }}</td>
                                            <td>{{ number_format($financialSupport->funding_value, 2) }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ route('financial-supports.edit', $financialSupport) }}" class="btn btn-sm btn-primary">
                                                        <i class="fas fa-edit"></i> تعديل
                                                    </a>
                                                    <form action="{{ route('financial-supports.destroy', $financialSupport) }}" method="POST" style="display:inline;" class="ml-1">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('هل أنت متأكد من الحذف؟')">
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
                                                لا توجد دعم مالي مسجل
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix w-100">
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