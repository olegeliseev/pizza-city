@props(['product'])
@csrf
<div class="form-block">
    <label class="form-block__label" for="nickname-field">Наименование:</label>
    <input class="form__input @error('name') form__input-alert @enderror" name="name" placeholder="Маргарита"
           id="nickname-field" type="text"
           value="{{ old('name', $product->name) }}"
    >
    @error('name')
    <span class="form__validation-error">{{ $message }}</span>
    @enderror
</div>

<div class="form-block">
    <label class="form-block__label" for="file-field">Изображение:</label>
    <div class="form-block__preview">
        <img src="@isset($product->image) {{ $product->image }} @else /assets/images/no_product.svg @endisset"
             alt="{{ $product->name }}">
    </div>
    <input class="form__input form__input-file" name="image" id="file-field" type="file">
</div>

<div class="form-block">
    <label class="form-block__label" for="price-field">Цена:</label>
    <input class="form__input @error('price') form__input-alert @enderror" name="price" placeholder="600"
           id="price-field" type="text"
           value="{{ old('price', $product->price) }}"
    >
    @error('name')
    <span class="form__validation-error">{{ $message }}</span>
    @enderror
</div>

<div class="form-block">
    <label class="form-block__label" for="description-field">Описание:</label>
    <textarea class="form__input form__input-textarea" name="description" id="description-field"
              rows="5">{{ old('description', $product->description) }}</textarea>
</div>

<div class="form-block">
    <label class="form-block__label" for="category-field">Категория:</label>
    <select class="form__input form__input-select" id="category-field">
        <option value="pizza" selected>Пиццы</option>
        <option value="snack">Закуски</option>
        <option value="drink">Напитки</option>
        <option value="dessert">Дессерты</option>
    </select>
</div>

<div class="form-block">
    <label class="form-block__label" for="energy-value-field">Энергетическая ценность:</label>
    <div class="energy-value-block">
        <input class="form__input form__input-number" name="energy_value" placeholder="265" id="energy-value-field"
               type="number" value="{{ old('energy_value', $product->energy_value) }}">
        <span class="energy-value-block__text">ккал</span>
    </div>
</div>

<div class="form-block">
    <label class="form-block__label" for="proteins-field">Белки:</label>
    <div class="energy-value-block">
        <input class="form__input form__input-number" name="proteins" placeholder="12.6" id="proteins-field"
               type="number" value="{{ old('proteins', $product->proteins) }}">
        <span class="energy-value-block__text">г</span>
    </div>
</div>

<div class="form-block">
    <label class="form-block__label" for="fats-field">Жиры:</label>
    <div class="energy-value-block">
        <input class="form__input form__input-number" name="fats" placeholder="12.1" id="fats-field" type="number"
               value="{{ old('fats', $product->fats) }}">
        <span class="energy-value-block__text">г</span>
    </div>
</div>

<div class="form-block">
    <label class="form-block__label" for="carbohydrates-field">Углеводы:</label>
    <div class="energy-value-block">
        <input class="form__input form__input-number" name="carbohydrates" placeholder="26.4" id="carbohydrates-field"
               type="number" value="{{ old('carbohydrates', $product->carbohydrates) }}">
        <span class="energy-value-block__text">г</span>
    </div>
</div>

<div class="form-block__checkbox">
    <input class="form__checkbox" name="new" type="checkbox" id="new-field" @checked(old('new', $product->new))>
    <label class="form-block__label" for="new-field">Новинка</label>
</div>

<div class="form-block__checkbox">
    <input class="form__checkbox" name="hit" type="checkbox" id="hit-field" @checked(old('hit', $product->hit))>
    <label class="form-block__label" for="hit-field">Хит</label>
</div>

<div class="form-block">
    <label class="form-block__label" for="tags-field">Теги:</label>
    <input class="form__input" placeholder="Пицца, Моццарелла, Сыр" id="tags-field" type="text">
</div>

<div class="form-footer">
    <button class="form-btn">Сохранить</button>
    <a href="{{ route('admin.products.index') }}" class="form-btn form-btn-cancel">Отменить</a>
</div>
