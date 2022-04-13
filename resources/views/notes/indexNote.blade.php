@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="jumbotron">
                    <h1 class="display-4">All Notes </h1>
                    <a class="btn btn-success" href="{{ route('note.create') }}"> create Note</a>
                </div>
            </div>
        </div>
        @if ($Note->count() > 0)
            <div class="row">
            </div>
            <div class="row" style="padding-top: 2%; padding-bottom:3%">
                <div class="container">
                    <div class="col">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Num</th>
                                    <th scope="col">Type</th>
                                    <th scope="col"> Content</th>
                                    <th scope="col"> photo</th>
                                    <th scope="col"> Created at</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($Note as $item)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>{{ $item->type }}</td>
                                        <td>{{ $item->content }}</td>
                                        <td><img src="{{ $item->photo }}" alt="" width="40px" height="30px">
                                        </td>
                                        <td> {{ $item->created_at->diffForHumans() }}</td>
                                        <td>
                                            <a href="{{ route('note.show', $item->id) }}" class="button"> <button
                                                    type="submit" class="btn btn-primary">Show</button></a>
                                            <a href="{{ route('note.edit', $item->id) }}" class="button"> <button
                                                    type="button" class="btn btn-secondary">Edit</button></a>
                                            <form action="{{ route('note.destroy', $item->id) }}" style="display: inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Soft Delete</button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

    </div>
@else
    <div class="row mt-3">

        <div class="alert alert-warning" role="alert">
            No Notes
        </div>

    </div>
    @endif
@endsection
