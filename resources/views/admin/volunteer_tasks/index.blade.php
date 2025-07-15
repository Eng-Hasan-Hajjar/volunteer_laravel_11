@extends('admin.layouts.app')

@section('content')
<div class="container" dir="rtl">
    <h2 class="text-right">مهام المتطوعين</h2>
    <a href="{{ route('volunteer-tasks.create') }}" class="btn btn-primary float-right mb-3">إضافة مهمة متطوع جديدة</a>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th class="text-right">المتطوع</th>
                <th class="text-right">الفعالية</th>
                <th class="text-right">التعيين</th>
                <th class="text-right">الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($volunteerTasks as $volunteerTask)
                <tr>
                    <td class="text-right">{{ $volunteerTask->volunteer->person->name ?? 'غير متوفر' }}</td>
                    <td class="text-right">{{ $volunteerTask->event->event_name ?? 'غير متوفر' }}</td>
                    <td class="text-right">{{ $volunteerTask->designation }}</td>
                    <td class="text-right">
                        <a href="{{ route('volunteer-tasks.edit', $volunteerTask) }}" class="btn btn-warning ml-2">تعديل</a>
                        <form action="{{ route('volunteer-tasks.destroy', $volunteerTask) }}" method="POST" class="d-inline">
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