@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper" dir="rtl" style="text-align: right">
<div class="container" dir="rtl">
      <div class="col-sm-6" style="float:left ; margin: 10px;">
                <a href="{{ route('event-volunteers.index') }}" class="btn btn-outline-secondary float-left">رجوع</a>
            </div>
    <h2 class="text-right">إضافة مشاركة متطوع جديدة</h2>
    <form action="{{ route('event-volunteers.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id_event" class="form-label text-right d-block">الفعالية</label>
            <select name="id_event" class="form-control text-right" required>
                <option value="">اختر الفعالية</option>
                @foreach($events as $event)
                    <option value="{{ $event->id }}">{{ $event->event_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="id_volunteer" class="form-label text-right d-block">المتطوع</label>
            <select name="id_volunteer" class="form-control text-right" required>
                <option value="">اختر المتطوع</option>
                @foreach($volunteers as $volunteer)
                    <option value="{{ $volunteer->id }}">{{ $volunteer->person->name ?? 'غير متوفر' }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success float-right">حفظ</button>
          <div class="col-sm-6" style="float:left ; margin: 10px;">
                <a href="{{ route('event-volunteers.index') }}" class="btn btn-outline-secondary float-left">رجوع</a>
            </div>
    </form>
</div>
@endsection