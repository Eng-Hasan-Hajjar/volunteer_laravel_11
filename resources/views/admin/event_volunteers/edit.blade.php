@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper" dir="rtl" style="text-align: right">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                 <div class="col-sm-6">
                    <a href="{{ route('event-volunteers.index') }}" class="btn btn-default float-sm-left">
                        <i class="fas fa-arrow-right"></i> رجوع
                    </a>
                </div>
                <div class="col-sm-6">
                    <h1 class="m-0 text-right"><i class="fas fa-users"></i> تعديل مشاركة المتطوع في الفعالية</h1>
                </div>
               
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9 mx-auto">
                    <div class="card card-light">
                        <div class="card-header bg-gradient-light">
                            <h3 class="card-title text-right"><i class="fas fa-user-edit"></i> تفاصيل المشاركة</h3>
                        </div>
                        <div class="card-body bg-white text-right">
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

                            <form action="{{ route('event-volunteers.update', $eventVolunteer->id) }}" method="POST" class="text-right">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="id_event" class="form-label text-right">الفعالية <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <select name="id_event" id="id_event" class="form-select @error('id_event') is-invalid @enderror" required>
                                            <option value="">اختر الفعالية</option>
                                            @foreach($events as $event)
                                                <option value="{{ $event->id }}" {{ old('id_event', $eventVolunteer->id_event) == $event->id ? 'selected' : '' }}>
                                                    {{ $event->event_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        @error('id_event')
                                            <span class="invalid-feedback text-right">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="id_volunteer" class="form-label text-right">المتطوع <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <select name="id_volunteer" id="id_volunteer" class="form-select @error('id_volunteer') is-invalid @enderror" required>
                                            <option value="">اختر المتطوع</option>
                                            @foreach($volunteers as $volunteer)
                                                <option value="{{ $volunteer->id }}" {{ old('id_volunteer', $eventVolunteer->id_volunteer) == $volunteer->id ? 'selected' : '' }}>
                                                    {{ $volunteer->person->name ?? 'غير متوفر' }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        @error('id_volunteer')
                                            <span class="invalid-feedback text-right">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-success btn-block text-right">
                                    <i class="fas fa-save"></i> تحديث
                                </button>
                                 <div class="col-sm-6" style="float:left ; margin: 10px;">
                <a href="{{ route('event-volunteers.index') }}" class="btn btn-outline-secondary float-left">رجوع</a>
            </div>
                            </form>
                        </div>
                        <div class="card-footer bg-light text-muted text-center">
                            <small>نظام إدارة المتطوعين © {{ date('Y') }} | تم التطوير بواسطة <a href="#" class="text-primary">فريق العمل</a></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection