@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper" dir="rtl" style="text-align: right">
<div class="container text-right" dir="rtl">
     <div class="col-sm-6" style="float:left ; margin: 10px;">
                <a href="{{ route('funding-organizations.index') }}" class="btn btn-outline-secondary float-left">رجوع</a>
            </div>
    <h2>إضافة تمويل منظمة جديد</h2>
    <form action="{{ route('funding-organizations.store') }}" method="POST">
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
            <label for="id_support" class="form-label text-right d-block">الداعم المالي</label>
            <select name="id_support" class="form-control text-right" required>
                <option value="">اختر الداعم المالي</option>
                @foreach($financialSupports as $financialSupport)
                    <option value="{{ $financialSupport->id }}">{{ $financialSupport->type_support }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="funding_value" class="form-label text-right d-block">قيمة التمويل</label>
            <input type="number" name="funding_value" class="form-control text-right" step="0.01" required>
        </div>
        <button type="submit" class="btn btn-success text-right d-block">حفظ</button>
    </form>
</div>
@endsection