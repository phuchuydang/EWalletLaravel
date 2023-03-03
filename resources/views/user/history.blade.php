@extends('layouts.app')
@section('title', 'Transfer Money')
@section('content')

<div class="container">
  {{ Breadcrumbs::render() }}
    @if (session('error'))
    <br />
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    @if (session('success'))
    <br />
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    {{ $history->links() }}
    <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Type</th>
            <th scope="col">Amount</th>
            <th scope="col">Balance</th>
            <th scope="col">Date</th>
            <th scope="col">View Detail</th>
          </tr>
        </thead>
        <tbody>
          @php 
            $i = 1;
          @endphp
          @foreach ($history as $item)
          <tr>
            <th scope="row">{{$i}}</th>
            @if ($item->type == 1)
            <td>Deposit</td>
            @elseif ($item->type == 2)
            <td>Withdraw</td>
            @elseif ($item->type == 3)
            <td>Transfer</td>
            @else 
            <td>Buy Card</td>
            @endif
            <td>{{ $item->amount }}</td>
            <td>{{ $item->balance }}</td>
            <td>{{ $item->created_date }}</td>
            <td>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal-{{ $item->id }}">
              View
            </button>
          </td>
          </tr>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">History Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Type</label>
                  @if ($item->type == 1)
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="Deposit" readonly>
                  @elseif ($item->type == 2)
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="Withdraw" readonly>
                  @elseif ($item->type == 3)
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="Transfer" readonly>
                  @else 
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="Buy Card" readonly>
                  @endif

                  <label for="exampleInputEmail1">Amount</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $item->amount }}" readonly>

                  <label for="exampleInputEmail1">Balance</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $item->balance }}" readonly>

                  <label for="exampleInputEmail1">Description</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $item->description }}" readonly>

                  <label for="exampleInputEmail1">Date</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $item->created_date }}" readonly>

                  <label for="exampleInputEmail1">Status</label>
                  @if ($item->status == 1)
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="Success" readonly>
                  @else
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="Pending" readonly>
                  @endif

                  <label id="user" for="exampleInputEmail1">User</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $item->account->fullname }}" readonly>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
          @php 
            $i++;
          @endphp
        @endforeach
        </tbody>
      </table>
</div>
<br>
<br>
<script src="{{ asset('js/user/transfer.js') }}"></script>
@endsection