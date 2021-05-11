<div class="">
    <h1 class="text-2xl font-bold md:text-4xl">My Profile</h1>
    <div class="py-8 flex items-center space-x-4">
        <img class="w-16 h-16 rounded-full md:w-24 md:h-24" src="{{ asset('assets/img/user.png') }}" alt="" id="profileImage">
        <div>
            <p class="font-semibold md:text-xl">{{ ucfirst($user_infos['first_name']) }} {{ ucfirst($user_infos['last_name'])}}</p>
            <p class="text-neutral-light md:text-l">{{ $user_infos['email'] }}</p>
        </div>
    </div>
    @if (session('message'))
        <div class="text-success-dark mt-4 text-sm font-semibold py-4">
            {{ session('message') }}
        </div>
    @endif
</div>
