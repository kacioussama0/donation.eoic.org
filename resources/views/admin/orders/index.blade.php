@extends('admin.layouts.app')
@section('title',__('home.orders'))



@section('content')


    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>الإسم</th>
                <th>البريد الإلكتروني</th>
                <th>المشروع</th>
                <th>المبلغ</th>
                <th>الحالة</th>
            </tr>
        </thead>

        <tbody>
            @foreach($orders as $order)
                <tr>
                    <th>{{$order->id}}</th>
                    <th>{{$order->name}}</th>
                    <th>{{$order->email}}</th>
                    <th>{{$order->project->title()}}</th>
                    <th>{{$order->total_price}}</th>
                    <th>{{$order->status}}</th>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div>{{$orders->links()}}</div>


@endsection
