@extends('layouts.welcome')
@section('content')

<div class="w-100 vh-100 d-flex align-items-center justify-content-center flex-column text-center position-relative">

    <div class="table-container">
        <h1 class="text-center text-light-green mb-5">User Data Table</h1>
        <div class="row table-title">
            <div class="col col-4">
                <div class="col col-12 text-start">Name</div>
            </div>
            <div class="col col-4">
                <div class="col col-12 text-center">Country</div>
            </div>
            <div class="col col-4">
                <div class="col col-12 text-end">Date Of Birth</div>
            </div>
        </div>

        <table class="table">
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td class="text-start">{{ $user->name }}</td>
                    <td class="text-center">{{ $user->country->name}}</td>
                    <td class="text-end">{{ $user->birthday }}</td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>

</div>