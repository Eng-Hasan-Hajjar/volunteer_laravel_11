@extends('admin.layouts.app')

@section('content')
<div class="container" dir="rtl">
    <h2 class="text-right">الدعم المالي</h2>
    <a href="{{ route('financial-supports.create') }}" class="btn btn-primary float-right mb-3">إضافة دعم مالي جديد</a>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th class="text-right">المنظمة</th>
                <th class="text-right">نوع الدعم</th>
                <th class="text-right">قيمة التمويل</th>
                <th class="text-right">الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($financialSupports as $financialSupport)
                <tr>
                    <td class="text-right">{{ $financialSupport->organization->organization_name ?? 'غير متوفر' }}</td>
                    <td class="text-right">{{ $financialSupport->type_support }}</td>
                    <td class="text-right">{{ $financialSupport->funding_value }}</td>
                    <td class="text-right">
                        <a href="{{ route('financial-supports.edit', $financialSupport) }}" class="btn btn-warning ml-2">تعديل</a>
                        <form action="{{ route('financial-supports.destroy', $financialSupport) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('هل أنت متأكد؟')">حذف</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection