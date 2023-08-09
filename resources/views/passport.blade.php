@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Passports') }}

                <a class="navbar-brand" href="{{ route('passport.create') }}">
                    <button type="button" class="btn btn-outline-primary"> Add </button>
                </a>
                
                </div>


                    <table class="table table-dark">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Name</td>
                            <td>Number</td>
                            <td>Nationalty</td>
                            <td>Birth date</td>
                            <td>Expiry date</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($passports as $key =>  $passport)
                            <tr>
                                <td> {{ $key + 1 }} </td>
                                <td>{{ $passport->name }}</td>
                                <td>{{ $passport->number }}</td>
                                <td>{{ $passport->nationalty }}</td>
                                <td>{{ $passport->birth_date }}</td>
                                <td>{{ $passport->expiry_date }}</td>
                                <td>

                                <a class="navbar-brand" href="/passport/{{$passport->id}}">
                                    <button type="button" class="btn btn-outline-success">Edit</button>
                                </a>
                                
                                <form action="{{ url('passport', ['id' => $passport->id]) }}" method="post">
                                    <input class=" btn btn-outline-danger" type="submit" value="Delete" />
                                    <input type="hidden" name="_method" value="delete" />
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    </table>


            </div>
        </div>
    </div>
</div>


@endsection