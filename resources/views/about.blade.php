@extends('layout')

@section('content')
    <div class="container m-40 ">
        <div class="about container mt-10">
            <div class="mb-3 mt-5">
                <label class="form-label">Name: </label>
                <label class="form-label-info"> Manar Abo Alkheir</label>
            </div>
            <div class="mb-3">
                <label class="form-label">Email: </label>
                <label class="form-label-info"> manarfouaa@gmail.com</label>
            </div>
            <div class="mb-3">
                <label class="form-label">Phone Number: </label>
                <label class="form-label-info"> 07510464437</label>
            </div>
            <div class=" container mt-10">
                <div class="line">
                    <span> </span>
                </div>
            </div>
        </div>
    </div>
@endsection

<style>
    .about {
        margin: 15px;
        margin-top: 30px;
    }

    .form-label {
        font-size: 18px;
        color: #212121;
        font-weight: 600;
    }

    .line::before {
        margin-left: -20px;
        margin-top: 10px;
        position: fixed;
        content: " - ";
        width: 20%;
        height: 2px;
        color: #fff;
        background-color: #212121;
        font-weight: bold;
    }

</style>
