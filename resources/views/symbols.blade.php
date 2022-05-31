@extends('layouts.app')

@section('content')
  
  <div class="row m-2">
    <div class="col-md-12 m-2">
        <h2 class="h2 text-center">Import Excel File</h2>
        <hr>
    </div>
    
    <div class="col-lg-4 mb-4">
        @if(session()->get('success'))
        <div class="alert alert-success" role="alert">
            {{session()->get('success')}}
        </div>
        @endif

        @if(count($errors) > 0)
          @foreach ($errors->all() as $error)
          <div class="alert alert-danger" role="alert">
            {{$error}}
          </div>
          @endforeach
        @endif

        <form method="post" action="{{route('symbol.store')}}" enctype="multipart/form-data" class="form-inline">
            @csrf
            <div class="form-group mx-sm-3 mb-2">
                <input type="file" name="file_excel" class="form-control-file">
            </div>
            <button type="submit" class="btn btn-primary mb-2">Uplaod</button>
        </form>
    </div>
   
    <div class="col-lg-12">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">symbol</th>
                <th scope="col">name</th>
                <th scope="col">number</th>
                <th scope="col">volume</th>
                <th scope="col">value</th>
                <th scope="col">last transaction amount</th>
                <th scope="col">last transaction changed</th>
                <th scope="col">last transaction percentage</th>
                <th scope="col">final price amount</th>
                <th scope="col">final price change</th>
                <th scope="col">final price percentage</th>
              </tr>
            </thead>
            <tbody>
              @if($symbols->count() > 0 )
                @php
                  $numberRow = 1;    
                @endphp
                @foreach ($symbols as $symbol)
                  <tr>
                    <th>{{@$numberRow}}</th>
                    <td>{{@$symbol->symbol}}</td>
                    <td>{{@$symbol->name}}</td>
                    <td>{{@$symbol->number}}</td>
                    <td>{{@$symbol->volume}}</td>
                    <td>{{@$symbol->value}}</td>
                    <td>{{@$symbol->last_transaction_amount}}</td>
                    <td>{{@$symbol->last_transaction_changed}}</td>
                    <td>{{@$symbol->last_transaction_percentage}}</td>
                    <td>{{@$symbol->final_price_amount}}</td>
                    <td>{{@$symbol->final_price_change}}</td>
                    <td>{{@$symbol->final_price_percentage}}</td>
                  </tr>
                  @php
                    $numberRow++;
                  @endphp
                @endforeach
              @endif
            </tbody>
        </table>
        {{ $symbols->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection