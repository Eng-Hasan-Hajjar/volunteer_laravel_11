@extends('admin.layouts.app')

@section('content')
    <section class="content-header" dir="rtl">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 text-right">
                    <h1>إضافة فعالية جديدة</h1>
                </div>
                <div class="col-sm-6">
                    <a href="{{ route('events.index') }}" class="btn btn-default float-left">رجوع</a>
                </div>
            </div>
        </div>
    </section>

    <section class="content" dir="rtl">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body" dir="rtl">
                            @if ($errors->any())
                                <div class="alert alert-danger text-right">
                                    <ul class="mb-0 pr-3">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if (session('error'))
                                <div class="alert alert-danger text-right">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data" dir="rtl">
                                @csrf
                                <div class="form-group text-right">
                                    <label for="event_name">اسم الفعالية</label>
                                    <input type="text" name="event_name" id="event_name" 
                                           class="form-control text-right @error('event_name') is-invalid @enderror" 
                                           value="{{ old('event_name') }}" required
                                           dir="auto">
                                    @error('event_name')
                                        <span class="invalid-feedback d-block">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group text-right">
                                    <label for="start_day">تاريخ البدء</label>
                                    <input type="date" name="start_day" id="start_day" 
                                           class="form-control text-right @error('start_day') is-invalid @enderror" 
                                           value="{{ old('start_day') }}" required>
                                    @error('start_day')
                                        <span class="invalid-feedback d-block">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group text-right">
                                    <label for="end_day">تاريخ الانتهاء</label>
                                    <input type="date" name="end_day" id="end_day" 
                                           class="form-control text-right @error('end_day') is-invalid @enderror" 
                                           value="{{ old('end_day') }}" required>
                                    @error('end_day')
                                        <span class="invalid-feedback d-block">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group text-right">
                                    <label for="id_coordinator">المنسق</label>
                                    <select name="id_coordinator" id="id_coordinator" 
                                            class="form-control text-right @error('id_coordinator') is-invalid @enderror" 
                                            required>
                                        <option value="">اختر المنسق</option>
                                        @foreach($people as $person)
                                            <option value="{{ $person->id }}">{{ $person->name ?? 'غير متوفر' }}</option>
                                        @endforeach
                                    </select>
                                    @error('id_coordinator')
                                        <span class="invalid-feedback d-block">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group text-right">
                                    <label for="main_image">الصورة الرئيسية</label>
                                    <input type="file" name="main_image" id="main_image" class="form-control text-right @error('main_image') is-invalid @enderror">
                                    @error('main_image')
                                        <span class="invalid-feedback d-block">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group text-right">
                                    <label for="gallery_images">معرض الصور (اختياري)</label>
                                    <input type="file" name="gallery_images[]" id="gallery_images" class="form-control text-right @error('gallery_images') is-invalid @enderror" multiple>
                                    @error('gallery_images')
                                        <span class="invalid-feedback d-block">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-success float-left">حفظ</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection