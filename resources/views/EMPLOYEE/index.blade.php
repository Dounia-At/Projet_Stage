@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            </div>
            @endif
        <h1>Liste des employees</h1>
        <div class="pull-right ">
            <a href="{{ url('employees/create') }}" class="btn btn-success">Nouveau employee</a>
        </div>
        <br> <br> <br>
        <table class="table">
            <head>
            <tr>
                <th>CIN</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Telephone</th>
                <th>Email</th>
                <th>Adresse</th>
                <th>Actions</th>
            </tr>
            </head>

            <body>
                @foreach($employees as $employee)
                <tr>
                    <td>{{ $employee->cin }} </td>
                    <td>{{ $employee->nom }} </td>
                    <td>{{ $employee->prenom }} </td>
                    <td>{{ $employee->telephone }} </td>
                    <td>{{ $employee->email }} </td>                   
                    <td>{{ $employee->adresse }} </td>
                    <td>
                        <form action="{{ url('employees/'.$employee->id) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <a href="{{ url('employees/'.$employee->id.'/edit') }}" class="btn btn-default">Editer</a>
                        @can('delete', $employee) 
                            <button type="submit" class="btn btn-danger">Supprimer</a>
                        @endcan
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