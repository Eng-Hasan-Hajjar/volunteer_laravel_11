@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h2>تعديل المتطوع</h2>
    <form action="{{ route('volunteers.update', $volunteer) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="id_person" class="form-label">الشخص</label>
            <select name="id_person" class="form-control" required>
                <option value="">اختر الشخص</option>
                @foreach($people as $person)
                    <option value="{{ $person->id }}" {{ $volunteer->id_person == $person->id ? 'selected' : '' }}>
                        {{ $person->name ?? 'غير متوفر' }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">صورة المتطوع</label>
            <input type="file" name="image" class="form-control" accept="image/*">
            @if($volunteer->image)
                <img src="{{ $volunteer->image_url }}" alt="Current Image" style="max-width: 150px; margin-top: 10px;">
            @endif
        </div>
        <button type="submit" class="btn btn-success">تحديث</button>
    </form>
</div>
@endsection