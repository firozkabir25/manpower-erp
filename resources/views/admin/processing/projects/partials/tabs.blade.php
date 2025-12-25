<ul class="nav nav-tabs mt-3">
    <li class="nav-item">
        <a class="nav-link active" data-bs-toggle="tab" href="#sales">Sales Price</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" href="#visa">Visa Cost</a>
    </li>
</ul>

<div class="tab-content">
    @include('admin.processing.projects.partials.sales')
    @include('admin.processing.projects.partials.visa')
</div>
