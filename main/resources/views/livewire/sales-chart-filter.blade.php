<div poll.3000ms>
    <div class="container">
       <div class="row">
        <div class="col-md-4">
            {{-- <select wire:model="selectedPeriod" class="form-select mb-3">
                <option value="day">Day</option>
                <option value="week">Week</option>
                <option value="month">Month</option>
                <option value="year">Year</option>
            </select> --}}
        </div>
       </div>
    {!! $chart->container() !!} <!-- Render the chart container -->
    
    </div>
    <script src="{{ $chart->cdn() }}"></script>

</div>
    {!! $chart->script() !!} <!-- Render the chart script -->
