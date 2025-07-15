@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h2>تعديل المورد</h2>
    <form action="{{ route('employed-available-resources.update', $employedAvailableResource) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="id_coordinator" class="form-label">المنسق</label>
            <select name="id_coordinator" class="form-control" required>
                <option value="">اختر المنسق</option>
                @foreach($people as $person)
                    <option value="{{ $person->id }}" {{ $employedAvailableResource->id_coordinator == $person->id_person ? 'selected' : '' }}>
                        {{ $person->name ?? 'غير متوفر' }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="type_resources" class="form-label">نوع المورد</label>
            <input type="text" name="type_resources" class="form-control" value="{{ $employedAvailableResource->type_resources }}" required>
        </div>
        <div class="mb-3">
            <label for="price_resources" class="form-label">سعر المورد</label>
            <input type="number" name="price_resources" class="form-control" value="{{ $employedAvailableResource->price_resources }}" step="0.01" required>
        </div>
        <button type="submit" class="btn btn-success">تحديث</button>
    </form>
</div>
@endsection