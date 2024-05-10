@extends('layout.header')
@section('header_content')
    <a href="home" class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Dashboard</a>
@endsection

@section('dropdown')
<div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
      Dropdown button
    </button>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="profile">Profile</a></li>
      <li><a class="dropdown-item" href="{{route('logout')}}">Logout</a></li>
      <li><a class="dropdown-item" href="#">Something else here in future</a></li>
    </ul>
  </div>
  @endsection
@section('main_head')
    Welcome {{$student_name}}   
@endsection
@section('main_content')
{!!"<h1>Content</h1>"!!}

@endsection