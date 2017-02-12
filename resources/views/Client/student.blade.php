@extends('layouts.clientbase')

<?php $name_of_std = Session::get('std') ?>
@section('title', $name_of_std . ' - CATIA STUDENT' )

@section('username', $name_of_std . ' &nbsp;')

@section('content')

@endsection
