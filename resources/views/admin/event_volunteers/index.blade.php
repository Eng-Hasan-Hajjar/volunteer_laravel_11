@extends('admin.layouts.app')

@section('content')
<div class="container" dir="rtl">
    <h2 class="text-right">مشاركات المتطوعين في الفعاليات</h2>
    <a href="{{ route('event-volunteers.create') }}" class="btn btn-primary float-right mb-3">إضافة مشاركة متطوع جديدة</a>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th class="text-right">الفعالية</th>
                <th class="text-right">المتطوع</th>
                <th class="text-right">الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($eventVolunteers as $eventVolunteer)
                <tr>
                    <td class="text-right">{{ $eventVolunteer->event->event_name ?? 'غير متوفر' }}</td>
                    <td class="text-right">{{ $eventVolunteer->volunteer->person->name ?? 'غير متوفر' }}</td>
                    <td class="text-right">
                        <a href="{{ route('event-volunteers.edit', $eventVolunteer) }}" class="btn btn-warning ml-2">تعديل</a>
                        <form action="{{ route('event-volunteers.destroy', $eventVolunteer) }}" method="POST" class="d-inline">
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