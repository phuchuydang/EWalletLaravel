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
    <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Type</th>
            <th scope="col">Amount</th>
            <th scope="col">Description</th>
            <th scope="col">Date</th>
            <th scope="col">View Detail</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($history as $item)
          <tr>
            <th scope="row">1</th>
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
            <td>{{ $item->description }}</td>
            <td>{{ $item->created_at }}</td>
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
                ...
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>
        @endforeach
        </tbody>
      </table>
</div>
<br>
<br>
<script src="{{ asset('js/user/transfer.js') }}"></script>
@endsection