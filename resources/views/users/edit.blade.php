@extends('layouts.main')
@section('users')
    active
@endsection
@section('content')
    <div class="col-lg-5 col-sm-8 card card-body">
        <h3>Edit User Details</h3>
        <form action="{{ route('user.edit', $userdetails->mask) }}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="" value="{{ $userdetails->name }}">
            </div>
            <div class="form-group">
                <label for="name">Username</label>
                <input type="text" name="username" class="form-control" id=""
                    value="{{ $userdetails->username }}">
            </div>
            <div class="form-group">
                <label for="name">Position</label>
                <div class="form-group m-0">
                    <input type="checkbox" name="position[]" value="admin" id=""
                        {{ in_array('admin', json_decode($userdetails->position)) ? 'checked' : '' }}>
                    <label for="">Admin</label>
                </div>
                <div class="form-group m-0">
                    <input type="checkbox" name="position[]" value="gcg"
                        id=""{{ in_array('gcg', json_decode($userdetails->position)) ? 'checked' : '' }}>
                    <label for="">Game Changers Generation</label>
                </div>
                <div class="form-group m-0">
                    <input type="checkbox" name="position[]" value="welfare" id=""
                        {{ in_array('welfare', json_decode($userdetails->position)) ? 'checked' : '' }}>
                    <label for="">Welfare</label>
                </div>
                <div class="form-group m-0">
                    <input type="checkbox" name="position[]" value="woh" id=""
                        {{ in_array('woh', json_decode($userdetails->position)) ? 'checked' : '' }}>
                    <label for="">Women Of Honour</label>
                </div>
                {{-- <input type="text" name="name" class="form-control" id="" value="{{$userdetails->name}}"> --}}
            </div>
            <button type="submit">Update</button>
        </form>
    </div>
@endsection
