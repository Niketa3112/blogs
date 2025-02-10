@include('admin.layouts.header')

@include('admin.layouts.sidebar')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            @yield('content')
        </div>
    </section>
</div>

@include('admin.layouts.footer')
