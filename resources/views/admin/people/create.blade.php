@extends('admin.layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="text-right">إضافة شخص جديد</h1>
            </div>
            <div class="col-sm-6">
                <a href="{{ route('people.index') }}" class="btn btn-outline-secondary float-left">رجوع</a>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline shadow-sm">
                    <div class="card-header">
                        <h3 class="card-title text-right">إدخال بيانات شخص جديد</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('people.store') }}" method="POST" dir="rtl">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name" class="font-weight-bold">الاسم</label>
                                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                                        @error('name')
                                            <span class="invalid-feedback d-block text-right">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="second_name" class="font-weight-bold">الكنية (اختياري)</label>
                                        <input type="text" name="second_name" id="second_name" class="form-control @error('second_name') is-invalid @enderror" value="{{ old('second_name') }}">
                                        @error('second_name')
                                            <span class="invalid-feedback d-block text-right">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="gender" class="font-weight-bold">الجنس (اختياري)</label>
                                        <select name="gender" id="gender" class="form-control @error('gender') is-invalid @enderror">
                                            <option value="">اختر الجنس</option>
                                            <option value="ذكر" {{ old('gender') === 'ذكر' ? 'selected' : '' }}>ذكر</option>
                                            <option value="أنثى" {{ old('gender') === 'أنثى' ? 'selected' : '' }}>أنثى</option>
                                        </select>
                                        @error('gender')
                                            <span class="invalid-feedback d-block text-right">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="national_number" class="font-weight-bold">الرقم الوطني</label>
                                        <input type="text" name="national_number" id="national_number" class="form-control @error('national_number') is-invalid @enderror" value="{{ old('national_number') }}" required maxlength="20">
                                        @error('national_number')
                                            <span class="invalid-feedback d-block text-right">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="birth_date" class="font-weight-bold">تاريخ الميلاد</label>
                                        <input type="date" name="birth_date" id="birth_date" class="form-control @error('birth_date') is-invalid @enderror" value="{{ old('birth_date') }}" required>
                                        @error('birth_date')
                                            <span class="invalid-feedback d-block text-right">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="font-weight-bold">البريد الإلكتروني</label>
                                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                                        @error('email')
                                            <span class="invalid-feedback d-block text-right">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="contact_number" class="font-weight-bold">رقم التواصل (اختياري)</label>
                                        <input type="text" name="contact_number" id="contact_number" class="form-control" value="{{ old('contact_number') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="job_title" class="font-weight-bold">المسمى الوظيفي (اختياري)</label>
                                        <input type="text" name="job_title" id="job_title" class="form-control" value="{{ old('job_title') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="nationality" class="font-weight-bold">الجنسية (اختياري)</label>
                                        <input type="text" name="nationality" id="nationality" class="form-control" value="{{ old('nationality') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="availability_times" class="font-weight-bold">أوقات التفرغ (اختياري)</label>
                                        <textarea name="availability_times" id="availability_times" class="form-control">{{ old('availability_times') }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="motivation" class="font-weight-bold">الدوافع للمشاركة (اختياري)</label>
                                        <textarea name="motivation" id="motivation" class="form-control">{{ old('motivation') }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="is_active" class="font-weight-bold">نشط / غير نشط (اختياري)</label>
                                        <select name="is_active" id="is_active" class="form-control">
                                            <option value="1" {{ old('is_active', 1) == 1 ? 'selected' : '' }}>نشط</option>
                                            <option value="0" {{ old('is_active') == 0 ? 'selected' : '' }}>غير نشط</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="department" class="font-weight-bold">القسم (اختياري)</label>
                                        <input type="text" name="department" id="department" class="form-control" value="{{ old('department') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="hiring_date" class="font-weight-bold">تاريخ التعيين (اختياري)</label>
                                        <input type="date" name="hiring_date" id="hiring_date" class="form-control" value="{{ old('hiring_date', now()->toDateString()) }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="address" class="font-weight-bold">العنوان (اختياري)</label>
                                        <input type="text" name="address" id="address" class="form-control" value="{{ old('address') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="notes" class="font-weight-bold">ملاحظات (اختياري)</label>
                                        <textarea name="notes" id="notes" class="form-control">{{ old('notes') }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-success">حفظ</button>
                                <a href="{{ route('people.index') }}" class="btn btn-secondary mr-2">إلغاء</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
<style>
    .form-group {
        margin-bottom: 1.5rem;
    }
    .form-control {
        border-radius: 0.25rem;
    }
    .invalid-feedback {
        font-size: 0.875rem;
        margin-top: 0.25rem;
    }
    label {
        margin-bottom: 0.5rem;
    }
    .card {
        border-radius: 0.5rem;
    }
    .btn {
        min-width: 100px;
    }
    @media (max-width: 767.98px) {
        .col-md-6 {
            margin-bottom: 1rem;
        }
    }
</style>
@endsection