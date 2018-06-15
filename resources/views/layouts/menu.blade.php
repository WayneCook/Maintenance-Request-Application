<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-edit"></i><span>Users</span></a>
</li>

<li class="{{ Request::is('workOrders*') ? 'active' : '' }}">
    <a href="{!! route('workOrders.index') !!}"><i class="fa fa-edit"></i><span>Work Orders</span></a>
</li>
