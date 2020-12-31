@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>Stocks</h2>
            <table class="table">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Value</th>
                  <th>History</th>
                  <th>Updated At</th>
                </tr>
              </thead>
              <tbody id="stocks_details_id">

                @include('stocks._list')

              </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

      setInterval(function() {
        $.ajax({
                url: "{{ route('stocks.index') }}",
                type: "get",
                data: { "_token": "{{ csrf_token() }}", },
                success: function (response) {
                    // console.log(response);
                    if(response.status) {
                        $("#stocks_details_id").html(response.data);
                    }
                }
            });
      }, 1000 * 60 * 5); // where X is your every X = 5 minutes
        
    });
</script>
@endpush