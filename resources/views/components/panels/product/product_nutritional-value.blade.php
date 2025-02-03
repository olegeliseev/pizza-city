@props(['product'])
<div class="nutritional-value-block">
    <div class="nutritional-value-block__header">
        <h2>Пищевая ценность</h2>
    </div>
    <table class="nutritional-value-table">
        <tr class="nutritional-value-table__row">
            <td class="nutritional-value-table__item">Энерг. ценность:</td>
            <td class="nutritional-value-table__item">{{ $product->energy_value }} ккал</td>
        </tr>
        <tr class="nutritional-value-table__row">
            <td class="nutritional-value-table__item">Белки:</td>
            <td class="nutritional-value-table__item">{{ $product->proteins }} г</td>
        </tr>
        <tr class="nutritional-value-table__row">
            <td class="nutritional-value-table__item">Жиры:</td>
            <td class="nutritional-value-table__item">{{ $product->fats }} г</td>
        </tr>
        <tr class="nutritional-value-table__row">
            <td class="nutritional-value-table__item">Углеводы:</td>
            <td class="nutritional-value-table__item">{{ $product->carbohydrates }} г</td>
        </tr>
    </table>
</div>
