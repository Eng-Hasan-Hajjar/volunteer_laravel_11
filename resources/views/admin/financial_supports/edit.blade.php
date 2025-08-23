@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper" dir="rtl" style="text-align: right">
<div class="container text-right"  dir="rtl">
     <div class="col-sm-6" style="float:left ; margin: 10px;">
                <a href="{{ route('financial-supports.index') }}" class="btn btn-outline-secondary float-left">رجوع</a>
            </div>
    <h2>تعديل الدعم المالي</h2>
    <form action="{{ route('financial-supports.update', $financialSupport) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="id_organization" class="form-label">المنظمة</label>
            <select name="id_organization" class="form-control" required>
                <option value="">اختر المنظمة</option>
                @foreach($organizations as $organization)
                    <option value="{{ $organization->id }}" {{ $financialSupport->id_organization == $organization->id ? 'selected' : '' }}>
                        {{ $organization->organization_name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="type_support" class="form-label">نوع الدعم</label>
            <input type="text" name="type_support" class="form-control" value="{{ $financialSupport->type_support }}" required>
        </div>
        <div class="mb-3">
            <label for="funding_value" class="form-label">قيمة التمويل</label>
            <input type="number" name="funding_value" class="form-control" value="{{ $financialSupport->funding_value }}" step="0.01" required>
        </div>
        <button type="submit" class="btn btn-success">تحديث</button>
    </form>
</div>
@endsection