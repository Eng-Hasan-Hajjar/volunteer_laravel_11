@extends('admin.layouts.app')

@section('content')
<div class="container" dir="rtl">
    <h2 class="text-right">مهارات المتطوعين</h2>
    <a href="{{ route('volunteer-skills.create') }}" class="btn btn-primary float-right mb-3">إضافة مهارة متطوع جديدة</a>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th class="text-right">المتطوع</th>
                <th class="text-right">المهارة</th>
                <th class="text-right">مدة الخبرة (بالأشهر)</th>
                <th class="text-right">الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($volunteerSkills as $volunteerSkill)
                <tr>
                    <td class="text-right">{{ $volunteerSkill->volunteer->id_person ? $volunteerSkill->volunteer->person->name : 'غير متوفر' }}</td>
                    <td class="text-right">{{ $volunteerSkill->skill->skill_name }}</td>
                    <td class="text-right">{{ $volunteerSkill->experience_period }}</td>
                    <td class="text-right">
                        <a href="{{ route('volunteer-skills.edit', $volunteerSkill) }}" class="btn btn-warning ml-2">تعديل</a>
                        <form action="{{ route('volunteer-skills.destroy', $volunteerSkill) }}" method="POST" class="d-inline">
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