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
                        <label for="exampleName" class="w-40">Name</label>
                        <input type="text" class="flex-1 px-4 py-2 border rounded-lg" name="name" id="exampleName" placeholder="Name" readonly value="{{ Auth::user()->name }}" required>
                    </div>
                    <div class="flex items-center">
                        <label for="exampleEmail" class="w-40">Email</label>
                        <input type="email" class="flex-1 px-4 py-2 border rounded-lg" name="email" id="exampleEmail" placeholder="Email" readonly value="{{ Auth::user()->email }}" required>
                    </div>
                    <div class="flex items-center">
                        <label for="exampleRole" class="w-40">Role</label>
                        <select name="roles[]" id="exampleRole" class="flex-1 px-4 py-2 border rounded-lg" disabled>
                            @foreach ($data['roles'] as $role)
                            <option value="{{ $role }}" {{ in_array($role, $data['userRole']) ? 'selected' : '' }}>{{ $role }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex items-center">
                        <label class="w-40" for="change_password">Change Password</label>
                        <input type="checkbox" name="change_password" id="change_password" disabled class="mt-0.54 rounded-10 duration-250 ease-soft-in-out after:rounded-circle after:shadow-soft-2xl after:duration-250 checked:after:translate-x-5.25 h-5 relative float-left w-10 cursor-pointer appearance-none border border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain bg-left bg-no-repeat align-top transition-all after:absolute after:top-px after:h-4 after:w-4 after:translate-x-px after:bg-white after:content-[''] checked:border-slate-800/95 checked:bg-slate-800/95 checked:bg-none checked:bg-right">
                    </div>
                    <div class="flex items-center password_fields" style="display: none;">
                        <label for="password" class="w-40">New Password</label>
                        <input type="password" class="flex-1 px-4 py-2 border rounded-lg" name="password" id="password" placeholder="New Password">
                    </div>
                    <div class="flex items-center password_fields" style="display: none;">
                        <label for="confirm-password" class="w-40">Confirm Password</label>
                        <input type="password" class="flex-1 px-4 py-2 border rounded-lg" name="confirm-password" id="confirm-password" placeholder="Confirm Password">
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