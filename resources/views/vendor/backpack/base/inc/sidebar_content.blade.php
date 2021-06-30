<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="nav-icon la la-dashboard"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<!-- <li class='nav-item'><a class='nav-link' href='{{ backpack_url('property') }}'><i class='nav-icon la la-question'></i> Properties</a></li> -->

<li class="nav-item nav-dropdown open">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-users"></i> Contacts</a>
    <ul class="nav-dropdown-items">
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('contact') }}">&nbsp;&nbsp;<i class="nav-icon la la-user"></i> Contacts</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('account') }}">&nbsp;&nbsp;<i class="nav-icon la lar la-building"></i> Accounts</a></li>
    </ul>
</li>

<li class="nav-item nav-dropdown open">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-home" aria-hidden="true"></i> Properties</a>
    <ul class="nav-dropdown-items">
        <li class="nav-item open"><a class="nav-link" href="{{ backpack_url('property') }}">&nbsp;&nbsp;<i class="nav-icon la la-list" aria-hidden="true"></i> Property Lists</a></li>
        <li class="nav-item"><a class="nav-link" href="#">&nbsp;&nbsp;<i class="nav-icon la la-plus-square" aria-hidden="true"></i> Add new land</a></li>
        <li class="nav-item"><a class="nav-link" href="#">&nbsp;&nbsp;<i class="nav-icon la la-plus-square" aria-hidden="true"></i> Add new building</a></li>
    </ul>
</li>

<!-- <li class='nav-item'><a class='nav-link' href=''><i class='nav-icon la la-question'></i> Contacts</a></li>
<li class='nav-item'><a class='nav-link' href=''><i class='nav-icon la la-question'></i> Accounts</a></li> -->
<!-- <li class='nav-item'><a class='nav-link' href='{{ backpack_url('unit') }}'><i class='nav-icon la la-question'></i> Units</a></li> -->
<li class="nav-item nav-dropdown open">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-list-alt"></i> Listings</a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('listing') }}'><i class='nav-icon la la-list-alt'></i> Listing list</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('property/create?is_listing=true') }}'><i class='nav-icon la la-plus-square'></i> Add new listing</a></li>
    </ul>
</li>