@extends('admin.layouts.app')

@section('content')
<div class="container" dir="rtl">
    <h2 class="text-right">الفعاليات</h2>
    <a href="{{ route('events.create') }}" class="btn btn-primary float-right mb-3">إضافة فعالية جديدة</a>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th class="text-right">اسم الفعالية</th>
                <th class="text-right">تاريخ البدء</th>
                <th class="text-right">تاريخ الانتهاء</th>
                <th class="text-right">المنسق</th>
                <th class="text-right">الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($events as $event)
                <tr>
                    <td class="text-right">{{ $event->event_name }}</td>
                    <td class="text-right">{{ $event->start_day }}</td>
                    <td class="text-right">{{ $event->end_day }}</td>
                    <td class="text-right">{{ $event->coordinator->name ?? 'غير متوفر' }}</td>
                    <td class="text-right">
                        <a href="{{ route('events.edit', $event) }}" class="btn btn-warning ml-2">تعديل</a>
                        <form action="{{ route('events.destroy', $event) }}" method="POST" class="d-inline">
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