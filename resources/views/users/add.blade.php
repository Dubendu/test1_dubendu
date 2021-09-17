@extends('admin.master')
@section('adduser')
<div class="content-wrapper">
    <div class="container">
        <h1 style="text-align:center;">User Registration</h1>
        <button class="btn btn-success" onclick="window.location='{{ url()->previous() }}'">Go Back</button>
        <form class="row g-3" id="userForm" action="{{route('users.store')}}" method="post" enctype="multipart/form-data">
        @csrf
            <div class="col-md-6">
                <label for="firstname" class="form-label">First Name</label>
                <input type="text" class="form-control" id="firstname" name="firstname">
                <span id="err1" class="text-danger">@error('firstname'){{$message}}@enderror</span>
            </div>
            <div class="col-md-6">
                <label for="lastname" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lastname" name="lastname">
                <span id="err2" class="text-danger">@error('lastname'){{$message}}@enderror</span>
            </div>
            <div class="col-12">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="email" name="email">
                <span id="err3" class="text-danger">@error('email'){{$message}}@enderror</span>
            </div>
            <div class="col-12">
                <label for="contact" class="form-label">Contact No.</label>
                <input type="text" class="form-control" id="contact" name="contact">
                <span id="err4" class="text-danger">@error('contact'){{$message}}@enderror</span>
            </div>
            <div class="col-12">
                <label for="city" class="form-label">City</label>
                <input type="text" class="form-control" id="city" name="city">
                <span id="err5" class="text-danger">@error('city'){{$message}}@enderror</span>
            </div>
            <label class="form-label"id="gender" >Gender</label>
            <span id="err6" class="text-danger"></span>
            <div class="col-12 form-check form-check-inline">
                <input type="radio" name="gender" id="male" class="form-check-input" value="male" onclick="yesnoCheck(this);">
                <label class="form-check-label">Male</label>
                <span name="errg" class="text-danger">@error('gender'){{$message}}@enderror</span>
            </div>
            <div class="col-12 form-check form-check-inline"> 
                <input type="radio" name="gender" id="female" class="form-check-input" value="female">
                <label class="form-check-label">Female</label>
                <span name="errg" class="text-danger">@error('gender'){{$message}}@enderror</span>
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
                <label for="status" class="form-label">Status</label>
                <select id="status" class="form-select" name="status">
                    <option></option>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
                <span id="err8" class="text-danger">@error('status'){{$message}}@enderror</span>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </form>
    </div>
</div><br><br>
<script type="text/javascript">
    function yesnoCheck(that) {
        if (that.value == "male") {
            document.getElementById("agefield").style.display = "block";
        } else {
            document.getElementById("agefield").style.display = "none";
        }
    }
    $('#userForm').validate({
        rules:{
            email:{
                remote:'./checkEmail.php',
            },
            contact:{
                remote:'./checkContact.php',
            }
        },
        messages:{
            email:{
                remote:'This Email ID already exist',
            },
            contact:{
                rmeote:'This contact already exist',
            }
        }
    });
</script>
@endsection
 