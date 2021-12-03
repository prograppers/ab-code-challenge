<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@foreach($subdepartments as $subdepartment)
    <ul>
        <li>{{$subdepartment->name}}</li>
        @if(count($subdepartment->subdepartment))
            @include('departments.subDepartmentList',['subdepartments' => $subdepartment->subdepartment])
        @endif
    </ul>
@endforeach
