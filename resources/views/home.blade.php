@extends('layouts.app')

@section('content')
    <!-- HOME -->
    <section class="home bg-dark" id="home">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="home-wrapper">
                        <h1 class="home-text"><span class="rotate">We Are Moltran,We Are Modern,We are Creative</span></h1>
                        <p class="m-t-30">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed feugiat arcu ut orci
                            porta, eget porttitor felis suscipit.<br /> Sed a nisl ullamcorper, tempus augue at, rutrum
                            lacus. Duis et turpis eros.</p>
                        <h2>{{ Auth::user()->name }} {{ __('You are logged in!') }}</h2>

                        <!-- COUNTDOWN -->
                        <div class="row m-t-40">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                            class="btn btn-primary waves-effect waves-light btn-lg w-lg"><i
                                                class="md md-settings-power"></i> Logout</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /COUNTDOWN -->

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END HOME -->
@endsection

@section('js')
    <script type="text/javascript">
        $(document).ready(function() {

            // Countdown
            // To change date, simply edit: var endDate = "June 26, 2015 20:39:00";
            $(function() {
                var endDate = "January 17, 2016 20:39:00";
                $('.lj-countdown .row').countdown({
                    date: endDate,
                    render: function(data) {
                        $(this.el).html('<div><div><span>' + (parseInt(this.leadingZeros(data
                                .years, 2) * 365) + parseInt(this.leadingZeros(data
                                .days, 2))) + '</span><span>days</span></div><div><span>' +
                            this.leadingZeros(data.hours, 2) +
                            '</span><span>hours</span></div></div><div class="lj-countdown-ms"><div><span>' +
                            this.leadingZeros(data.min, 2) +
                            '</span><span>minutes</span></div><div><span>' + this
                            .leadingZeros(data.sec, 2) +
                            '</span><span>seconds</span></div></div>');
                    }
                });
            });
        });
        $(document).ready(function() {
            $(".home-text .rotate").textrotator({
                animation: "fade",
                speed: 2000
            });
        });
    </script>

    {{-- <script src="{{ asset('backend/assets/comingsoon/jquery.countdown.js') }}"></script> --}}
    <script src="{{ asset('backend/assets/comingsoon/jquery.simple-text-rotator.min.js') }}"></script>
@endsection
