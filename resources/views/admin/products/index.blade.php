@extends("admin.app")
@section("content")
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-2">
                        <a href="{{ route("create_product") }}" class="btn btn-primary">
                            Добавить
                        </a>
                    </div>
                </div>
                <!-- Button trigger modal -->
            </div>

            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
{{--                        <th>ID</th>--}}
                        <th>Название</th>
                        <th>Описание</th>
                        <th>Количество</th>
                        <th>Категория</th>
                        <th>Цена</th>
                        <th>Цена со скидкой</th>
                        <th>Изображение</th>
                        <th>Действие</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $item)
                        <tr>
{{--                            <td>{{$item->id}}</td>--}}
                            <td>{{$item->title}}</td>
                            <td>{{$item->description}}</td>
                            <td>{{$item->quantity}}</td>
                            <td>{{$item->category}}</td>
                            <td>{{$item->price}}</td>
                            <td>{{$item->discount_price}}</td>
                            <td>
                                <img src="{{ asset("product/".$item->image) }}" alt="img" style="width: 100px;">
                            </td>
                            <td>
                                <a href="{{ route("edit_product", $item->id) }}"
                                   class="btn btn-warning">Изменить</a>
                                <a href="{{ route("delete_product", $item->id) }}"
                                   class="btn btn-danger">Удалить</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
