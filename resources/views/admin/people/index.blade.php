@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper" dir="rtl">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">إدارة الأشخاص</h1>
                </div>
                <div class="col-sm-6">
                    <div class="float-left">
                        <a href="{{ route('people.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> إضافة شخص جديد
                        </a>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content text-center">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary card-outline w-100">
                        <div class="card-header" dir="rtl" style="display: flex; justify-content: space-between; align-items: center;">
                            <h3 class="card-title">قائمة الأشخاص</h3>
                            <div class="card-tools">
                                <form action="{{ route('people.index') }}" method="GET" class="input-group input-group-sm" style="width: 250px;">
                                    <input type="text" name="search" class="form-control float-right" placeholder="بحث باسم أو رقم وطني..." value="{{ request('search') }}">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-2">
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
                                       
                                        <th style="width: 10%">الاسم</th>
                                        <th style="width: 10%">الكنية</th>
                                        <th style="width: 5%">الجنس</th>
                                        <th style="width: 10%">تاريخ الميلاد</th>
                                        <th style="width: 10%">البريد الإلكتروني</th>
                                        <th style="width: 10%">رقم التواصل</th>
                                        <th style="width: 10%">المسمى الوظيفي</th>
                                        <th style="width: 5%">الجنسية</th>
                                        <th style="width: 5%">أوقات التفرغ</th>
                                        <th style="width: 5%">الدوافع</th>
                                        <th style="width: 5%">نشط</th>
                                        <th style="width: 5%">القسم</th>
                                        <th style="width: 5%">تاريخ التعيين</th>
                                        <th style="width: 5%">العنوان</th>
                                        <th style="width: 10%">الإجراءات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($people as $person)
                                        <tr>
                                           
                                            <td>{{ $person->name }}</td>
                                            <td>{{ $person->second_name ?? '---' }}</td>
                                            <td>{{ $person->gender ?? 'غير محدد' }}</td>
                                            <td>{{ \Carbon\Carbon::parse($person->birth_date)->format('d-m-Y') }}</td>
                                            <td>{{ $person->email }}</td>
                                            <td>{{ $person->contact_number ?? '---' }}</td>
                                            <td>{{ $person->job_title ?? '---' }}</td>
                                            <td>{{ $person->nationality ?? '---' }}</td>
                                            <td>{{ $person->availability_times ?? '---' }}</td>
                                            <td>{{ $person->motivation ?? '---' }}</td>
                                            <td>{{ $person->is_active ? 'نشط' : 'غير نشط' }}</td>
                                            <td>{{ $person->department ?? '---' }}</td>
                                            <td>{{ $person->hiring_date ? \Carbon\Carbon::parse($person->hiring_date)->format('d-m-Y') : '---' }}</td>
                                            <td>{{ $person->address ?? '---' }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ route('people.edit', $person->id) }}" class="btn btn-sm btn-primary">
                                                        <i class="fas fa-edit"></i> تعديل
                                                    </a>
                                                    <form action="{{ route('people.destroy', $person->id) }}" method="POST" style="display:inline;" class="ml-1">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('هل أنت متأكد من حذف هذا الشخص؟')">
                                                            <i class="fas fa-trash"></i> حذف
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="16" class="text-center text-muted p-4">
                                                <i class="fas fa-exclamation-triangle fa-2x"></i><br>
                                                لا توجد بيانات للأشخاص
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