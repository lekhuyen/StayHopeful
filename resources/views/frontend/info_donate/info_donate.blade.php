{{-- <div class="container-fluid margin-navbar">
    <div class="container">
        <div class="row">
            <div class="col-lg-12" style="display: flex; align-items:center">
                <marquee>
                    <span style="font-size: 20px; margin-left: 20px; color: black;">
                        Total Donate:
                    </span>
                    <span class="odometer" id="odometer" style="font-size: 20px; margin-left: 6px; color: black; vertical-align: inherit">
                        {{ number_format($project->donateinfo->sum('amount'), 2) }}
                    </span>
                
                    @foreach ($project->donateinfo as $donation)
                        <span style="font-size: 20px; margin-left: 20px; color: black;">
                            Mr. {{ $donation->name }}:
                        </span>
                        <span class="odometer" id="odometer" style="font-size: 20px; margin-left: 6px; color: black; vertical-align: inherit">
                            {{ $donation->amount }}
                        </span>
                    @endforeach
                </marquee>
            </div>
        </div>
    </div>
</div> --}}
