@extends('layout.main')

@section('title')
<title>{{ $data['pageTitle'] }}</title>
@endsection

@section('breadcrumb')
<nav>
    <!-- breadcrumb -->
    <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
        <li class="text-sm leading-normal">
            <a class="opacity-50 text-slate-700" href="javascript:;">Pages</a>
        </li>
        <li class="text-sm pl-2 capitalize leading-normal text-slate-700 before:float-left before:pr-2 before:text-gray-600 before:content-['/']" aria-current="page">{{ $data['breadcrumb'] }}</li>
    </ol>
    <h6 class="mb-0 font-bold capitalize">{{ $data['breadcrumb'] }}</h6>
</nav>
@endsection

@section('content')
<!-- Begin Page Content -->
<div class="container mx-auto">

    <div class="flex justify-between items-center">
        <h2 class="text-2xl">Role Management</h2>
        <div>
            @can('role-create')
            <a href="{{ route('roles.create') }}" class="py-2 px-4 bg-green-500 hover:bg-green-600 text-white rounded-lg">Create New Role</a>
            @endcan
        </div>
    </div>

    @if ($message = Session::get('success'))
    <div class="mt-4 px-4 py-2 bg-green-100 text-green-700 rounded-lg">
        {{ $message }}
    </div>
    @endif

    <table class="w-full mt-4 table-auto border-collapse border border-gray-400">
        <thead>
            <tr>
                <th class="px-4 py-2 bg-gray-200">No</th>
                <th class="px-4 py-2 bg-gray-200">Name</th>
                <th class="px-4 py-2 bg-gray-200" width="280px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data['roles'] as $key => $role)
            <tr>
                <td class="border px-4 py-2">{{ ++$i }}</td>
                <td class="border px-4 py-2">{{ $role->name }}</td>
                <td class="border px-4 py-2">
                    <a href="{{ route('roles.show',$role->id) }}" class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg">Show</a>
                    @can('role-edit')
                    <a href="{{ route('roles.edit',$role->id) }}" class="px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-white rounded-lg">Edit</a>
                    @endcan
                    @can('role-delete')
                    {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id], 'class' => 'inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg']) !!}
                    {!! Form::close() !!}
                    @endcan
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {!! $data['roles']->render() !!}
    </div>

</div>
@endsection