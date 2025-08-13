@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>تعديل الشخص</h1>
                </div>
                <div class="col-sm-6">
                    <a href="{{ route('people.index') }}" class="btn btn-default float-sm-right">رجوع</a>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('people.update', $person->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="name">الاسم</label>
                                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $person->name) }}">
                                    @error('name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="second_name">الكنية (اختياري)</label>
                                    <input type="text" name="second_name" id="second_name" class="form-control @error('second_name') is-invalid @enderror" value="{{ old('second_name', $person->second_name) }}">
                                    @error('second_name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="gender">الجنس (اختياري)</label>
                                    <select name="gender" id="gender" class="form-control @error('gender') is-invalid @enderror">
                                        <option value="">اختر الجنس</option>
                                        <option value="ذكر" {{ old('gender', $person->gender) === 'ذكر' ? 'selected' : '' }}>ذكر</option>
                                        <option value="أنثى" {{ old('gender', $person->gender) === 'أنثى' ? 'selected' : '' }}>أنثى</option>
                                    </select>
                                    @error('gender')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="national_number">الرقم الوطني</label>
                                    <input type="text" name="national_number" id="national_number" class="form-control @error('national_number') is-invalid @enderror" value="{{ old('national_number', $person->national_number) }}" maxlength="20">
                                    @error('national_number')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="birth_date">تاريخ الميلاد</label>
                                    <input type="date" name="birth_date" id="birth_date" class="form-control @error('birth_date') is-invalid @enderror" value="{{ old('birth_date', $person->birth_date) }}">
                                    @error('birth_date')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">البريد الإلكتروني</label>
                                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $person->email) }}">
                                    @error('email')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="contact_number">رقم التواصل (اختياري)</label>
                                    <input type="text" name="contact_number" id="contact_number" class="form-control" value="{{ old('contact_number', $person->contact_number) }}">
                                </div>
                                <div class="form-group">
                                    <label for="job_title">المسمى الوظيفي (اختياري)</label>
                                    <input type="text" name="job_title" id="job_title" class="form-control" value="{{ old('job_title', $person->job_title) }}">
                                </div>
                                <div class="form-group">
                                    <label for="nationality">الجنسية (اختياري)</label>
                                    <input type="text" name="nationality" id="nationality" class="form-control" value="{{ old('nationality', $person->nationality) }}">
                                </div>
                                <div class="form-group">
                                    <label for="availability_times">أوقات التفرغ (اختياري)</label>
                                    <textarea name="availability_times" id="availability_times" class="form-control">{{ old('availability_times', $person->availability_times) }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="motivation">الدوافع للمشاركة (اختياري)</label>
                                    <textarea name="motivation" id="motivation" class="form-control">{{ old('motivation', $person->motivation) }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="is_active">نشط / غير نشط (اختياري)</label>
                                    <select name="is_active" id="is_active" class="form-control">
                                        <option value="1" {{ old('is_active', $person->is_active) ? 'selected' : '' }}>نشط</option>
                                        <option value="0" {{ old('is_active', $person->is_active) === 0 ? 'selected' : '' }}>غير نشط</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="department">القسم (اختياري)</label>
                                    <input type="text" name="department" id="department" class="form-control" value="{{ old('department', $person->department) }}">
                                </div>
                                <div class="form-group">
                                    <label for="hiring_date">تاريخ التعيين (اختياري)</label>
                                    <input type="date" name="hiring_date" id="hiring_date" class="form-control" value="{{ old('hiring_date', $person->hiring_date ?? now()->toDateString()) }}">
                                </div>
                                <div class="form-group">
                                    <label for="address">العنوان (اختياري)</label>
                                    <input type="text" name="address" id="address" class="form-control" value="{{ old('address', $person->address) }}">
                                </div>
                                <div class="form-group">
                                    <label for="notes">ملاحظات (اختياري)</label>
                                    <textarea name="notes" id="notes" class="form-control">{{ old('notes', $person->notes) }}</textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">تحديث</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection