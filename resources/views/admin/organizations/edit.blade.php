@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h2>تعديل المنظمة</h2>
    <form action="{{ route('organizations.update', $organization) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="organization_name" class="form-label">اسم المنظمة</label>
            <input type="text" name="organization_name" class="form-control" value="{{ $organization->organization_name }}" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">العنوان</label>
            <input type="text" name="address" class="form-control" value="{{ $organization->address }}" required>
        </div>
        <div class="mb-3">
            <label for="time_of_creation" class="form-label">تاريخ الإنشاء</label>
            <input type="datetime-local" name="time_of_creation" class="form-control" value="{{ $organization->time_of_creation ? \Carbon\Carbon::parse($organization->time_of_creation)->format('Y-m-d\TH:i') : '' }}" required>
        </div>
        <button type="submit" class="btn btn-success">تحديث</button>
    </form>
</div>
@endsection