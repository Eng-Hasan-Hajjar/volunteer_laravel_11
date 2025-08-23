@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper" dir="rtl" style="text-align: right">
<div class="container">
        <div class="col-sm-6" style="float:left ; margin: 10px;">
                <a href="{{ route('volunteer-tasks.index') }}" class="btn btn-outline-secondary float-left">رجوع</a>
            </div>
    <h2>تعديل مهمة المتطوع</h2>
    <form action="{{ route('volunteer-tasks.update', $volunteerTask) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="id_volunteer" class="form-label">المتطوع</label>
            <select name="id_volunteer" class="form-control" required>
                <option value="">اختر المتطوع</option>
                @foreach($volunteers as $volunteer)
                    <option value="{{ $volunteer->id }}" {{ $volunteerTask->id_volunteer == $volunteer->id ? 'selected' : '' }}>
                        {{ $volunteer->person->name ?? 'غير متوفر' }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="id_event" class="form-label">الفعالية</label>
            <select name="id_event" class="form-control" required>
                <option value="">اختر الفعالية</option>
                @foreach($events as $event)
                    <option value="{{ $event->id }}" {{ $volunteerTask->id_event == $event->id ? 'selected' : '' }}>
                        {{ $event->event_name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="designation" class="form-label">التعيين</label>
            <input type="text" name="designation" class="form-control" value="{{ $volunteerTask->designation }}" required>
        </div>
        <button type="submit" class="btn btn-success">تحديث</button>
    </form>
</div>
@endsection