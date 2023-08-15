@extends('layouts.navbar')

@section('title')
Contacts
@endsection

@section('content')
<h1 class="mt-5">Contacts</h1>

<table class="table mt-4">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>John Doe</td>
            <td>johndoe@example.com</td>
            <td>123-456-7890</td>
        </tr>
        <tr>
            <td>Jane Smith</td>
            <td>janesmith@example.com</td>
            <td>1-987-654-3210</td>
        </tr>
    </tbody>
</table>
@endsection