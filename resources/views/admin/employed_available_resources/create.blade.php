@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper" dir="rtl" style="text-align: right">
<div class="container" dir="rtl">
         <div class="col-sm-6" style="float:left ; margin: 10px;">
                <a href="{{ route('employed-available-resources.index') }}" class="btn btn-outline-secondary float-left">رجوع</a>
            </div>
    <h2 class="text-right">إضافة مورد جديد</h2>

    <form action="{{ route('employed-available-resources.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id_coordinator" class="form-label text-right d-block">المنسق</label>
            <select name="id_coordinator" class="form-control text-right" required>
                <option value="">اختر المنسق</option>
                @foreach($people as $person)
                    <option value="{{ $person->id }}">{{ $person->name ?? 'غير متوفر' }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="type_resources" class="form-label text-right d-block">نوع المورد</label>
            <input type="text" name="type_resources" class="form-control text-right" required>
        </div>
        <div class="mb-3">
            <label for="price_resources" class="form-label text-right d-block">سعر المورد</label>
            <input type="number" name="price_resources" class="form-control text-right" step="0.01" required>
        </div>
        <button type="submit" class="btn btn-success float-right">حفظ</button>
          <div class="col-sm-6" style="float:left ; margin: 10px;">
                <a href="{{ route('employed-available-resources.index') }}" class="btn btn-outline-secondary float-left">رجوع</a>
            </div>
    </form>
</div>
@endsection