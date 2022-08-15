@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
            @endif
        <h1>Liste des employees</h1>
        <div class="pull-right ">
            <a href="{{ url('employees/create') }}" class="btn btn-success">Nouveau employee</a>
        </div>
        <table class="table">
            <head>
            <tr>
                <th>cin</th>
                <th>nom</th>
                <th>prenom</th>
                <th>adresse</th>
                <th>email</th>
                <th>telephone</th>
                <th>Actions</th>
            </tr>
            </head>

            <body>
                @foreach($employees as $employee)
                <tr>
                    <td>{{ $employee->cin }} </td>
                    <td>{{ $employee->nom }} </td>
                    <td>{{ $employee->prenom }} </td>
                    <td>{{ $employee->adresse }} </td>
                    <td>{{ $employee->email }} </td>
                    <td>{{ $employee->telephone }} </td>
                   
                    <td>
                        <form action="{{ url('employees/'.$employee->id) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <a href="{{ url('employees/'.$employee->id.'/edit') }}" class="btn btn-default">Editer</a>
                           <!-- @can('delete', $employee) @endcan-->
                            <button type="submit" class="btn btn-danger">Supprimer</a>
                           
                        </form>    
                    </td>
                </tr>
                @endforeach
            </body>
        </table>

          
        
        </div>
    </div>
</div>

@endsection