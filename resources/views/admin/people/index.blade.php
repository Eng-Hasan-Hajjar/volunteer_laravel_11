@extends('admin.layouts.app')

@section('content')
    <section class="content-header" dir="rtl">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="text-right">إدارة الأشخاص</h1>
                </div>
                <div class="col-sm-6">
                    <a href="{{ route('people.create') }}" class="btn btn-primary float-right">
                        <i class="fas fa-plus mr-2"></i> إضافة شخص جديد
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="content" dir="rtl">
        <div class="container-fluid text-right">
            <div class="row" dir="rtl">
                <div class="col-12 text-right" dir="rtl">
                    <div class="card text-right" dir="rtl">
                        <div class="card-header text-right" dir="rtl">
                        </div>
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success text-right">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if (session('error'))
                                <div class="alert alert-danger text-right">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-right">#</th>
                                        <th class="text-right">الاسم</th>
                                        <th class="text-right">الكنية</th>
                                        <th class="text-right">الجنس</th>
                                        <th class="text-right">الرقم الوطني</th>
                                        <th class="text-right">تاريخ الميلاد</th>
                                        <th class="text-right">البريد الإلكتروني</th>
                                        <th class="text-right">الإجراءات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($people as $person)
                                        <tr>
                                            <td class="text-right">{{ $loop->iteration }}</td>
                                            <td class="text-right">{{ $person->name }}</td>
                                            <td class="text-right">{{ $person->second_name ?? '---' }}</td>
                                            <td class="text-right">{{ $person->gender ?? 'غير محدد' }}</td>
                                            <td class="text-right">{{ $person->national_number }}</td>
                                            <td class="text-right">{{ $person->birth_date }}</td>
                                            <td class="text-right">{{ $person->email }}</td>
                                            <td class="text-right">
                                                <a href="{{ route('people.edit', $person->id) }}" class="btn btn-sm btn-primary ml-2">
                                                    <i class="fas fa-edit mr-1"></i> تعديل
                                                </a>
                                                <form action="{{ route('people.destroy', $person->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('هل أنت متأكد من حذف هذا الشخص؟')">
                                                        <i class="fas fa-trash mr-1"></i> حذف
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center">لا توجد بيانات للأشخاص</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection