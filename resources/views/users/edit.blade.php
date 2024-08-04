@extends('layouts.main')

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
                <label for="name">roles</label>
                <div class="form-group m-0">
                    <input type="checkbox" name="roles[]" value="admin" id=""
                        {{ in_array('admin', json_decode($userdetails->roles)) ? 'checked' : '' }}>
                    <label for="">Admin</label>
                </div>
                <div class="form-group m-0">
                    <input type="checkbox" name="roles[]" value="gcg"
                        id=""{{ in_array('gcg', json_decode($userdetails->roles)) ? 'checked' : '' }}>
                    <label for="">Game Changers Generation</label>
                </div>
                <div class="form-group m-0">
                    <input type="checkbox" name="roles[]" value="welfare" id=""
                        {{ in_array('welfare', json_decode($userdetails->roles)) ? 'checked' : '' }}>
                    <label for="">Welfare</label>
                </div>
                <div class="form-group m-0">
                    <input type="checkbox" name="roles[]" value="woh" id=""
                        {{ in_array('woh', json_decode($userdetails->roles)) ? 'checked' : '' }}>
                    <label for="">Women Of Honour</label>
                </div>
                {{-- <input type="text" name="name" class="form-control" id="" value="{{$userdetails->name}}"> --}}
            </div>
            <button type="submit">Update</button>
        </form>
    </div>
@endsection
