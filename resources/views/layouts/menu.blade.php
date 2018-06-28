
@if (Auth::user()->role_id === 1 ){{-- Admin links --}}
  <li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-user"></i><span>Users</span></a>
  </li>

  <li class="{{ Request::is('workOrders*') ? 'active' : '' }}">
      <a href="{!! route('workOrders.index') !!}"><i class="fa fa-wrench section-icons"></i><span>Work Orders</span></a>
  </li>

@elseif (Auth::user()->role_id === 3) {{-- Resident links --}}
  <li class="{{ Request::is('workOrders*') ? 'active' : '' }}">
    <a href="{{route('user_work_order')}}"><i class="fa fa-wrench section-icons"></i><span>Maintenance Request</span></a>
  </li>

@else {{-- Mantenance links --}}
  <li class="{{ Request::is('workOrders*') ? 'active' : '' }}">
    <a href="{!! route('workOrders.index') !!}"><i class="fa fa-wrench section-icons"></i><span>Work Orders</span></a>
  </li>


@endif
