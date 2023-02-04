@extends('admin.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-10">
                        Добавить категории
                    </div>
                    <div class="col-2">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
                            Добавить
                        </button>
                    </div>
                </div>
                <!-- Button trigger modal -->
            </div>

            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
                 aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Добавить категория</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="create_modal" action="{{route('admin.category.store')}}" method="post">
                            @csrf
                            @method('POST')
                            <div class="modal-body">

                                <label for="category">Введите название</label>
                                <input type="text" name="name" class="form-control" required>
                                <label for="category_id">Родительская категория</label>
                                <select name="parent_id" class="form-control">
                                    <option value=""></option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                                <button type="submit" class="btn btn-primary">Сохранить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Название</th>
                        <th>Действие</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td>
{{--                                <button type="button" class="btn btn-warning">--}}
{{--                                    <i class="fas fa-pencil"></i>Изменить--}}
{{--                                </button>--}}
                                <a href="{{ route("admin.category.delete", $category->id) }}"
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
@section('script')
    @if(session('success'))

        <script>
            Swal.fire(
                '{{Session::get("message")}}',
                'Выполнено успешно!',
                'success'
            )
        </script>
    @endif

    <script>
        let category = @json($categories);

        var modal = document.getElementById("create_modal");
        var btn = document.getElementById("myBtn");

        function edit(id) {
            for (let i = 0; i < category.length; i++) {
                if (id == category[i]['id']) {
                    $('#namee').val(category[i]['name']);
                    $('#salee').val(category[i]['sale']);
                }
            }
            // modal1.style.display = "block";
            //  $('#editForm').attr('action', '/admin/custumer_categories/' + id);
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function () {
            modal.style.display = "none";
        }
        span1.onclick = function () {
            modal1.style.display = "none";
        }
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
    <script>
        $('.show_confirm').click(function (event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: `Haqiqatan ham bu yozuvni oʻchirib tashlamoqchimisiz?`,
                text: "Agar siz buni o'chirib tashlasangiz, u abadiy yo'qoladi.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                buttons: ['Yo`q', 'Ha']
            }).then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
        });
    </script>
@endsection
