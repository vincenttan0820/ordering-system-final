@extends('layouts.app')

@section('title', 'Order lists')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Order Management</h1>
        <a href="{{route('users.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div>

    {{-- Alert Messages --}}
    @include('common.alert')
   
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Lists Of Orders</h6>
        </div>
<style>
    .w-5{
    display: none
    }
    </style>  
<body>
    

    <table border="1">
        <tr>
         <td>ID</td>
         <td>Items</td>
         <td>User</td>
         <td>Delete</td>
         <th>Status</th>
         <th>Action</th>
         <th>Payment</th>
         <th>Action</th>
        
        </tr>

        @foreach ($orders as $order)
         <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->items }}</td>
            <td>{{ $order->user_id }}</td>
            <td>
               <!-- <a href="edit/{{ $order->id }}"class="btn btn-success btn-sm">Update </a>-->
            
                <a href="delete/{{ $order->id }}"class="btn btn-success btn-sm">Delete</a>
              </td>
            
              <td>
    @if ($order->status == 'pending')
        <span class="badge badge-danger">{{ ucfirst($order->status) }}</span>
    @else
        <span class="badge badge-success">{{ ucfirst($order->status) }}</span>
    @endif
</td>
<td>
    @if ($order->status == 'pending')
        <form action="{{ route('orders.update', $order->id) }}" method="POST">
            @csrf
            @method('PUT')
            <button type="submit" class="btn btn-success btn-sm">Complete</button>
        </form>
    @else
        <button type="button" class="btn btn-secondary btn-sm" disabled>Completed</button>
    @endif
</td>

<td>
    @if (isset($order->paid) && $order->paid)
        <span class="badge badge-success">{{ ucfirst('paid') }}</span>
    @else
        <span class="badge badge-danger">{{ ucfirst('unpaid') }}</span>
    @endif
</td>
<td>
  
    @if (isset($order->paid) && !$order->paid)
        <form action="{{ route('orders.paid', $order->id) }}" method="POST">
            @csrf
            @method('PUT')
            <button type="submit" class="btn btn-success btn-sm">Paid</button>
        </form>
        @else
        <button type="button" class="btn btn-secondary btn-sm" disabled>Paid</button>
    @endif
</td>

                                
         </tr>
         
         @endforeach
    </table>
    <span>
    {{ $orders->links() }}
    </span>
</body>
</html>


@endsection
