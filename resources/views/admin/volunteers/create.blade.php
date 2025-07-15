@extends('admin.layouts.app')

@section('content')
<div class="container  text-right">
    <h2>إضافة متطوع جديد</h2>
    <form action="{{ route('volunteers.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id" class="form-label">الشخص</label>
            <select name="id_person" class="form-control" required>
                <option value="">اختر الشخص</option>
                @foreach($people as $person)
                    <option value="{{ $person->id }}">{{ $person->name ?? 'غير متوفر' }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">حفظ</button>
    </form>
</div>
@endsection