@extends('admin.layouts.app')

@section('content')
<div class="container" dir="rtl">
    <h2 class="text-right">المهارات</h2>
    <a href="{{ route('skills.create') }}" class="btn btn-primary float-right mb-3">إضافة مهارة جديدة</a>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th class="text-right">اسم المهارة</th>
                <th class="text-right">الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($skills as $skill)
                <tr>
                    <td class="text-right">{{ $skill->skill_name }}</td>
                    <td class="text-right">
                        <a href="{{ route('skills.edit', $skill) }}" class="btn btn-warning ml-2">تعديل</a>
                        <form action="{{ route('skills.destroy', $skill) }}" method="POST" class="d-inline">
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