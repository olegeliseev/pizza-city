@props(['product'])
<div class="description-block">
    <div class="description-block__header">
        <h2>Описание</h2>
    </div>
    <div class="description-block__content">
        <p>{{ $product->description }}</p>
    </div>
</div>
