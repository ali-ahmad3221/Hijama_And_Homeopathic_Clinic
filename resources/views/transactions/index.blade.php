@section('title', 'Transaction Home Page')
@extends('admin.app')
@section('content')

    {{-- <div class="container-fluid"> --}}
        <!-- Page Heading -->
        <!-- Content Row -->
        <div class="content-wrapper">
            <div class="card">
                <div class="card-header py-3 d-flex">
                    <h6 class="m-0 font-weight-bold text-primary">
                        {{ __('Transactions') }}
                    </h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover datatable datatable-transaction"
                            id="dataTable" cellspacing="0" width="100%">
                            <thead>
                                <tr class="text-center">
                                    <th width="10">
                                        ID
                                    </th>
                                    <th>Number</th>
                                    <th>Date</th>
                                    <th>Name</th>
                                    <th> Price </th>
                                    <th>Received</th>
                                    <th>Remaining</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($transactions as $transaction)
                                    <tr data-entry-id="{{ $transaction->id }}" class="text-center">
                                        <td class="id">
                                            {{ $transaction->id }}
                                        </td>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $transaction->created_at }}</td>
                                        {{-- <td>{{ $transaction->transaction_code }}</td> --}}
                                        <td>{{ $transaction->name }}</td>
                                        <td>Rs.{{ $transaction->total_price }}</td>

                                        <!-- @php
                                            dump($transaction->accept);
                                        @endphp  -->

                                        @if ($transaction->accept != null)
                                            <td>{{ $transaction->accept }}</td>
                                        @else
                                            <td>0.00</td>
                                        @endif

                                        @if ($transaction->return < 0)
                                            <td class="text-danger return">{{ $transaction->return }}</td>
                                        @else
                                            <td class="text-success return">0</td>
                                        @endif
                                        <td>
                                            <div class="btn-group btn-group-sm">
                                                <a href="{{ route('transactions.show', ['transaction_id' => $transaction->id]) }}"
                                                    class="btn btn-info">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <form onclick="return confirm('are you sure ? ')" class="d-inline"
                                                    action="{{ route('transactions.destroy', ['transection_id' => $transaction->id]) }}"
                                                    method="get">
                                                    @csrf
                                                    @method('delete')
                                                    <input type="hidden" value="{{ $transaction->id }}"
                                                        name="transection_id" id="transection_id">
                                                    <button class="btn btn-danger"
                                                        style="border-top-left-radius: 0;border-bottom-left-radius: 0;">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                                {{-- <a data-toggle="modal" data-target="#exampleModal" href=""
                                            class="btn btn-success" data-whatever="@mdo" onclick="GetId(this)">
                                            <i class="fa fa-arrow-left"></i>
                                        </a> --}}
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">{{ __('Data Empty') }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Content Row -->
        @push('yajra-script')
            <script>
                function GetId(el) {
                    let row = $(el).closest('tr');
                    $id = row.find('.id').text();
                    $remainings = row.find('.return').text();

                    document.getElementById('hidden_id').value = $id;
                    document.getElementById('remaining_price').value = $remainings;
                    // console.warn($id);
                }
            </script>
        @endpush
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color:#172b4d;">
                        <h2 class="modal-title m-auto " id="exampleModalLabel" style="color:white;"><b>بقایا ادا</b></h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('submit.remaining.price.in.transations') }}"
                            id="teacher_salary_form">
                            @csrf
                            <input type="hidden" id="hidden_id" name="transaction_id" value="result">
                            <div class="form-group">
                                <label for="fee" class="col-form-label" style="color: #172b4d;"><strong> بقایا رقم
                                    </strong></label>
                                <input type="text" class="form-control" name="remainings" id="remaining_price" readonly>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                    style="background-color:#172b4d;">بند کریں</button>
                                <button class="btn btn-primary" onClick="myfunc(this)" style="background-color:#172b4d;"
                                    type="submit" name="submit">محفوظ کریں</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    {{-- </div> --}}
@endsection

@push('yajra-script')
    <script>
        $(function() {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            let deleteButtonTrans = 'delete selected'
            let deleteButton = {
                text: deleteButtonTrans,
                url: "",
                className: 'btn-danger',
                action: function(e, dt, node, config) {
                    var ids = $.map(dt.rows({
                        selected: true
                    }).nodes(), function(entry) {
                        return $(entry).data('entry-id')
                    });
                    if (ids.length === 0) {
                        alert('zero selected')
                        return
                    }
                    if (confirm('are you sure ?')) {
                        $.ajax({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                method: 'POST',
                                url: config.url,
                                data: {
                                    ids: ids,
                                    _method: 'DELETE'
                                }
                            })
                            .done(function() {
                                location.reload()
                            })
                    }
                }
            }
            dtButtons.push(deleteButton)
            $.extend(true, $.fn.dataTable.defaults, {
                order: [
                    [1, 'asc']
                ],
                pageLength: 50,
            });
            $('.datatable-transaction:not(.ajaxTable)').DataTable({
                buttons: dtButtons
            })
            $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });
        })
    </script>

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                order: [
                    [0, 'desc']
                ],
            });
        });
    </script>
@endpush
