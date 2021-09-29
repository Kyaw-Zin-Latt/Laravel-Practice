<div class="col-12 col-lg-4 col-xl-3 vh-100 sidebar">
    <div class="d-flex justify-content-between align-items-center py-2 nav-brand">
        <img src="{{ asset(\App\Base::$logo) }}" class="w-100" alt="">
        <button class="hide-sidebar-btn btn btn-light d-block d-lg-none">
            <i class="feather-x text-primary" style="font-size: 2em;"></i>
        </button>
    </div>
    <div class="nav-menu">
        <ul>
            <x-menu-spacer></x-menu-spacer>

            <x-menu-item class="fas fa-home" name="Home" link="{{ route('home') }}"></x-menu-item>

            <x-menu-spacer></x-menu-spacer>


            <x-menu-title title="Item Management"></x-menu-title>
            <x-menu-item class="fas fa-plus-circle" name="Create Item"></x-menu-item>
            <x-menu-item class="fas fa-list" name="Item List" counter="50"></x-menu-item>

            <x-menu-spacer></x-menu-spacer>


            <x-menu-title title="Arcticle Manager"></x-menu-title>
            <x-menu-item class="fas fa-layer-group" name="Manage Category" link="{{ route('category.index') }}"></x-menu-item>


            <x-menu-spacer></x-menu-spacer>


            <x-menu-title title="User Profile"></x-menu-title>
            <x-menu-item name="Your Profile" class="feather-user" link="{{ route('profile') }}"></x-menu-item>
            <x-menu-item name="Change Password" class="feather-refresh-cw" link="{{ route('profile.edit.password') }}"></x-menu-item>
            <x-menu-item name="Update Name & Email" class="feather-message-square" link="{{ route('profile.edit.name.email') }}"></x-menu-item>
            <x-menu-item name="Update photo" class="feather-image" link="{{ route('profile.edit.photo') }}"></x-menu-item>


            <x-menu-spacer></x-menu-spacer>

            <x-menu-spacer></x-menu-spacer>
            <li class="menu-title">
                <a class="btn btn-outline-danger w-100" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
            </li>


        </ul>
    </div>
</div>
