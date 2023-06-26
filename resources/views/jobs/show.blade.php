@extends('jobs::layout')

@section('title', 'Job details')

@section('page')
    <job :id="{{ $id }}"/>
@endsection

