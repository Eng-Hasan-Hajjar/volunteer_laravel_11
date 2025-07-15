@extends('admin.layouts.app')

@section('content')
<div class="container" dir="rtl">
    <h2 class="text-right">المنظمات</h2>
    <a href="{{ route('organizations.create') }}" class="btn btn-primary float-right mb-3">إضافة منظمة جديدة</a>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th class="text-right">اسم المنظمة</th>
                <th class="text-right">العنوان</th>
                <th class="text-right">تاريخ الإنشاء</th>
                <th class="text-right">الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($organizations as $organization)
                <tr>
                    <td class="text-right">{{ $organization->organization_name }}</td>
                    <td class="text-right">{{ $organization->address }}</td>
                    <td class="text-right">{{ $organization->time_of_creation }}</td>
                    <td class="text-right">
                        <a href="{{ route('organizations.edit', $organization) }}" class="btn btn-warning ml-2">تعديل</a>
                        <form action="{{ route('organizations.destroy', $organization) }}" method="POST" class="d-inline">
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