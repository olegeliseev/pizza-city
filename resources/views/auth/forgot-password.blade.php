<x-layouts.app page-title="Восстановление пароля">
    <section class="auth-section">
        <div class="container">
            <div class="auth-section__content">
                <h1 class="auth-section__title">Восстановление пароля</h1>

                @if (session('status'))
                    <x-panels.messages.success :messages="(array) session('status')"/>
                @endif

                <form class="auth-section__form" action="{{ route('password.email') }}" method="POST">
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

                    <div class="form-footer">
                        <button class="form-btn" type="submit">Отправить ссылку на сброс пароля</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-layouts.app>
