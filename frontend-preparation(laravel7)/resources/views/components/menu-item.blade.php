<li class="menu-item">
    <a href="{{ $link }}" class="menu-item-link {{ Request::url() == $link ? "active" : "" }}">
        <span class="text-uppercase">
            <i class="fa-fw {{ $class }}"></i>
            {{ $name }}
        </span>
        <span class="badge badge-pill bg-white shadow-sm text-primary">{{ $counter }}</span>
    </a>
</li>
