@extends('admin.layouts.app')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <a href="{{ route('events.index') }}" class="btn btn-default float-sm-left">
                        <i class="fas fa-arrow-right"></i> رجوع
                    </a>
                </div>
                <div class="col-sm-6">
                    <h1 class="m-0 text-right"><i class="fas fa-calendar-alt"></i> تعديل الفعالية</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row text-right">
                <div class="col-md-9 mx-auto">
                    <div class="card card-light text-right">
                        <div class="card-header bg-gradient-light text-right">
                            <h3 class="card-title text-right"><i class="fas fa-calendar-check text-right "></i> تفاصيل الفعالية</h3>
                        </div>
                        <div class="card-body bg-white">
                            @if ($errors->any())
                                <div class="alert alert-danger text-right">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if (session('success'))
                                <div class="alert alert-success text-right">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger text-right">
                                    {{ session('error') }}
                                </div>
                            @endif

                            <form action="{{ route('events.update', $event->id) }}" method="POST" enctype="multipart/form-data" class="text-right">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="event_name" class="form-label">اسم الفعالية <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="text" name="event_name" id="event_name" class="form-control text-right @error('event_name') is-invalid @enderror"
                                               value="{{ old('event_name', $event->event_name) }}" required>
                                        <span class="input-group-text"><i class="fas fa-heading"></i></span>
                                        @error('event_name')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="start_day" class="form-label">تاريخ البدء <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <input type="date" name="start_day" id="start_day" class="form-control @error('start_day') is-invalid @enderror"
                                                       value="{{ old('start_day', $event->start_day) }}" required>
                                                <span class="input-group-text"><i class="fas fa-calendar-day"></i></span>
                                                @error('start_day')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="end_day" class="form-label">تاريخ الانتهاء <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <input type="date" name="end_day" id="end_day" class="form-control @error('end_day') is-invalid @enderror"
                                                       value="{{ old('end_day', $event->end_day) }}" required>
                                                <span class="input-group-text"><i class="fas fa-calendar-check"></i></span>
                                                @error('end_day')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="id_coordinator" class="form-label">المنسق <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <select name="id_coordinator" id="id_coordinator" class="form-select  @error('id_coordinator') is-invalid @enderror" required>
                                            <option value="">اختر المنسق</option>
                                            @foreach($people as $person)
                                                <option value="{{ $person->id }}" {{ old('id_coordinator', $event->id_coordinator) == $person->id ? 'selected' : '' }}>
                                                    {{ $person->name ?? 'غير متوفر' }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="input-group-text"><i class="fas fa-user-tie"></i></span>
                                        @error('id_coordinator')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="main_image">الصورة الرئيسية</label>
                                    <input type="file" name="main_image" id="main_image" class="form-control text-right @error('main_image') is-invalid @enderror">
                                    @if ($event->main_image)
                                        <img src="{{ asset($event->main_image) }}" alt="Main Image" style="max-width: 200px; margin-top: 10px;">
                                    @endif
                                    @error('main_image')
                                        <span class="invalid-feedback d-block">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="gallery_images">معرض الصور (اختياري)</label>
                                    <input type="file" name="gallery_images[]" id="gallery_images" class="form-control text-right @error('gallery_images') is-invalid @enderror" multiple>
                                    @if ($event->galleryImages && $event->galleryImages->count() > 0)
                                        @foreach ($event->galleryImages as $image)
                                            <img src="{{ asset($image->image_path) }}" alt="Gallery Image" style="max-width: 100px; margin: 10px;">
                                        @endforeach
                                    @else
                                        <p style="margin-top: 10px;">لا توجد صور في المعرض</p>
                                    @endif
                                    @error('gallery_images')
                                        <span class="invalid-feedback d-block">{{ $message }}</span>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-success btn-block">
                                    <i class="fas fa-save"></i> تحديث الفعالية
                                </button>
                            </form>
                        </div>
                        <div class="card-footer bg-light text-muted text-center">
                            <small>نظام إدارة الفعاليات © {{ date('Y') }} | تم التطوير بواسطة <a href="#" class="text-primary">فريق العمل</a></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection