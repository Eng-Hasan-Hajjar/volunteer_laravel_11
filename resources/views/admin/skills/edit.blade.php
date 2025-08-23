@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper" dir="rtl" style="text-align: right">
<div class="container">
        <div class="col-sm-6" style="float:left ; margin: 10px;">
                <a href="{{ route('skills.index') }}" class="btn btn-outline-secondary float-left">رجوع</a>
            </div>
    <h2>تعديل المهارة</h2>
    
    <form action="{{ route('skills.update', $skill) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="skill_name" class="form-label">اسم المهارة</label>
            <input type="text" name="skill_name" class="form-control" value="{{ $skill->skill_name }}" required>
        </div>
        <button type="submit" class="btn btn-success">تحديث</button>
    </form>
</div>
@endsection