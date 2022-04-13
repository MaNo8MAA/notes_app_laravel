@extends('layout')
@section('content')
    <div class="container">
        @php
            $type = ['normal', 'urgent'];
        @endphp
        @if (count($errors) > 0)
            <ul>
                @foreach (@errors->all() as $item)
                    <li>
                        {{ $item }}
                    </li>
                @endforeach
            </ul>
        @endif
        <form action="{{ route('note.store') }}" method="POST" enctype="multipart/form-data">

            @csrf
            <div class="form-group container m-3">
                <h1 style="padding-top:10px;""> Add New Note</h1>
                          <label for=" exampleForControlInput" class="m-2"> Type :</label>
                    <select class="form-control" name="type">
                        @foreach ($type as $item)
                            <option value="{{ $item }}">{{ $item }}</option>
                        @endforeach
                    </select>
            </div>
            <div class="container m-3" style="with:40px">
                <label class="m-2"> Photo :</label>
                <input type="file" name="photo" class="form-control">
            </div>

            <div class="container m-3" style="with:40px">
                <label class="m-2"> Content :</label>
                <textarea name="content" class="form-control"></textarea>

            </div>
            <div class="btn-control container m-3">
                <a href="" class="button"> <button type="submit" class="btn btn-primary">Save</button></a>
                <a href="{{ route('Notes') }}" class="button"> <button type="button"
                        class="btn btn-secondary">Back</button></a>

            </div>
        </form>

    </div>
@endsection
<!--class="list-group-item "-->
