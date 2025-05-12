@include('vendor.layouts.header')


    <form action="{{ route('vendor.logout') }}" method="POST" id="logoutForm">
        @csrf
        <button type="submit">Logout</button>
    </form>
@include('vendor.layouts.footer')
