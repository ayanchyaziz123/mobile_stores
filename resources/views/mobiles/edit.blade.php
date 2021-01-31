@extends('mobiles.layouts')

@section('content')
    <div class="row mt-5">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('mobiles.index') }}" title="Go back"> <i class="fas fa-backward "></i> </a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('mobiles.update', $mobiles->id)}}"  method="POST" >
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Mobile ID:</strong>
                    <input type="text" name="mobileId" class="form-control" placeholder="id" value="{{$mobiles->mobileId}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Mobile Model</strong>
                    <textarea class="form-control" style="height:50px" name="mobile_model"
                        placeholder="model">{{$mobiles->mobile_model}}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Country</strong>
                    <input type="text" name="mobile_country" class="form-control" placeholder="country" value="{{$mobiles->mobile_country}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Price</strong>
                    <input type="text" name="mobile_price" class="form-control" placeholder="price" value="{{$mobiles->mobile_price}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection