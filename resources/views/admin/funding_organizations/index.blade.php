@extends('admin.layouts.app')

@section('content')
<div class="container text-right" dir="rtl">
    <h2 class="text-right">تمويل المنظمات</h2>
    <a href="{{ route('funding-organizations.create') }}" class="btn btn-primary float-right mb-3">إضافة تمويل منظمة جديد</a>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th class="text-right">المنظمة</th>
                <th class="text-right">الداعم المالي</th>
                <th class="text-right">قيمة التمويل</th>
                <th class="text-right">الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($fundingOrganizations as $fundingOrganization)
                <tr>
                    <td class="text-right">{{ $fundingOrganization->organization->organization_name ?? 'غير متوفر' }}</td>
                    <td class="text-right">{{ $fundingOrganization->financialSupport->type_support ?? 'غير متوفر' }}</td>
                    <td class="text-right">{{ $fundingOrganization->funding_value }}</td>
                    <td class="text-right">
                        <a href="{{ route('funding-organizations.edit', $fundingOrganization) }}" class="btn btn-warning ml-2">تعديل</a>
                        <form action="{{ route('funding-organizations.destroy', $fundingOrganization) }}" method="POST" class="d-inline">
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