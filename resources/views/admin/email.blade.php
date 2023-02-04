@extends('admin.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1>Отправить письмо на {{ $order->user->email }}</h1>
                <form action="{{ route('send_user_email', $order->id) }}" method="post">
                    @csrf
                    <div class="mt-4">
                        <label for="greeting">Электронное приветствие: </label>
                        <input type="text" class="form-control" name="greeting" id="greeting">
                    </div>
                    <div class="mt-4">
                        <label for="firstline">Первая строка электронной почты: </label>
                        <input type="text" class="form-control" name="firstline" id="firstline">
                    </div>
                    <div class="mt-4">
                        <label for="body">Электронная почта: </label>
                        <input type="text" class="form-control" name="body" id="body">
                    </div>
                    <div class="mt-4">
                        <label for="button">Имя кнопки электронной почты: </label>
                        <input type="text" class="form-control" name="button" id="button">
                    </div>
                    <div class="mt-4">
                        <label for="url">Адрес электронной почты: </label>
                        <input type="text" class="form-control" name="url" id="url">
                    </div>
                    <div class="mt-4">
                        <label for="lastline">Последняя строка электронной почты: </label>
                        <input type="text" class="form-control" name="lastline" id="lastline">
                    </div>
                    <div class="mt-4">
                        <input type="submit" class="btn btn-primary" value="Отправить письмо">
                    </div>


                </form>
            </div>
        </div>
    </div>
@endsection
