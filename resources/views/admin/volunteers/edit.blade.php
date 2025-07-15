@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h2>تعديل المتطوع</h2>
    <form action="{{ route('volunteers.update', $volunteer) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="id_person" class="form-label">الشخص</label>
            <select name="id_person" class="form-control" required>
                <option value="">اختر الشخص</option>
                @foreach($people as $person)
                    <option value="{{ $person->id }}" {{ $volunteer->id_person == $person->id_coordinator ? 'selected' : '' }}>
                        {{ $person->name ?? 'غير متوفر' }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">تحديث</button>
    </form>
</div>
@endsection