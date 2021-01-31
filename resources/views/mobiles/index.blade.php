@extends('mobiles.layouts')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Mobile </h2>
            </div>
            <div style="margin-top: 10px;">
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{route('mobiles.create')}}" title="Create a project"> <i class="fas fa-plus-circle"></i>
                    </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered table-responsive-lg">
        <tr>
    
            <th>Mobile ID</th>
            <th>Model</th>
            <th>Country</th>
            <th>Price</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($mobiles as $mobile)
            <tr>
            
                <td>{{ $mobile->mobileId }}</td>
                <td>{{ $mobile->mobile_model }}</td>
                <td>{{ $mobile->mobile_country }}</td>
                <td>{{ $mobile->mobile_price }}</td>

                <td>
                    <form action="{{route('mobiles.destroy', $mobile->id)}}" method="POST">


                        <a href="{{route('mobiles.edit', $mobile->id)}}">
                            <i class="fas fa-edit  fa-lg"></i>

                        </a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="fas fa-trash fa-lg text-danger"></i>

                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>


@endsection