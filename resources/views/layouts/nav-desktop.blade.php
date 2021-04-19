<!-- @Desktop Nav List -->
<!-- Hover effect in custom file -->
<ul class="hidden lg:flex lg:items-center lg:justify-between lg:space-x-4" id="nav-list-desktop">
    <li>
        <a class="relative block hover:text-primary-dark" href="{{ route('cameras') }}">
            Cameras
        </a>
    </li>
    <li>
        <a class="relative block hover:text-primary-dark" href="{{ route('lenses') }}">
            Lenses
        </a>
    </li>
    <li>
        <a class="relative block hover:text-primary-dark" href="{{ route('gallery') }}">
            Gallery
        </a>
    </li>
    <li>
        <a class="relative block hover:text-primary-dark" href="{{ route('contact') }}">
            Contact
        </a>
    </li>
    @if (auth()->user()->isAdmin())
        <li>
            <a class="relative block font-bold hover:text-primary-dark" href="{{ route('admin.dashboard') }}">
                Admin
            </a>
        </li>
    @endif
</ul>
