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
    .modal .card { border: none; border-radius: 0.5rem; overflow: hidden; }
    .badge { font-size: 0.85rem; padding: 0.35em 0.65em; }
    .btn-uniform { min-width: 90px; text-align: center; padding: 0.375rem 0.75rem; font-size: 0.875rem; margin-left: 2px; }
    .filter-form select, .filter-form input { margin-bottom: 10px; }
    @media (max-width: 767.98px) {
        .table th, .table td { font-size: 0.8rem; padding: 0.5rem; }
        .btn-uniform { min-width: 70px; font-size: 0.75rem; padding: 0.25rem 0.5rem; }
    }
</style>

<div class="content-wrapper" dir="rtl">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 align-items-center">
                <div class="col-sm-6">
                    <h1 class="m-0">إدارة الأشخاص</h1>
                </div>
                <div class="col-sm-6 text-left">
                    <a href="{{ route('people.create') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus mr-1"></i> إضافة شخص جديد
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h3 class="card-title">قائمة الأشخاص</h3>
                            <div class="card-tools">
                                <form action="{{ route('people.index') }}" method="GET" class="filter-form">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <input type="text" name="search" class="form-control" placeholder="بحث باسم أو رقم وطني..." value="{{ request('search') }}">
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
                                            <input type="text" name="availability_times" class="form-control" placeholder="أوقات التفرغ..." value="{{ request('availability_times') }}">
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

                        <div class="card-body p-0">
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible text-right">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if (session('error'))
                                <div class="alert alert-danger alert-dismissible text-right">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    {{ session('error') }}
                                </div>
                            @endif

                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped text-right">
                                    <thead class="bg-light">
                                        <tr>
                                            <th style="width: 15%">الاسم</th>
                                            <th style="width: 15%">الكنية</th>
                                            <th style="width: 15%">البريد الإلكتروني</th>
                                            <th style="width: 15%">الرقم القومي</th>
                                            <th style="width: 15%">الجنسية</th>
                                            <th style="width: 15%">الوظيفة</th>
                                            <th style="width: 10%">المزيد</th>
                                            <th style="width: 20%">الإجراءات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($people as $person)
                                            <tr>
                                                <td class="align-middle">{{ $person->name }}</td>
                                                <td class="align-middle">{{ $person->second_name ?? '---' }}</td>
                                                <td class="align-middle">{{ $person->email }}</td>
                                                <td class="align-middle">{{ $person->national_number ?? '---' }}</td>
                                                <td class="align-middle">{{ $person->nationality ?? '---' }}</td>
                                                <td class="align-middle">{{ $person->job_title ?? '---' }}</td>
                                                <td class="align-middle">
                                                    <button type="button" class="btn btn-info btn-uniform" data-toggle="modal" data-target="#detailsModal{{ $person->id }}">التفاصيل</button>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="btn-group-sm">
                                                        <a href="{{ route('people.edit', $person->id) }}" class="btn btn-primary btn-uniform">تعديل</a>
                                                        <form action="{{ route('people.destroy', $person->id) }}" method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-uniform" onclick="return confirm('هل أنت متأكد من حذف هذا الشخص؟')">حذف</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>

                                            <!-- Modal for person details -->
                                            <div class="modal fade" id="detailsModal{{ $person->id }}" tabindex="-1" role="dialog" aria-labelledby="detailsModalLabel{{ $person->id }}" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document" dir="rtl">
                                                    <div class="card">
                                                        <div class="card-header bg-primary text-white">
                                                            <h5 class="card-title mb-0" id="detailsModalLabel{{ $person->id }}">تفاصيل الشخص: {{ $person->name }}</h5>
                                                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-12 text-right">
                                                                    <p><strong>الاسم:</strong> {{ $person->name }}</p>
                                                                    <p><strong>الكنية:</strong> {{ $person->second_name ?? '---' }}</p>
                                                                    <p><strong>الجنس:</strong> {{ $person->gender ?? 'غير محدد' }}</p>
                                                                    <p><strong>تاريخ الميلاد:</strong> {{ $person->birth_date ? \Carbon\Carbon::parse($person->birth_date)->format('Y-m-d') : '---' }}</p>
                                                                    <p><strong>البريد الإلكتروني:</strong> {{ $person->email }}</p>
                                                                    <p><strong>رقم التواصل:</strong> {{ $person->contact_number ?? '---' }}</p>
                                                                    <p><strong>المسمى الوظيفي:</strong> {{ $person->job_title ?? '---' }}</p>
                                                                    <p><strong>الجنسية:</strong> {{ $person->nationality ?? '---' }}</p>
                                                                    <p><strong>أوقات التفرغ:</strong> {{ $person->availability_times ?? '---' }}</p>
                                                                    <p><strong>الدوافع:</strong> {{ $person->motivation ?? '---' }}</p>
                                                                    <p><strong>نشط:</strong> 
                                                                        <span class="badge {{ $person->is_active ? 'badge-success' : 'badge-danger' }}">
                                                                            {{ $person->is_active ? 'نشط' : 'غير نشط' }}
                                                                        </span>
                                                                    </p>
                                                                    <p><strong>القسم:</strong> {{ $person->department ?? '---' }}</p>
                                                                    <p><strong>تاريخ التعيين:</strong> {{ $person->hiring_date ? \Carbon\Carbon::parse($person->hiring_date)->format('Y-m-d') : '---' }}</p>
                                                                    <p><strong>العنوان:</strong> {{ $person->address ?? '---' }}</p>
                                                                    <p><strong>ملاحظات:</strong> {{ $person->notes ?? '---' }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-footer text-left">
                                                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">إغلاق</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <tr>
                                                <td colspan="8" class="text-center text-muted py-4">
                                                    <i class="fas fa-exclamation-triangle fa-2x"></i><br>
                                                    لا توجد بيانات للأشخاص
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="card-footer bg-light text-muted">
                            آخر تحديث: {{ now()->format('Y-m-d H:i') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@section('styles')
<style>
    .content-wrapper { font-family: 'Cairo', sans-serif; }
    .modal .card { border: none; border-radius: 0.5rem; overflow: hidden; }
    .table td, .table th { vertical-align: middle; }
    .badge { font-size: 0.85rem; padding: 0.35em 0.65em; }
    .btn-group .btn-uniform { min-width: 90px; text-align: center; padding: 0.375rem 0.75rem; font-size: 0.875rem; margin-left: 2px; }
    @media (max-width: 767.98px) {
        .table th, .table td { font-size: 0.8rem; padding: 0.5rem; }
        .modal-dialog { margin: 0.5rem; }
        .btn-group .btn-uniform { min-width: 70px; font-size: 0.75rem; padding: 0.25rem 0.5rem; }
    }
</style>
@endsection

@section('scripts')
<script>
    document.querySelectorAll('.alert .close').forEach(button => {
        button.addEventListener('click', () => {
            button.closest('.alert').style.display = 'none';
        });
    });
</script>
@endsection