@extends('admin.layouts.app')

@section('content')



<div class="content-wrapper" dir="rtl" style="text-align: right">











<div class="container text-right">
        <div class="col-sm-6" style="float:left ; margin: 10px;">
                <a href="{{ route('volunteers.index') }}" class="btn btn-outline-secondary float-left">رجوع</a>
            </div>
    <h2>إضافة متطوع جديد</h2>
    <form action="{{ route('volunteers.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="id_person" class="form-label">الشخص</label>
            <select name="id_person" class="form-control" required>
                <option value="">اختر الشخص</option>
                @foreach($people as $person)
                    <option value="{{ $person->id }}">{{ $person->name ?? 'غير متوفر' }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">صورة المتطوع</label>
            <input type="file" name="image" class="form-control" accept="image/*">
        </div>
        <button type="submit" class="btn btn-success">حفظ</button>
    </form>
</div>





@endsection