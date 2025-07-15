@extends('admin.layouts.app')

@section('content')
<div class="container" dir="rtl">
    <h2 class="text-right">الموارد المتاحة</h2>
    <a href="{{ route('employed-available-resources.create') }}" class="btn btn-primary float-right mb-3">إضافة مورد جديد</a>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th class="text-right">المنسق</th>
                <th class="text-right">نوع المورد</th>
                <th class="text-right">سعر المورد</th>
                <th class="text-right">الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($resources as $resource)
                <tr>
                    <td class="text-right">{{ $resource->coordinator->name ?? 'غير متوفر' }}</td>
                    <td class="text-right">{{ $resource->type_resources }}</td>
                    <td class="text-right">{{ $resource->price_resources }}</td>
                    <td class="text-right">
                        <a href="{{ route('employed-available-resources.edit', $resource) }}" class="btn btn-warning ml-2">تعديل</a>
                        <form action="{{ route('employed-available-resources.destroy', $resource) }}" method="POST" class="d-inline">
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