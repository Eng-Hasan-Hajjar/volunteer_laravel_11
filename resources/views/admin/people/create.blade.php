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
        <div class="mb-3">
            <label for="contact_number" class="form-label">رقم التواصل (اختياري)</label>
            <input type="text" name="contact_number" class="form-control text-right">
        </div>
        <div class="mb-3">
            <label for="job_title" class="form-label">المسمى الوظيفي (اختياري)</label>
            <input type="text" name="job_title" class="form-control text-right">
        </div>
        <div class="mb-3">
            <label for="nationality" class="form-label">الجنسية (اختياري)</label>
            <input type="text" name="nationality" class="form-control text-right">
        </div>
        <div class="mb-3">
            <label for="availability_times" class="form-label">أوقات التفرغ (اختياري)</label>
            <textarea name="availability_times" id="availability_times" class="form-control text-right"></textarea>
        </div>
        <div class="mb-3">
            <label for="motivation" class="form-label">الدوافع للمشاركة (اختياري)</label>
            <textarea name="motivation" id="motivation" class="form-control text-right"></textarea>
        </div>
        <div class="mb-3">
            <label for="is_active" class="form-label">نشط / غير نشط (اختياري)</label>
            <select name="is_active" id="is_active" class="form-control text-right">
                <option value="1" selected>نشط</option>
                <option value="0">غير نشط</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="department" class="form-label">القسم (اختياري)</label>
            <input type="text" name="department" class="form-control text-right">
        </div>
        <div class="mb-3">
            <label for="hiring_date" class="form-label">تاريخ التعيين (اختياري)</label>
            <input type="date" name="hiring_date" id="hiring_date" class="form-control text-right" value="{{ now()->toDateString() }}">
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">العنوان (اختياري)</label>
            <input type="text" name="address" class="form-control text-right">
        </div>
        <div class="mb-3">
            <label for="notes" class="form-label">ملاحظات (اختياري)</label>
            <textarea name="notes" id="notes" class="form-control text-right"></textarea>
        </div>
        <button type="submit" class="btn btn-success">حفظ</button>
    </form>
</div>
@endsection