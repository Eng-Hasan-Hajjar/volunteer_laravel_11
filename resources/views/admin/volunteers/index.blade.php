@extends('admin.layouts.app')

@section('content')
<div class="container text-right" dir="rtl">
    <h2>المتطوعون</h2>
    <a href="{{ route('volunteers.create') }}" class="btn btn-primary text-right">إضافة متطوع جديد</a>
    <table class="table table-bordered mt-3 text-right">
        <thead>
            <tr>
                <th>اسم الشخص</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($volunteers as $volunteer)
                <tr>
                    <td>{{ $volunteer->person->name ?? 'غير متوفر' }}</td>
                    <td>
                        <a href="{{ route('volunteers.edit', $volunteer) }}" class="btn btn-warning">تعديل</a>
                        <form action="{{ route('volunteers.destroy', $volunteer) }}" method="POST" class="d-inline">
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