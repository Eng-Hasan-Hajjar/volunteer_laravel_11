@extends('admin.layouts.app')

@section('content')
<div class="container text-right" dir="rtl">
    <h2>إضافة شخص جديد</h2>
    <form action="{{ route('people.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">الاسم</label>
            <input type="text" name="name" class="form-control text-right" required>
        </div>
        <div class="mb-3">
            <label for="second_name" class="form-label">الكنية (اختياري)</label>
            <input type="text" name="second_name" class="form-control text-right">
        </div>
        <div class="mb-3">
            <label for="gender" class="form-label">الجنس (اختياري)</label>
            <select name="gender" id="gender" class="form-control text-right">
                <option value="">اختر الجنس</option>
                <option value="ذكر">ذكر</option>
                <option value="أنثى">أنثى</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="national_number" class="form-label">الرقم الوطني</label>
            <input type="text" name="national_number" class="form-control text-right" required maxlength="20">
        </div>
        <div class="mb-3">
            <label for="birth_date" class="form-label">تاريخ الميلاد</label>
            <input type="date" name="birth_date" class="form-control text-right" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">البريد الإلكتروني</label>
            <input type="email" name="email" class="form-control text-right" required>
        </div>
        <button type="submit" class="btn btn-success">حفظ</button>
    </form>
</div>
@endsection