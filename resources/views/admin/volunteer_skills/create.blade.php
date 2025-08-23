@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper" dir="rtl" style="text-align: right">
<div class="container  text-right" dir="rtl">
        <div class="col-sm-6" style="float:left ; margin: 10px;">
                <a href="{{ route('volunteer-skills.index') }}" class="btn btn-outline-secondary float-left">رجوع</a>
            </div>
    <h2>إضافة مهارة متطوع جديدة</h2>
    <form action="{{ route('volunteer-skills.store') }}" method="POST">
        @csrf
        <div class="mb-3"dir="rtl">
            <label for="id_volunteer" class="form-label">المتطوع</label>
            <select name="id_volunteer" class="form-control  text-right" required>
                <option value="">اختر المتطوع</option>
                @foreach($volunteers as $volunteer)
                    <option value="{{ $volunteer->id }}">{{ $volunteer->person->name ?? 'غير متوفر' }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3"dir="rtl">
            <label for="id_skills" class="form-label  text-right">المهارة</label>
            <select name="id_skills" class="form-control  text-right" required>
                <option value="">اختر المهارة</option>
                @foreach($skills as $skill)
                    <option value="{{ $skill->id }}">{{ $skill->skill_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3" dir="rtl">
            <label for="experience_period" class="form-label">مدة الخبرة (بالأشهر)</label>
            <input type="number" name="experience_period" class="form-control text-right " required min="0">
        </div>
        <button type="submit" class="btn btn-success">حفظ</button>
    </form>
</div>
@endsection