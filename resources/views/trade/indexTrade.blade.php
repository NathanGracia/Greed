@extends('layout')
@section('body')
<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th style="width:10%;">Date</th>
            <th style="width:10%;">Marché</th>
            <th style="width:10%;">Type</th>
            <th style="width:10%;">Prix d'entrée</th>
            <th style="width:10%;">Taille de la position (USD)</th>
            <th style="width:10%;">Quantité</th>
            <th style="width:10%;">Risque Capital de la position</th>


        </tr>
    </thead>
    <tbody>
        @foreach ($trades as $trade)
      
            <tr>
                <td>{{ date('d/m/Y', $trade->date) }} </td>
                <td>{{ $trade->new_token }} - {{ $trade->old_token }}</td>
                <td>{{ $trade->type }}</td>
                <td class="d-none d-md-table-cell">{{ $trade->start_price }} {{ $trade->old_token }}</td>
                <td>{{ $trade->new_token_usd }} $</td>
                <td>{{ $trade->quantity }}</td>
                <td>{{ $trade->capital_risk_usd }} $</td>
                

              
          
            </tr>
       
        @endforeach
    </tbody>
 
</table>
@endsection
@section('js')
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>



@endsection