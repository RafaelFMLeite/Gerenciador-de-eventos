<x-guest-layout>
    <div class="d-flex justify-content-center align-items-center min-vh-100 bg-light">
        <div class="card shadow-lg border-0" style="max-width: 400px; width: 100%;">
            <div class="card-body p-5">
                <h3 class="text-center mb-4">{{ __('Log in') }}</h3>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                    <div class="mb-3">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="form-control rounded-pill" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <x-input-label for="password" :value="__('Senha')" />
                        <x-text-input id="password" class="form-control rounded-pill" type="password" name="password" required autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me -->
                    <div class="form-check mb-3">
                        <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                        <label for="remember_me" class="form-check-label">
                            {{ __('Me mantenha conectado') }}
                        </label>
                    </div>

                    <!-- Forgot Password and Submit Button -->
                    <div class="d-flex justify-content-between align-items-center mt-4">
                        @if (Route::has('password.request'))
                            <a class="text-muted small" href="{{ route('password.request') }}">
                                {{ __('Esqueceu a senha?') }}
                            </a>
                        @endif

                        <x-primary-button class="btn btn-primary rounded-pill px-4">
                            {{ __('Entrar') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</x-guest-layout>
