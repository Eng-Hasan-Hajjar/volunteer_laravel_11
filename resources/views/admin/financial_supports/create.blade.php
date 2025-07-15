@extends('admin.layouts.app')

@section('content')
<div class="container" dir="rtl">
    <h2 class="text-right">إضافة داعم مالي جديد</h2>
    <form action="{{ route('financial-supports.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id_organization" class="form-label text-right d-block">المنظمة</label>
            <select name="id_organization" class="form-control text-right" required>
                <option value="">اختر المنظمة</option>
                @foreach($organizations as $organization)
                    <option value="{{ $organization->id }}">{{ $organization->organization_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="type_support" class="form-label text-right d-block">نوع الدعم</label>
            <input type="text" name="type_support" class="form-control text-right" required>
        </div>
        <div class="mb-3">
            <label for="funding_value" class="form-label text-right d-block">قيمة التمويل</label>
            <input type="number" name="funding_value" class="form-control text-right" step="0.01" required>
        </div>
        <button type="submit" class="btn btn-success float-right">حفظ</button>
    </form>
</div>
@endsection