<x-layouts.app page-title="Регистрация">
    <section class="auth-section">
        <div class="container">
            <div class="auth-section__content">
                <h1 class="auth-section__title">Регистрация</h1>

                @if (session('status'))
                    <x-panels.messages.flashes :messages="(array) session('status')"/>
                @endif

                <form class="auth-section__form" action="{{ route('register') }}" method="POST">
                    @csrf

                    <div class="form-block">
                        <label class="form-block__label" for="nickname-field">Ваше имя:</label>
                        <input class="form__input @error('name') form__input-alert @enderror" placeholder="Иванов Иван"
                               id="nickname-field" type="text" name="name" value="{{ old('name') }}" required>
                        @error('name')
                        <span class="form__validation-error">{{ $message }}</span>
                        @enderror
                    </div>

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

                    <div class="form-block">
                        <label class="form-block__label" for="confirm-password-field">Подтверждение пароля:</label>
                        <input class="form__input @error('password_confirmation') form__input-alert @enderror"
                               placeholder="********" id="confirm-password-field" type="password"
                               name="password_confirmation" value="{{ old('password_confirmation') }}" required>
                        @error('password_confirmation')
                        <span class="form__validation-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-footer">
                        <button class="form-btn">Регистрация</button>
                        @if (Route::has('password.request'))
                            <a href="{{ route('login') }}" class="already-registered-link">Уже зарегистрированы?</a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-layouts.app>
