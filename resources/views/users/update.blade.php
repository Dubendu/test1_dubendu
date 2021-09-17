@extends('admin.master')
@section('updateuser')
<div class="content-wrapper">
    <div class="container">
        <h1 style="text-align:center;">Update User</h1>
        <button class="btn btn-success" onclick="window.location='{{ url()->previous() }}'">Go Back</button>
        <form class="row g-3" action="{{route('users.update')}}" method="post" enctype="multipart/form-data" id="userForm">
        @csrf
            <input type="hidden" name="id" id="id" value="{{$user['id']}}">
            <div class="col-md-6">
                <label for="firstname" class="form-label">First Name</label>
                <input type="text" class="form-control" id="firstname" name="firstname" value="{{$user['firstname']}}">
                <span id="err1" class="text-danger">@error('firstname'){{$message}}@enderror</span>
            </div>
            <div class="col-md-6">
                <label for="lastname" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lastname" name="lastname" value="{{$user['lastname']}}">
                <span id="err2" class="text-danger">@error('lastname'){{$message}}@enderror</span>
            </div>
            <div class="col-12">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" value="{{$user['email']}}">
                <span id="err3" class="text-danger">@error('email'){{$message}}@enderror</span>
            </div>
            <div class="col-12">
                <label for="contact" class="form-label">Contact No.</label>
                <input type="text" class="form-control" id="contact" name="contact" value="{{$user['contact']}}">
                <span id="err4" class="text-danger">@error('contact'){{$message}}@enderror</span>
            </div>
            <div class="col-12">
                <label for="city" class="form-label">City</label>
                <input type="text" class="form-control" id="city" name="city" value="{{$user['city']}}">
                <span id="err5" class="text-danger">@error('city'){{$message}}@enderror</span>
            </div>
            <label class="form-label"id="gender">Gender</label>
            <span id="err6" class="text-danger"></span>
            <div class="col-12 form-check form-check-inline">
                <input type="radio" name="gender" id="male" class="form-check-input" value="male" onclick="yesnoCheck(this);">
                <label class="form-check-label">Male</label>
                <span name="err6" class="text-danger">@error('gender'){{$message}}@enderror</span>
            </div>
            <div class="col-12 form-check form-check-inline"> 
                <input type="radio" name="gender" id="female" class="form-check-input" value="female">
                <label class="form-check-label">Female</label>
                <span name="err6" class="text-danger">@error('gender'){{$message}}@enderror</span>
            </div>
            <div class="col-12" id="agefield" style="display: none;">
                <label for="age" class="form-label">Age</label> 
                <input type="number" class="form-control" id="age" name="age">
            </div>
            <div class="col-12">
                <label class="form-label">Profile Picture</label>
                <input type="file" id="image" name="image"  class="form-control">
                <span id="err7" class="text-danger">@error('image'){{$message}}@enderror</span>
            </div>
            <div class="col-12">
            <img src="{{asset('uploads/users/'.$user->image)}}" alt="Image" width="80px" height="80px">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </form>
    </div>
</div><br>
<script>
    function yesnoCheck(that) {
        if (that.value == "male") {
            document.getElementById("agefield").style.display = "block";
        } else {
            document.getElementById("agefield").style.display = "none";
        }
    }
</script>
@endsection
    