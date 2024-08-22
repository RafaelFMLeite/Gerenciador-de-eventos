<x-guest-layout>
    <div class="d-flex justify-content-center align-items-center min-vh-100 bg-light">
        <div class="card shadow-lg border-0" style="max-width: 400px; width: 100%;">
            <div class="card-body p-5">
                <h3 class="text-center mb-3">{{ __('Cadastro') }}</h3>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div class="mb-3">
                        <x-input-label for="name" :value="__('Nome')" />
                        <x-text-input id="name" class="form-control rounded-pill" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div class="mb-3">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="form-control rounded-pill" type="email" name="email" :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <x-input-label for="password" :value="__('Senha')" />
                        <x-text-input id="password" class="form-control rounded-pill" type="password" name="password" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-3">
                        <x-input-label for="password_confirmation" :value="__('Confirmar senha')" />
                        <x-text-input id="password_confirmation" class="form-control rounded-pill" type="password" name="password_confirmation" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <!-- Redirect to Login -->
                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <a class="text-muted small" href="{{ route('login') }}">
                            {{ __('Já tem uma conta?') }}
                        </a>

                        <x-primary-button class="btn btn-primary rounded-pill px-4">
                            {{ __('Cadastrar') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</x-guest-layout>
