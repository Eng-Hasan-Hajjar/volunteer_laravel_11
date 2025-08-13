@extends('admin.layouts.app')

@section('content')
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
                                <form action="{{ route('people.index') }}" method="GET" class="input-group input-group-sm" style="width: 300px;">
                                    <input type="text" name="search" class="form-control" placeholder="بحث باسم أو رقم وطني..." value="{{ request('search') }}">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </form>

                               


                            </div>

                             <div class="col-sm-6 text-left" style="float: left">
                                    <a href="{{ route('people.create') }}" class="btn btn-primary btn-sm">
                                        <i class="fas fa-plus mr-1"></i> إضافة شخص جديد
                                    </a>
                                </div>

                                
                        </div>

                        <div class="card-body">
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
                                <table class="table table-bordered table-hover text-right">
                                    <thead class="thead-light">
                                        <tr>
                                            <th style="width: 15%">الاسم</th>
                                            <th style="width: 15%">الكنية</th>
                                            <th style="width: 25%">البريد الإلكتروني</th>
                                            <th style="width: 25%">المسمى الوظيفي</th>
                                              <th style="width: 10%">المزيد</th>
                                            <th style="width: 10%">الإجراءات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($people as $person)
                                            <tr>
                                                <td class="align-middle">{{ $person->name }}</td>
                                                <td class="align-middle">{{ $person->second_name ?? '---' }}</td>
                                                <td class="align-middle">{{ $person->email }}</td>
                                                <td class="align-middle">{{ $person->job_title ?? '---' }}</td>
                                                <td class="align-middle">
                                                    

                                                 <button type="button" class="btn btn-info btn-uniform" data-toggle="modal" data-target="#detailsModal{{ $person->id }}"> التفاصيل</button>



                                                </td>

                                                <td class="align-middle">
                                                    <div class=" btn-group-sm">
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
                                            <div class="modal fade"  dir="rtl" style="float: right; text-align: right;"  id="detailsModal{{ $person->id }}" tabindex="-1" role="dialog" aria-labelledby="detailsModalLabel{{ $person->id }}" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document"  dir="rtl" style="float: right; text-align: right;">
                                                    <div class="card"  dir="rtl" style="float: right; text-align: right;">
                                                        <div class="card-header bg-primary text-white" dir="rtl" style="float: right; text-align: right;">
                                                            <h5 class="card-title mb-0" id="detailsModalLabel{{ $person->id }}">تفاصيل الشخص: {{ $person->name }}</h5>
                                                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="card-body" dir="rtl" style="float: right; text-align: right;">
                                                            <div class="row"  style="float: right; text-align: right;">
                                                                
                                                                <div class=" col-12 text-center " dir="rtl" style="float: right; text-align: right;">
                                                                    <p class="text-right"><strong>الاسم:</strong> {{ $person->name }}</p>
                                                                    <p class="text-right"><strong>الكنية:</strong> {{ $person->second_name ?? '---' }}</p>
                                                                    <p class="text-right"><strong>الجنس:</strong> {{ $person->gender ?? 'غير محدد' }}</p>
                                                                    <p class="text-right"><strong>تاريخ الميلاد:</strong> {{ $person->birth_date ? \Carbon\Carbon::parse($person->birth_date)->format('Y-m-d') : '---' }}</p>
                                                                    <p class="text-right"><strong>البريد الإلكتروني:</strong> {{ $person->email }}</p>
                                                                    <p class="text-right"><strong>رقم التواصل:</strong> {{ $person->contact_number ?? '---' }}</p>
                                                                    <p class="text-right"><strong>المسمى الوظيفي:</strong> {{ $person->job_title ?? '---' }}</p>
                                                                    <p class="text-right"><strong>الجنسية:</strong> {{ $person->nationality ?? '---' }}</p>
                                                                    <p class="text-right"><strong>أوقات التفرغ:</strong> {{ $person->availability_times ?? '---' }}</p>
                                                                    <p class="text-right"><strong>الدوافع:</strong> {{ $person->motivation ?? '---' }}</p>
                                                                    <p class="text-right"><strong>نشط:</strong> 
                                                                        <span class="badge {{ $person->is_active ? 'badge-success' : 'badge-danger' }}">
                                                                            {{ $person->is_active ? 'نشط' : 'غير نشط' }}
                                                                        </span>
                                                                    </p>
                                                                    <p class="text-right"><strong>القسم:</strong> {{ $person->department ?? '---' }}</p>
                                                                    <p class="text-right"><strong>تاريخ التعيين:</strong> {{ $person->hiring_date ? \Carbon\Carbon::parse($person->hiring_date)->format('Y-m-d') : '---' }}</p>
                                                                    <p class="text-right"><strong>العنوان:</strong> {{ $person->address ?? '---' }}</p>
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
                                                <td colspan="5" class="text-center text-muted py-4">
                                                    <i class="fas fa-exclamation-triangle fa-2x"></i><br>
                                                    لا توجد بيانات للأشخاص
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <!-- Loading state placeholder -->
                            @if ($people->isEmpty())
                                <div class="text-center text-muted mt-3">
                                    <i class="fas fa-spinner fa-spin fa-2x"></i><br>
                                    جارٍ التحميل...
                                </div>
                            @endif
                        </div>

                        <div class="card-footer text-muted">
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
    .content-wrapper {
        font-family: 'Cairo', sans-serif;
    }
    .table img {
        border-radius: 5px;
        object-fit: cover;
    }
    .modal .card {
        border: none;
        border-radius: 0.5rem;
        overflow: hidden;
    }
    .table td, .table th {
        vertical-align: middle;
    }
    .badge {
        font-size: 0.85rem;
        padding: 0.35em 0.65em;
    }
    .btn-group .btn-uniform {
        min-width: 90px;
        text-align: center;
        padding: 0.375rem 0.75rem;
        font-size: 0.875rem;
        margin-left: 2px;
    }
    @media (max-width: 767.98px) {
        .table th, .table td {
            font-size: 0.8rem;
            padding: 0.5rem;
        }
        .modal-dialog {
            margin: 0.5rem;
        }
        .btn-group .btn-uniform {
            min-width: 70px;
            font-size: 0.75rem;
            padding: 0.25rem 0.5rem;
        }
        .modal .card-body img {
            max-width: 100% !important;
            width: 200px !important;
        }
    }
</style>
@endsection

@section('scripts')
    <script>
        // Handle alert dismissal
        document.querySelectorAll('.alert .close').forEach(button => {
            button.addEventListener('click', () => {
                button.closest('.alert').style.display = 'none';
            });
        });
    </script>
@endsection