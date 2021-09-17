@extends('admin.master')
@section('userlist')
<div class="content-wrapper">
    <div class="container">
        <h1 style="text-align:center;">Show Users</h1>
            <button class="btn btn-success" onclick="window.location='{{ url("/users/add") }}'">Add User</button>
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
                    <td><button class="btn btn-danger"><a class="edit-del-link" onclick="return confirm('Are you sure?')" href="{{route('users.delete',$user->id)}}"><i class="fa fa-trash"></i></a></button>
                    <button class="btn btn-warning"> <a class="edit-del-link" href="{{route('users.edit',$user->id)}}"><i class="fa fa-edit"></i></a></button></td>
                </tr>
                @endforeach
            </table> 
    </div> 
    <span style="text-align:center;">{{$users->links()}}</span><br>
</div>
@endsection