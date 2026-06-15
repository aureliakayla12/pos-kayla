@extends('template.layout')
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                Customer
            </div>
            <form action="{{route('customer.update', $dataeditcustomer->customer_id)}}" method="POST">
            {{csrf_field()}}
            @method('PUT')
            <div class="card-body">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label><br>
                    <input type="text" class="form-control" name="name" value="{{$dataeditcustomer->name}}" required>
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label><br>
                    <input type="number" class="form-control" name="phone" value="{{$dataeditcustomer->phone}}" required>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Address</label><br>
                    <textarea class="form-control" name="address">{{$dataeditcustomer->address}}</textarea>
                </div>

                <div class="mb-3">
                    <label for="is_member" class="form-label">Member</label>
                    <select name="is_member" class="form-control">
                        <option value=1 {{ old('is_member', $dataeditcustomer->is_member ?? '') == 1 ? 'selected' : ''}}>Member</option>
                        <option value=0 {{ old('is_member', $dataeditcustomer->is_member ?? '') == 0 ? 'selected' : ''}}>Non Member</option>
                    </select>
                    @if ($errors->has('is_member'))
                    <span>{{$errors->first('is_member')}}</span>
                    @endif
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm">Update</button>
                    <a href="{{route('customer.index')}}" class="btn btn-success btn-sm">Back</a>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection
