@extends('template.layout')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                Add Customer
            </div>
    <form action="{{route('customer.store')}}" method="POST">
    {{csrf_field()}}
        <div class="card-body">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label><br>
                <input type="text" class="form-control" name="name" value="{{old('name')}}">
                @if ($errors->has('name'))
                <span class="text-danger">{{$errors->first('name')}}</span>
                @endif
            </div>

            <div class="mb-3">
            <label for="phone" class="form-label">Phone</label><br>
            <input type="number" class="form-control" name="phone" value="{{old('phone')}}">
            @if ($errors->has('phone'))
            <span class="text-danger">{{$errors->first('phone')}}</span>
            @endif
            </div>

            <div class="mb-3">
            <label for="address" class="form-label">Address</label><br>
            <textarea class="form-control" name="address">{{old('address')}}</textarea>
            </div>

            <div class="mb-3">
            <label for="is_member" class="form-label">Member</label><br>
            <select class="form-control" name="is_member">
                <option value="" selected>-- Choose Member --</option>
                <option value=1>Member</option>
                <option value=0>Non-Member</option>
            </select>
            @if ($errors->has('is_member'))
            <span class="text-danger">{{$errors->first('is_member')}}</span>
            @endif
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm">Save</button>
                <a href="{{route('customer.index')}}" class="btn btn-success btn-sm">Back</a>
            </div>
        </div>
            </form>
        </div>
    </div>
</div>
@endsection
