@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper" dir="rtl" style="text-align: right">
<div class="container  text-right">
        <div class="col-sm-6" style="float:left ; margin: 10px;">
                <a href="{{ route('skills.index') }}" class="btn btn-outline-secondary float-left">رجوع</a>
            </div>
    <h2>إضافة مهارة جديدة</h2>
    <form action="{{ route('skills.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="skill_name" class="form-label">اسم المهارة</label>
            <input type="text" name="skill_name" class="form-control text-right" required>
        </ aspiration>
        <button type="submit" class="btn btn-success">حفظ</button>
    </form>
</div>
@endsection