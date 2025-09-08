<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'payment_receipt' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'name.required' => 'الاسم مطلوب.',
            'name.string' => 'الاسم يجب أن يكون نصًا.',
            'name.max' => 'الاسم لا يمكن أن يتجاوز 255 حرفًا.',
            'email.required' => 'البريد الإلكتروني مطلوب.',
            'email.string' => 'البريد الإلكتروني يجب أن يكون نصًا.',
            'email.lowercase' => 'البريد الإلكتروني يجب أن يحتوي على أحرف صغيرة فقط.',
            'email.email' => 'البريد الإلكتروني غير صالح.',
            'email.max' => 'البريد الإلكتروني لا يمكن أن يتجاوز 255 حرفًا.',
            'email.unique' => 'البريد الإلكتروني مستخدم بالفعل.',
            'password.required' => 'كلمة المرور مطلوبة.',
            'password.confirmed' => 'تأكيد كلمة المرور غير متطابق.',
            'password' => 'كلمة المرور يجب أن تكون قوية (تحتوي على أحرف كبيرة وصغيرة وأرقام ورموز).',
            'profile_image.image' => 'صورة الملف الشخصي يجب أن تكون صورة.',
            'profile_image.mimes' => 'صورة الملف الشخصي يجب أن تكون من نوع: jpeg, png, jpg, gif.',
            'profile_image.max' => 'حجم صورة الملف الشخصي لا يمكن أن يتجاوز 2 ميغابايت.',
            'payment_receipt.image' => 'إيصال الدفع يجب أن يكون صورة.',
            'payment_receipt.mimes' => 'إيصال الدفع يجب أن يكون من نوع: jpeg, png, jpg, gif.',
            'payment_receipt.max' => 'حجم إيصال الدفع لا يمكن أن يتجاوز 2 ميغابايت.',
        ]);

        // رفع الصور إذا تم توفيرها
        $profileImagePath = $request->hasFile('profile_image') 
            ? $request->file('profile_image')->store('users/profile_images', 'public') 
            : null;

        $paymentReceiptPath = $request->hasFile('payment_receipt') 
            ? $request->file('payment_receipt')->store('users/payment_receipts', 'public') 
            : null;

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'profile_image' => $profileImagePath,
            'payment_receipt' => $paymentReceiptPath,
        ]);
        
        // تعيين الدور الافتراضي "user"
        $defaultRole = Role::where('name', 'user')->first();
        if ($defaultRole) {
            $user->roles()->attach($defaultRole->id);
        }

        event(new Registered($user));
        Auth::login($user);

        // جلب دور المستخدم بعد تسجيل الدخول
        $userRoleId = $user->roles()->first()->id ?? null;

        if ($userRoleId == 3) {
            return redirect(route('dashboard', absolute: false));
        } else {
            return redirect(route('dashboard', absolute: false));
        }
    }
}