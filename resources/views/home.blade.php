@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User list</div>
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="POST" action="{{ route('adduser') }}">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <input type="text" name="name" title="User name" class="form-group user-name" placeholder="Name" value="{{ old('name') }}" />
                            <input type="date" name="dob" title="Date of birth" placeholder="Date of birth" value="{{ old('dob') }}" />
                            <input type="text" name="email" title="e-mail address(es)" placeholder="e-mail(s)" value="{{ old('email') }}" />
                            <input type="hidden" name="page" value="{{ $users->currentpage() }}">
                            <button type="submit" class="btn btn-primary">Add user</button>
                        </div>
                    </form>
                    <table id="users">
                        <tr>
                            <th>Name</th>
                            <th>Date of birth</th>
                            <th>Email(s)</th>
                        </tr>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->dob }}</td>
                            <td>
                                @foreach ($user->email as $email) {{ $email->email }}<br /> @endforeach
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    <div class="pager">{{ $users->links() }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
