@extends('layouts.main')
@section('users')
    active
@endsection
@section('content')
                <div class="col-lg-6 col-sm-12 card card-body">
                    <h3>Add User</h3>
                    <form action="{{route('user.save')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="">
                        </div>
                        <div class="form-group">
                            <label for="name">Username</label>
                            <input type="text" name="username" class="form-control" id="">
                        </div>
                        <div class="form-group">
                            <label for="name">Position</label>
                            <div class="form-group m-0">
                                <input type="checkbox" name="position[]" value="admin" id="">
                                <label for="">Admin</label>
                            </div>
                            <div class="form-group m-0">
                                <input type="checkbox" name="position[]" value="gcg" id="">
                                <label for="">Game Changers Generation</label>
                            </div>
                            <div class="form-group m-0">
                                <input type="checkbox" name="position[]" value="welfare" id="">
                                <label for="">Welfare</label>
                            </div>
                            <div class="form-group m-0">
                                <input type="checkbox" name="position[]" value="woh" id="">
                                <label for="">Women Of Honour</label>
                            </div>
                            {{-- <input type="text" name="name" class="form-control" id="" value="{{$userdetails->name}}"> --}}
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
         
@endsection
