@extends('admin.master')
@section('usertrash')
<div class="content-wrapper">
    <div class="container">
        <h1 style="text-align:center;">Manage Users Trash</h1>
            <button class="btn btn-success" onclick="window.location='{{ url()->previous() }}'">Go Back</button>
            <table class="table table-striped">
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Contact No.</th>
                    <th>City</th>
                    <th>Gender</th>
                    <th>Age</th>
                    <th>Profile Photo</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                @foreach($users as $user)
                <tr>
                    <td>{{$user['id']}}</td>
                    <td>{{$user['firstname']}}</td>
                    <td>{{$user['lastname']}}</td>
                    <td>{{$user['email']}}</td>
                    <td>{{$user['contact']}}</td>
                    <td>{{$user['city']}}</td>
                    <td>{{$user['gender']}}</td>
                    <td>{{$user['age']}}</td>
                    <td>
                    <img src="{{asset('uploads/users/'.$user->image)}}" alt="Image" width="70px" height="70px">
                    </td>
                    <td>
                        @if($user->status == '1') 
                        <a href="{{route('users.status-update',$user->id)}}" class="btn btn-success">Active</a>
                        @else
                        <a href="{{route('users.status-update',$user->id)}}" class="btn btn-danger">Inactive</a>
                        @endif
                    </td>
                    <td><button class="btn btn-danger"><a class="edit-del-link" onclick="return confirm('Data will delete permanently. Are you want to continue?')" href="{{route('users.force-delete',$user->id)}}">Delete</a></button>
                    <button class="btn btn-success"> <a class="edit-del-link" href="{{route('users.restore',$user->id)}}">Restore</a></button></td>
                </tr>
                @endforeach
            </table> 
    </div> 
</div>
@endsection