
<div class="content-right">

    <div class="box box-widget widget-user">
        <div class="widget-user-header bg-primary">
            <h3 class="widget-user-username m-0">{{ optional($entry->owner)->FullName }}</h3>
            <p class="widget-user-desc">Contact Owner information</p>
        </div>
        <div class="widget-user-image">
            @if(!optional($entry->owner)->profile)
                <img class="img-circle" src="{{ asset('imgs/default-user.png') }}" alt="User Avatar">
            @else
                <img class="img-circle" src="{{ asset('storage/'.$entry->owner->profile) }}" alt="User Avatar">
            @endif
        </div>

        <ul class="nav nav-stacked">
            <li class="mt-5">
                <a href="" class="text-lowercase text-dark">
                    <span class="badge bg-primary">
                        <i class="nav-icon la la-envelope text-white"></i>
                    </span>
                    {{ optional($entry->owner)->con_email }}
                </a>
            </li>
            <li class="pl-3 pb-2 pt-2">
                <span class="badge bg-green phone-icon">
                    <i class="nav-icon la la-phone text-white"></i>
                </span>
                <a href="#" class="text-dark">
                    {{ optional($entry->owner)->con_phone }}
                </a>
            </li>
        </ul>

        <div class="text-center p-4 footer-contact">
            <a href="#" class="text-primary">
                <u>View more infomation</u>
            </a>
        </div>
    </div>

    <div class="box box-widget widget-user">
        <div class="widget-user-header bg-aqua">
            <h3 class="widget-user-username">{{ optional($entry->contact)->FullName }}</h3>
            <p class="widget-user-desc">Contact Agency Information</p>
        </div>
        <div class="widget-user-image">
            @if(!optional($entry->contact)->profile)
                <img class="img-circle" src="{{ asset('imgs/default-user.png') }}" alt="User Avatar">
            @else
                <img class="img-circle" src="{{ asset('storage/'.$entry->contact->profile) }}" alt="User Avatar">
            @endif
        </div>

        <ul class="nav nav-stacked">
            <li class="mt-5">
                <a href="" class="text-lowercase text-dark">
                    <span class="badge bg-primary">
                        <i class="nav-icon la la-envelope text-white"></i>
                    </span>
                    {{ optional($entry->contact)->con_email }}
                </a>
            </li>
            <li class="pl-3 pb-2 pt-2">
                <span class="badge bg-green phone-icon">
                    <i class="nav-icon la la-phone text-white"></i>
                </span>
                <a href="#" class="text-dark">
                    {{ optional($entry->contact)->con_phone }}
                </a>
            </li>
        </ul>

        <div class="text-center p-4 footer-contact">
            <a href="#" class="text-primary">
                <u>View more infomation</u>
            </a>
        </div>
    </div>

</div>