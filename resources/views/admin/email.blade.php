@extends('admin.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h1>Send Email to {{ $order->user->email }}</h1>
                <form action="{{ route('send_user_email', $order->id) }}" method="post">
                    @csrf
                    <div class="mt-4">
                        <label for="greeting">Email Greeting: </label>
                        <input type="text" class="form-control" name="greeting" id="greeting">
                    </div>
                    <div class="mt-4">
                        <label for="firstline">Email FirstLine: </label>
                        <input type="text" class="form-control" name="firstline" id="firstline">
                    </div>
                    <div class="mt-4">
                        <label for="body">Email Body: </label>
                        <input type="text" class="form-control" name="body" id="body">
                    </div>
                    <div class="mt-4">
                        <label for="button">Email Button name: </label>
                        <input type="text" class="form-control" name="button" id="button">
                    </div>
                    <div class="mt-4">
                        <label for="url">Email Url: </label>
                        <input type="text" class="form-control" name="url" id="url">
                    </div>
                    <div class="mt-4">
                        <label for="lastline">Email Last Line: </label>
                        <input type="text" class="form-control" name="lastline" id="lastline">
                    </div>
                    <div class="mt-4">
                        <input type="submit" class="btn btn-primary" value="Send Email">
                    </div>


                </form>
            </div>
        </div>
    </div>
@endsection
