@extends('layouts.app')


@section('contents')
<style>
        :root {
            --primary: #4361ee;
            --secondary: #3f37c9;
            --success: #4cc9f0;
            --info: #4895ef;
            --warning: #f72585;
            --danger: #e63946;
            --light: #f8f9fa;
            --dark: #212529;
            --background: #f0f2f5;
            --card-bg: #ffffff;
            --text-primary: #333333;
            --text-secondary: #6c757d;
            --border-radius: 12px;
            --box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            --transition: all 0.3s ease;
        }

        body {
            font-family: 'Vazirmatn', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-container {
            width: 100%;
            max-width: 450px;
        }

        .card-custom {
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            border: none;
            transition: var(--transition);
        }

        .card-custom:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
        }

        .card-header-custom {
            background: linear-gradient(120deg, var(--primary), var(--secondary));
            color: white;
            border-radius: var(--border-radius) var(--border-radius) 0 0 !important;
            font-weight: 600;
            font-size: 1.2rem;
            text-align: center;
            padding: 1.2rem;
        }

        .card-body {
            padding: 2rem;
        }

        .form-control-custom {
            border-radius: 8px;
            padding: 0.8rem 1rem;
            border: 1.5px solid #e2e8f0;
            transition: var(--transition);
        }

        .form-control-custom:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.2);
        }

        .form-label {
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--text-primary);
        }

        .btn-login {
            background: linear-gradient(to right, var(--primary), var(--info));
            color: white;
            border: none;
            border-radius: 8px;
            padding: 0.8rem 1.5rem;
            font-weight: 600;
            width: 100%;
            transition: var(--transition);
            box-shadow: 0 4px 10px rgba(67, 97, 238, 0.3);
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(67, 97, 238, 0.4);
            color: white;
        }

        .alert-success {
            background-color: rgba(76, 201, 240, 0.15);
            border: 1px solid rgba(76, 201, 240, 0.3);
            color: #0a6c74;
            border-radius: 8px;
            padding: 0.75rem 1rem;
        }

        .alert-error {
            background-color: rgba(230, 57, 70, 0.15);
            border: 1px solid rgba(230, 57, 70, 0.3);
            color: #b71c1c;
            border-radius: 8px;
            padding: 0.75rem 1rem;
        }

        .register-link {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition);
        }

        .register-link:hover {
            color: var(--secondary);
            text-decoration: underline;
        }

        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            color: var(--text-secondary);
            margin: 1.5rem 0;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #dee2e6;
        }

        .divider::before {
            margin-right: 0.5rem;
        }

        .divider::after {
            margin-left: 0.5rem;
        }
    </style>
<div class="login-container">
        <div class="card card-custom">
            <div class="card-header card-header-custom">
                <i class="bi bi-person-circle me-2"></i>
                ورود به حساب کاربری
            </div>
            <div class="card-body">
                <!-- نمایش پیام های موفقیت یا خطا -->
                @if(Session::has('successRegister'))
                <div class="alert alert-success d-flex align-items-center" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    <div>
                        {{ Session::get('successRegister') }}
                    </div>
                </div>
                @elseif(Session::has('failedInLogin'))
                <div class="alert alert-error d-flex align-items-center" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    <div>
                        {{ Session::get('failedInLogin') }}
                    </div>
                </div>
                @endif

                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="mb-4">
                        <label for="email" class="form-label">
                            <i class="bi bi-envelope me-1"></i>
                            ایمیل <sup class="text-danger">*</sup>
                        </label>
                        <input type="email" id="email" name="email" class="form-control form-control-custom @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="example@email.com">
                        @error('email')
                        <div class="invalid-feedback d-block mt-2">
                            <i class="bi bi-exclamation-circle-fill me-1"></i>
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label">
                            <i class="bi bi-lock me-1"></i>
                            رمز عبور <sup class="text-danger">*</sup>
                        </label>
                        <input type="password" id="password" name="password" class="form-control form-control-custom @error('password') is-invalid @enderror" placeholder="رمز عبور خود را وارد کنید">
                        @error('password')
                        <div class="invalid-feedback d-block mt-2">
                            <i class="bi bi-exclamation-circle-fill me-1"></i>
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>

                    <button class="btn btn-login mb-4" type="submit">
                        <i class="bi bi-box-arrow-in-right me-2"></i>
                        ورود به حساب
                    </button>

                    <div class="divider">
                        یا
                    </div>

                    <div class="text-center">
                        <p class="mb-0">
                            <strong>حساب کاربری ندارید؟</strong>
                        </p>
                        <a href="{{ route('auth.show.register') }}" class="register-link">
                            <i class="bi bi-person-plus me-1"></i>
                            ثبت نام در سایت
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap & Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>


@section('contetns')