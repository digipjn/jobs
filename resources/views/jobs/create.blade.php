@extends('jobs::layout')

@section('title', 'Job create')

@section('page')
    <job-create/>

    <form>
        @csrf
        <input type="text" name="title">
        <input type="text" name="description">
        <button type="submit">Create</button>
    </form>
@endsection

