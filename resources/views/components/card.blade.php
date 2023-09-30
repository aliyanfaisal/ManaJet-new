@props(['title', 'tab1', 'tab2'])
<div class="mb-3 card">
    <div class="card-header-tab card-header-tab-animation card-header">
        <div class="card-header-title">
            <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i>
            {!! $title !!}
        </div>

        <ul class="nav">
            @isset($tab1)
                <li class="nav-item"><a href="javascript:void(0);" class="active nav-link">{!!$tab1!!}</a></li>
            @endisset
            @isset($tab2) 
                <li class="nav-item"><a href="javascript:void(0);" class="nav-link second-tab-toggle">{!!$tab2!!}</a></li>
            @endisset
        </ul>
    </div>
    <div class="card-body">
        {{ $slot }}
    </div>
</div>
