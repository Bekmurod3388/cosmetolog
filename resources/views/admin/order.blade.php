@extends('admin.app')
@section('content')
    <div class="container">
        <div class="card">
            {{--            <div class="card-header">--}}
            {{--                <div class="row">--}}
            {{--                    <div class="col-10">--}}
            {{--                        Добавить категории--}}
            {{--                    </div>--}}
            {{--                    <div class="col-2">--}}
            {{--                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">--}}
            {{--                            Добавить--}}
            {{--                        </button>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}

            <div class="card-body">
                <table id="myTable" class="table table-hover w-100">
                    <thead>
                    <tr>
                        <th>Имя</th>
                        {{--                        <th>Email</th>--}}
                        <th>Адрес</th>
                        <th>Телефон</th>
                        <th>Название продукта</th>
                        <th>Количество</th>
                        <th>Цена</th>
                        <th>Статус платежа</th>
                        <th>Доставка</th>
                        <th>Изображение</th>
                        <th>Доставлено</th>
                        <th>Распечатать PDF</th>
                        <th>Отправить письмо</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $item)
                        <tr>
                            <td>{{ $item->user->name }}</td>
                            {{--                            <td>{{ $item->user->email }}</td>--}}
                            <td>{{ $item->user->address }}</td>
                            <td>{{ $item->user->phone }}</td>
                            <td>{{ $item->product->title }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->price * $item->quantity}}$</td>
                            <td>{{ $item->payment_status }}</td>
                            <td>{{ $item->delivery_status }}</td>
                            <td>
                                <img style="width: 100%" src="{{ asset('product/'.$item->product->image) }}" alt="">
                            </td>
                            <td>
                                @if($item->delivery_status == "обработка")
                                    <a href="{{ route('delivered', $item->id) }}"
                                       onclick="return confirm('Вы уверены, что этот товар доставлен!!!')"
                                       class="btn btn-primary">Доставлено</a>
                                @else
                                    <p>Доставлено</p>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('print_pdf', $item->id) }}" class="btn btn-secondary">Распечатать PDF</a>
                            </td>
                            <td>
                                <a href="{{ route('send_email', $item->id) }}" class="btn btn-info">Отправить письмо</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        function myFunction() {
            var input, filter, table, tr, td, i;
            input = document.getElementById("search");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 1; i < tr.length; i++) {
                console.log(tr[i].innerHTML.toUpperCase())
                if (tr[i].innerHTML.toUpperCase().indexOf(filter) > -1){
                    tr[i].style.display = "";
                }
                else {
                    tr[i].style.display = "none";
                }
                // td = tr[i].getElementsByTagName("td")[0];
                // if (td) {
                //     if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                //         tr[i].style.display = "";
                //     } else {
                //         tr[i].style.display = "none";
                //     }
                // }
            }
        }
    </script>
@endsection
