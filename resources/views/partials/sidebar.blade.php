<div class="sidebar p-3" style="background-color: #D4BFBB; width: 250px; height: 100vh; position: fixed; top: 0; left: 0;">
    <div class="card mb-2 p-2 border-0" style="background-color: #B09796">
        <img src="{{ asset('images/Pawplanner_logo.png') }}" alt="Logo">
    </div>
    <ul class="nav flex-column">
        @foreach ($menuItems as $item)
            @php
                $currentPet = request()->route('pet');
                $currentPetId = is_object($currentPet) ? $currentPet->id : $currentPet;
            @endphp
            @php
                $isActive = request()->routeIs($item['route'] ?? '')
                    || collect($item['children'] ?? [])->contains(function ($child) use ($currentPetId) {
                        return request()->routeIs($child['route'])
                            && ($child['params']['pet'] ?? null) == $currentPetId;
                    });
            @endphp

            @if (!empty($item['children']))
                <li class="nav-item">
                    <a class="nav-link d-flex justify-content-between {{ $isActive ? '' : 'collapsed' }}" data-bs-toggle="collapse" href="#menu-{{ \Illuminate\Support\Str::slug($item['label']) }}" role="button" aria-expanded="{{ $isActive ? 'true' : 'false' }}" aria-controls="menu-{{ \Illuminate\Support\Str::slug($item['label']) }}">
                        <span><i class="{{ $item['icon'] }}"></i> {{ $item['label'] }}</span>
                        <i class="bi bi-chevron-down small"></i>
                    </a>
                    <div class="collapse {{ $isActive ? 'show' : '' }}" id="menu-{{ \Illuminate\Support\Str::slug($item['label']) }}">
                        <ul class="nav flex-column ms-3">
                            @foreach ($item['children'] as $child)
                                @php
                                    $isChildActive = request()->routeIs($child['route'])
                                        && (
                                            !isset($child['params']['pet'])
                                            || ($child['params']['pet'] == $currentPetId)
                                        );
                                @endphp
                                <li>
                                    <a href="{{ route($child['route'], $child['params'] ?? []) }}" class="nav-link {{ $isChildActive ? 'active fw-bold' : '' }}">
                                        {{ $child['label'] }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
            @else
                <li>
                    <a href="{{ route($item['route']) }}" class="nav-link {{ $isActive ? 'active fw-bold' : '' }}">
                        <i class="{{ $item['icon'] }}"></i> {{ $item['label'] }}
                    </a>
                </li>
            @endif
        @endforeach
    </ul>
</div>