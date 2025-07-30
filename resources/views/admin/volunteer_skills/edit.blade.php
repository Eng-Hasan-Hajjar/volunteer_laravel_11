@extends('admin.layouts.app')

@section('content')
<div class="container text-right" dir="rtl" >
    <h2>تعديل مهارة المتطوع</h2>
    <form action="{{ route('volunteer-skills.update', $volunteerSkill) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="id_volunteer" class="form-label">المتطوع</label>
            <select name="id_volunteer" class="form-control" required>
                <option value="">اختر المتطوع</option>
                @foreach($volunteers as $volunteer)
                    <option value="{{ $volunteer->id }}" {{ $volunteerSkill->id_volunteer == $volunteer->id ? 'selected' : '' }}>
                        {{ $volunteer->person->name ?? 'غير متوفر' }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="id_skills" class="form-label">المهارة</label>
            <select name="id_skills" class="form-control" required>
                <option value="">اختر المهارة</option>
                @foreach($skills as $skill)
                    <option value="{{ $skill->id }}" {{ $volunteerSkill->id_skills == $skill->id ? 'selected' : '' }}>
                        {{ $skill->skill_name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="experience_period" class="form-label">مدة الخبرة (بالأشهر)</label>
            <input type="number" name="experience_period" class="form-control" value="{{ $volunteerSkill->experience_period }}" required min="0">
        </div>
        <button type="submit" class="btn btn-success">تحديث</button>
    </form>
</div>
@endsection