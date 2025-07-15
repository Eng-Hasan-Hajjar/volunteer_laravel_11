@extends('admin.layouts.app')

@section('content')
<div class="container  text-right">
    <h2>إضافة شخص جديد</h2>
    <form action="{{ route('people.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">الاسم</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="national_number" class="form-label">الرقم الوطني</label>
            <input type="text" name="national_number" class="form-control" required maxlength="20">
        </div>
        <div class="mb-3">
            <label for="birth_date" class="form-label  text-right">تاريخ الميلاد</label>
            <input type="date" name="birth_date" class="form-control  text-right" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">البريد الإلكتروني</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">حفظ</button>
    </form>
</div>
@endsection