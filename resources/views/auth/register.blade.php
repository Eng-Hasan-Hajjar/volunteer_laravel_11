<x-guest-layout>
    <style>
        body, .container, form, .form-label, .form-control, .text-right, .invalid-feedback {
            direction: rtl;
            text-align: right;
        }
        .flex.items-center {
            justify-content: flex-end;
        }
        .me-3, .me-4 {
            margin-left: 0.75rem;
            margin-right: 0;
        }
        x-primary-button {
            margin: 10px;
        }
    </style>

    <h1 style="text-align: center">إنشاء حساب</h1>
    <br>

    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" dir="rtl">
        @csrf

        <!-- الاسم -->
        <div>
            <x-input-label for="name" :value="__('الاسم')" />
            <x-text-input id="name" class="block mt-1 w-full text-right" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- البريد الإلكتروني -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('البريد الإلكتروني')" />
            <x-text-input id="email" class="block mt-1 w-full text-right" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- كلمة المرور -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('كلمة المرور')" />
            <x-text-input id="password" class="block mt-1 w-full text-right" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- تأكيد كلمة المرور -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('تأكيد كلمة المرور')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full text-right" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- الصورة الشخصية -->
        <div class="mt-4">
            <x-input-label for="profile_image" :value="__('الصورة الشخصية (اختياري)')" />
            <x-text-input id="profile_image" class="block mt-1 w-full text-right" type="file" name="profile_image" accept="image/*" />
            <x-input-error :messages="$errors->get('profile_image')" class="mt-2" />
        </div>

        <!-- إيصال الدفع -->
        <div class="mt-4" hidden>
            <x-input-label for="payment_receipt" :value="__('إيصال الدفع (اختياري)')" />
            <x-text-input id="payment_receipt" class="block mt-1 w-full text-right" type="file" name="payment_receipt" accept="image/*" />
            <x-input-error :messages="$errors->get('payment_receipt')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="me-3">
                <a href="{{ route('main_home') }}">الموقع</a>
            </x-primary-button>

            <x-primary-button class="me-4">
                {{ __('تسجيل') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>