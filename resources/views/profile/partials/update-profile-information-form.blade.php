@extends('admin.layouts.app')

@section('content')
<style>
    body, .container, .card, .form-group, .modal-content {
        direction: rtl;
        text-align: right;
    }
    .card-header, .card-body, .modal-header, .modal-body {
        text-align: right;
    }
    .form-control, .btn, .text-muted, .text-sm, .invalid-feedback {
        text-align: right;
    }
    .btn-link {
        display: inline-block;
    }
    .img-circle {
        margin-right: auto;
        margin-left: auto;
    }
    .fas {
        margin-left: 0.5rem;
        margin-right: 0;
    }
</style>

<div class="container">
    <div style="margin-top: 50px"
    <div class="row justify-content-right">
        <div class="col-md-8">
            <div class="card"style="text-align: center">
                <div class="card-header bg-primary text-white"style="text-align: center">
                    <h3 class="card-title " style="text-align: right; float: right;">{{ __('معلومات الملف الشخصي') }}</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted mb-4">{{ __('قم بتحديث معلومات ملفك الشخصي، عنوان البريد الإلكتروني، وتحميل صورة الملف الشخصي أو إيصال الدفع.') }}</p>

                    <!-- Profile Picture Preview -->
                    <div class="text-center mb-4">
                        @if(auth()->user()->profile_image)
                            <img src="{{ asset(auth()->user()->profile_image) }}" class="img-circle elevation-2" width="80" height="80" alt="صورة الملف الشخصي">
                        @else
                            <span class="text-muted">لم يتم تحميل صورة الملف الشخصي.</span>
                        @endif
                    </div>

                    <!-- Verification Email Form -->
                    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                        @csrf
                    </form>

                    <!-- Profile Update Form -->
                    <form method="post" action="{{ route('profile.update') }}" class="space-y-4" enctype="multipart/form-data">
                        @csrf
                        @method('patch')

                        <!-- Name Field -->
                        <div class="form-group">
                            <label for="name" class="form-label">{{ __('الاسم') }}</label>
                            <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Email Field -->
                        <div class="form-group">
                            <label for="email" class="form-label">{{ __('البريد الإلكتروني') }}</label>
                            <input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" required autocomplete="username">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                                <div class="mt-2">
                                    <p class="text-sm text-gray-600">
                                        {{ __('عنوان بريدك الإلكتروني غير مُتحقق.') }}
                                        <button form="send-verification" class="btn btn-link p-0 text-sm text-primary">
                                            {{ __('انقر هنا لإعادة إرسال بريد التحقق.') }}
                                        </button>
                                    </p>
                                    @if (session('status') === 'verification-link-sent')
                                        <p class="text-sm text-success mt-2">{{ __('تم إرسال رابط تحقق جديد إلى عنوان بريدك الإلكتروني.') }}</p>
                                    @endif
                                </div>
                            @endif
                        </div>

                        <!-- Profile Picture Upload -->
                        <div class="form-group">
                            <label for="profile_image" class="form-label">{{ __('صورة الملف الشخصي') }}</label>
                            <input type="file" name="profile_image" id="profile_image" class="form-control @error('profile_image') is-invalid @enderror" accept="image/*">
                            @error('profile_image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            @if(auth()->user()->profile_image)
                                <img src="{{ asset(auth()->user()->profile_image) }}" class="mt-2 img-circle elevation-1" width="60" alt="صورة الملف الشخصي الحالية">
                            @endif
                        </div>

                        <!-- Payment Receipt Upload -->
                        <div class="form-group" hidden>
                            <label for="payment_receipt" class="form-label">{{ __('إيصال الدفع') }}</label>
                            <input type="file" name="payment_receipt" id="payment_receipt" class="form-control @error('payment_receipt') is-invalid @enderror" accept="image/*">
                            @error('payment_receipt')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            @if(auth()->user()->payment_receipt)
                                <img src="{{ asset(auth()->user()->payment_receipt) }}" class="mt-2 img-circle elevation-1" width="60" alt="إيصال الدفع الحالي">
                            @endif
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> {{ __('حفظ') }}
                            </button>
                            @if (session('status') === 'profile-updated')
                                <span class="text-sm text-success ml-2">{{ __('تم الحفظ.') }}</span>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-right">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title"style="text-align: right; float: right;">{{ __('تحديث كلمة المرور') }}</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted mb-4">{{ __('تأكد من أن حسابك يستخدم كلمة مرور طويلة وعشوائية للحفاظ على الأمان.') }}</p>

                    <form method="post" action="{{ route('password.update') }}" class="space-y-4">
                        @csrf
                        @method('put')

                        <!-- Current Password Field -->
                        <div class="form-group">
                            <label for="update_password_current_password" class="form-label">{{ __('كلمة المرور الحالية') }}</label>
                            <input id="update_password_current_password" name="current_password" type="password" class="form-control @error('current_password', 'updatePassword') is-invalid @enderror" autocomplete="current-password">
                            @error('current_password', 'updatePassword')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- New Password Field -->
                        <div class="form-group">
                            <label for="update_password_password" class="form-label">{{ __('كلمة المرور الجديدة') }}</label>
                            <input id="update_password_password" name="password" type="password" class="form-control @error('password', 'updatePassword') is-invalid @enderror" autocomplete="new-password">
                            @error('password', 'updatePassword')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Confirm Password Field -->
                        <div class="form-group">
                            <label for="update_password_password_confirmation" class="form-label">{{ __('تأكيد كلمة المرور') }}</label>
                            <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="form-control @error('password_confirmation', 'updatePassword') is-invalid @enderror" autocomplete="new-password">
                            @error('password_confirmation', 'updatePassword')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> {{ __('حفظ') }}
                            </button>
                            @if (session('status') === 'password-updated')
                                <span class="text-sm text-success ml-2">{{ __('تم الحفظ.') }}</span>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-right">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-danger text-white">
                    <h3 class="card-title"style="text-align: right; float: right;">{{ __('حذف الحساب') }}</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted mb-4">{{ __('بمجرد حذف حسابك، سيتم حذف جميع موارده وبياناته نهائيًا. يرجى تنزيل أي بيانات أو معلومات ترغب في الاحتفاظ بها قبل المتابعة.') }}</p>

                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirm-user-deletion">
                        <i class="fas fa-trash"></i> {{ __('حذف الحساب') }}
                    </button>

                    <!-- Delete Account Modal -->
                    <div class="modal fade" id="confirm-user-deletion" tabindex="-1" role="dialog" aria-labelledby="confirm-user-deletion-label" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-danger text-white">
                                    <h5 class="modal-title" id="confirm-user-deletion-label">{{ __('تأكيد حذف الحساب') }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form method="post" action="{{ route('profile.destroy') }}" class="p-4">
                                    @csrf
                                    @method('delete')

                                    <div class="form-group">
                                        <p class="text-sm text-gray-600">{{ __('يرجى إدخال كلمة المرور لتأكيد رغبتك في حذف حسابك نهائيًا.') }}</p>
                                        <input id="password" name="password" type="password" class="form-control @error('password', 'userDeletion') is-invalid @enderror" placeholder="{{ __('كلمة المرور') }}">
                                        @error('password', 'userDeletion')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group text-right">
                                        <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">{{ __('إلغاء') }}</button>
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fas fa-trash"></i> {{ __('حذف الحساب') }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection