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

  <div class="flex justify-between">
    <h2 class="text-2xl">Users Management</h2>
    <a href="{{ route('users.create') }}" class="py-2 px-4 bg-green-500 hover:bg-green-600 text-white rounded-lg">Create New User</a>
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
        <th class="px-4 py-2 bg-gray-200">Email</th>
        <th class="px-4 py-2 bg-gray-200">Roles</th>
        <th class="px-4 py-2 bg-gray-200" width="280px">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($data['users'] as $key => $user)
      <tr>
        <td class="border px-4 py-2">{{ ++$i }}</td>
        <td class="border px-4 py-2">{{ $user->name }}</td>
        <td class="border px-4 py-2">{{ $user->email }}</td>
        <td class="border px-4 py-2">
          @if(!empty($user->getRoleNames()))
          @foreach($user->getRoleNames() as $v)
          <span class="px-2 py-1 bg-green-500 text-white rounded-lg">{{ $v }}</span>
          @endforeach
          @endif
        </td>
        <td class="border px-4 py-2">
          <a href="{{ route('users.show',$user->id) }}" class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg">Show</a>
          <a href="{{ route('users.edit',$user->id) }}" class="px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-white rounded-lg">Edit</a>
          {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id], 'class' => 'inline']) !!}
          {!! Form::submit('Delete', ['class' => 'px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded-lg']) !!}
          {!! Form::close() !!}
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

  <div class="mt-4">
    {!! $data['users']->render() !!}
  </div>

  <footer class="pt-4">
    <div class="w-full px-6 mx-auto">
      <div class="flex flex-wrap items-center -mx-3 lg:justify-between">
        <div class="w-full max-w-full px-3 mt-0 mb-6 shrink-0 lg:mb-0 lg:w-1/2 lg:flex-none">
          <div class="text-sm leading-normal text-center text-slate-500 lg:text-left">
            ©
            <script>
              document.write(new Date().getFullYear() + ",");
            </script>
            made with <i class="fa fa-heart"></i> by
            <a href="https://www.creative-tim.com" class="font-semibold text-slate-700" target="_blank">Michael & Creative Tim</a>
            for a better web.
          </div>
        </div>
      </div>
    </div>
  </footer>

</div>
@endsection