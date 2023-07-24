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

    <!-- Content Row -->
    <div class="grid grid-cols-1 gap-4 lg:grid-cols-12">

        <div class="col-span-12">
            <?php if (!empty($error)) { ?>
                <div class="px-4 py-2 text-white bg-red-500">{{ $error }}</div>
            <?php } ?>
            <?php if (!empty($msg)) { ?>
                <div class="px-4 py-2 text-white bg-green-500">{{ $msg }}</div>
            <?php } ?>

            @if (count($errors) > 0)
            <div class="px-4 py-2 text-white bg-red-500">
                <strong class="font-bold">Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <!-- Approach -->
            <div class="p-4 bg-white rounded-lg shadow">
                <div class="mb-3 font-semibold text-primary flex items-center">
                    <div class="text-3xl text-blue-500">Hello, {{ Auth::user()->name }}</div>
                    <a href="#" onclick="enableInput()" class="hidden sm:inline-block ml-auto px-4 py-2 text-sm font-semibold text-white bg-blue-500 rounded shadow-md hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-300">
                        <i class="fas fa-user-edit fa-sm mr-1 text-white-50"></i> Edit User Profile
                    </a>
                </div>
                <br>
                <form class="space-y-4" action="{{ route('profile.update', $data['user']->id) }}" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="flex items-center">
                        <label for="exampleName" class="w-24">Name</label>
                        <input type="text" class="flex-1 px-4 py-2 border rounded-lg" name="name" id="exampleName" placeholder="Name" readonly value="{{ Auth::user()->name }}" required>
                    </div>
                    <div class="flex items-center">
                        <label for="exampleEmail" class="w-24">Email</label>
                        <input type="email" class="flex-1 px-4 py-2 border rounded-lg" name="email" id="exampleEmail" placeholder="Email" readonly value="{{ Auth::user()->email }}" required>
                    </div>
                    <div class="flex items-center">
                        <label for="exampleRole" class="w-24">Role</label>
                        <select name="roles[]" id="exampleRole" class="flex-1 px-4 py-2 border rounded-lg" disabled>
                            @foreach ($data['roles'] as $role)
                            <option value="{{ $role }}" {{ in_array($role, $data['userRole']) ? 'selected' : '' }}>{{ $role }}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <button type="submit" id="submit" class="w-full px-4 py-2 text-white bg-blue-500 rounded-md shadow-md hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-300" disabled>
                        Update Profile
                    </button>
                </form>
            </div>
        </div>

    </div>

</div>
<!-- /.container -->
@endsection