@extends("admin.app")
@section("content")
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-10">
                        Добавить Продукти
                    </div>
                </div>
                <!-- Button trigger modal -->
            </div>

            <div class="card-body">
                <form action="{{ route('store_product') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mt-4">
                        <label for="title">Название продукта</label>
                        <input type="text" class="form-control" name="title" id="title" required>
                    </div>
                    <div class="mt-4">
                        <label for="description">Описание продукта</label>
                        <input type="text" class="form-control" name="description" id="description" required>
                    </div>
                    <div class="mt-4">
                        <label for="price">Цена продукта</label>
                        <input type="text" class="form-control" name="price" id="price" required>
                    </div>
                    <div class="mt-4">
                        <label for="discount_price">Цена со скидкой</label>
                        <input type="text" class="form-control" name="discount_price" id="discount_price">
                    </div>
                    <div class="mt-4">
                        <label for="quantity">Количество продукта</label>
                        <input type="text" class="form-control" name="quantity" id="quantity" required>
                    </div>
                    <div class="mt-4">
                        <label for="category">Категория продукта</label>
                        <select class="form-control" name="category" id="category" required>
                            @foreach($categories as $item)
                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-4">
                        <label for="image">Изображение продукта здесь</label>
                        <input type="file" class="form-control" name="image" id="image" required>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Сохранить</button>
                </form>
            </div>
        </div>
    </div>
@endsection
