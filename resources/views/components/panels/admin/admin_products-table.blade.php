<table class="admin-section__table">
    <thead>
    <tr>
        <th>id</th>
        <th>Наименование</th>
        <th>Цена</th>
        <th>Категория</th>
        <th>Новинка</th>
        <th>Хит</th>
        <th></th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->price }} ₽</td>
            <td>Пиццы</td>
            <td>@if($product->new)
                    Да
                @else
                    Нет
                @endif</td>
            <td>@if($product->hit)
                    Да
                @else
                    Нет
                @endif</td>
            <td>
                <a href="{{ route('admin.products.edit', ['product' => $product]) }}" class="admin-section__table__edit-btn" title="Редактировать">
                    <svg xmlns="http://www.w3.org/2000/svg" height="20px" width="20px" viewBox="0 0 20 20"
                         fill="currentColor">
                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
                        <path fill-rule="evenodd"
                              d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                              clip-rule="evenodd"></path>
                    </svg>
                </a>
            </td>
            <td>
                <form action="{{ route('admin.products.destroy', ['product' => $product]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="admin-section__table__delete-btn" title="Удалить" onclick="return confirm('Вы уверены, что хотите удалить эту позицию?')">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20px" width="20px" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
