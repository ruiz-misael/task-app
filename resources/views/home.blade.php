@extends('layouts.app')

@section('content')
@if(Auth::user())
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Administrar Notas</div>

                <div class="card-body">
                  <tareas></tareas>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
