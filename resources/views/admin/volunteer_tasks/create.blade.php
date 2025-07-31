@extends('admin.layouts.app')

@section('content')
<div class="container  text-right" dir="rtl">
    <h2>إضافة مهمة متطوع جديدة</h2>
    <form action="{{ route('volunteer-tasks.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id_volunteer" class="form-label">المتطوع</label>
            <select name="id_volunteer" class="form-control" required>
                <option value="">اختر المتطوع</option>
                @foreach($volunteers as $volunteer)
                    <option value="{{ $volunteer->id }}">{{ $volunteer->person->name ?? 'غير متوفر' }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="id_event" class="form-label">الفعالية</label>
            <select name="id_event" class="form-control" required>
                <option value="">اختر الفعالية</option>
                @foreach($events as $event)
                    <option value="{{ $event->id }}">{{ $event->event_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="designation" class="form-label">التعيين</label>
            <input type="text" name="designation" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">حفظ</button>
    </form>
</div>
@endsection