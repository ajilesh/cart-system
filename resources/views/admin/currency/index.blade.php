@extends('admin.adminapp')
@include('admin.header')
@section('data')
<div class="container">
    <h1>Products</h1>
    <table class="table table-bordered" id="products-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Code</th>
                <th>Name</th>
                <th>Symbol</th>
                <th>Rate Exchange</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
</div>
@endsection
@push('scripts')
<script>
$(document).ready(function() {
    $('#products-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ route('admin.currency.data') }}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'code', name: 'code' },
            { data: 'name', name: 'name' },
            { data: 'symbol', name: 'symbol' },
            { data: 'exchange_rate', name: 'exchange_rate' },
            { data:'status', name : 'status' },
            { data: 'action', name: 'action' },
            
        ],
       
    });
    $('#products-table').on('change', '.toggle-active', function() {
        var currencyId = $(this).data('id');
        var switchState = $(this).prop('checked') ? 'active' : 'inactive';
       
        $.ajax({
            url: '{{ url('admin/toggle-active') }}/' + currencyId,
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                active: switchState
            },
            success: function(response) {
                console.log(response);
                // if (response.success) {
                //     console.log('Status updated successfully.');
                // }
            }
        });
    });
});
</script>
@endpush