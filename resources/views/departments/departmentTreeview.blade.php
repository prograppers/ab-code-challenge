<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@foreach($parentDepartments as $department)

    {{$department->name}}

    @if(count($department->subdepartment))
        @include('departments.subDepartmentList',['subdepartments' => $department->subdepartment])
    @endif

@endforeach
