@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper" dir="rtl" style="text-align: right">
<div class="container text-right">
     <div class="col-sm-6" style="float:left ; margin: 10px;">
                <a href="{{ route('organizations.index') }}" class="btn btn-outline-secondary float-left">رجوع</a>
            </div>
    <h2>إضافة منظمة جديدة</h2>
    <form action="{{ route('organizations.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="organization_name" class="form-label text-right">اسم المنظمة</label>
            <input type="text" name="organization_name" class="form-control text-right" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">العنوان</label>
            <input type="text" name="address" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="time_of_creation" class="form-label text-right">تاريخ الإنشاء</label>
            <input type="datetime-local" name="time_of_creation" class="form-control text-right" required>
        </div>
        <button type="submit" class="btn btn-success">حفظ</button>
    </form>
</div>
@endsection