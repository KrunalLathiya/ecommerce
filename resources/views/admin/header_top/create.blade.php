@extends('admin.master')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add New Head Content</h3>
                    </div>
                    @if(\Session::has('success'))
                        <div class="alert alert-success">
                            {{\Session::get('success')}}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div><br />
                    @endif
                    <div class="box-body">
                        <form method="post" action="{{action('HeaderTopController@store')}}">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="notice">Notice</label>
                                <input type="text" name="notice" value="{{$top->notice}}" class="form-control" id="notice" placeholder="Enter notice" required />
                            </div>
                            <div class="form-group">
                                <label for="offer">Offer</label>
                                <input type="text" name="offer" value="{{$top->offer}}" class="form-control" id="offer" placeholder="Enter Category Name" required />
                            </div>
                            <div class="form-group">
                                <label for="mail">E-Mail</label>
                                <input type="email" name="mail" value="{{$top->mail}}" class="form-control" id="mail" placeholder="Enter Email ID" required />
                            </div>
                            <div class="form-group">
                                <label for="facebook">Facebook</label>
                                <input type="text" name="facebook" value="{{$top->facebook}}" class="form-control" id="facebook" placeholder="Enter Facebook URL" required />
                            </div>
                            <div class="form-group">
                                <label for="twitter">Twitter</label>
                                <input type="text" name="twitter" value="{{$top->twitter}}" class="form-control" id="twitter" placeholder="Enter Twitter URL" required />
                            </div>
                            <div class="form-group">
                                <label for="instagram">Instagram</label>
                                <input type="text" name="instagram" value="{{$top->instagram}}" class="form-control" id="instagram" placeholder="Enter Instagram" required />
                            </div>
                            <div class="form-group">
                                <label for="pinterest">Pinterest</label>
                                <input type="text" name="pinterest" value="{{$top->pinterest}}" class="form-control" id="pinterest" placeholder="Enter Pinterest" required />
                            </div>
                            <div class="form-group">
                                <label for="phno">Phone Numer</label>
                                <input type="text" name="phno" value="{{$top->phno}}" class="form-control" id="phno" placeholder="Enter Phone Numer" required />
                            </div>
                            <div class="form-group">
                                <label for="product_name">Address</label>
                                <textarea name="address" cols="3" rows="3" class="form-control" id="address" placeholder="Enter Address" required />{{$top->address}}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection