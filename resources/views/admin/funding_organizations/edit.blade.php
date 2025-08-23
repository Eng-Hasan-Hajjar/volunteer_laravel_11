@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper" dir="rtl" style="text-align: right">
<div class="container">
     <div class="col-sm-6" style="float:left ; margin: 10px;">
                <a href="{{ route('funding-organizations.index') }}" class="btn btn-outline-secondary float-left">رجوع</a>
            </div>
    <h2>تعديل تمويل المنظمة</h2>
    <form action="{{ route('funding-organizations.update', $fundingOrganization) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="id_organization" class="form-label">المنظمة</label>
            <select name="id_organization" class="form-control" required>
                <option value="">اختر المنظمة</option>
                @foreach($organizations as $organization)
                    <option value="{{ $organization->id }}" {{ $fundingOrganization->id_organization == $organization->id ? 'selected' : '' }}>
                        {{ $organization->organization_name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="id_support" class="form-label">الداعم المالي</label>
            <select name="id_support" class="form-control" required>
                <option value="">اختر الداعم المالي</option>
                @foreach($financialSupports as $financialSupport)
                    <option value="{{ $financialSupport->id }}" {{ $fundingOrganization->id_support == $financialSupport->id ? 'selected' : '' }}>
                        {{ $financialSupport->type_support }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="funding_value" class="form-label">قيمة التمويل</label>
            <input type="number" name="funding_value" class="form-control" value="{{ $fundingOrganization->funding_value }}" step="0.01" required>
        </div>
        <button type="submit" class="btn btn-success">تحديث</button>
    </form>
</div>
@endsection