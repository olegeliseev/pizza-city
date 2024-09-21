<x-layouts.app page-title="Авторизация">
    <section class="auth-section">
        <div class="container">
            <div class="auth-section__content">
                <h1 class="auth-section__title">Авторизация</h1>

                @if (session('status'))
                    <x-panels.messages.success :messages="(array) session('status')"/>
                @endif

                @if ($errors->any())
                    <x-panels.messages.error :messages="$errors->all()" />
                @endif

                <form class="auth-section__form" action="{{ route('login') }}" method="POST">
                    @csrf

                    <div class="form-block">
                        <label class="form-block__label" for="email-field">Почта:</label>
                        <input class="form__input @error('email') form__input-alert @enderror"
                               placeholder="example@example.com" id="email-field" type="email"
                               name="email" value="{{ old('email') }}" required>
                        @error('email')
                        <span class="form__validation-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-block">
                        <label class="form-block__label" for="password-field">Пароль:</label>
                        <input class="form__input @error('password') form__input-alert @enderror" placeholder="********"
                               id="password-field" type="password"
                               name="password" value="{{ old('password') }}" required>
                        @error('password')
                        <span class="form__validation-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-block__checkbox">
                        <input class="form__checkbox" id="remember-me-field" type="checkbox" name="remember_me"
                               :checked="{{ old('remember_me') }}">
                        <label class="form-block__label" for="remember-me-field">Запомнить меня</label>
                    </div>

                    <div class="form-footer">
                        <button class="form-btn">Войти</button>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="password-reset-link">Забыли пароль?</a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-layouts.app>
