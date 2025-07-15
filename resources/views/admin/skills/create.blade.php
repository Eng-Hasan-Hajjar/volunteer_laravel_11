@extends('admin.layouts.app')

@section('content')
<div class="container  text-right">
    <h2>إضافة مهارة جديدة</h2>
    <form action="{{ route('skills.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="skill_name" class="form-label">اسم المهارة</label>
            <input type="text" name="skill_name" class="form-control" required>
        </ aspiration>
        <button type="submit" class="btn btn-success">حفظ</button>
    </form>
</div>
@endsection