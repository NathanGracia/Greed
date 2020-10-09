@extends('layout')

@section('pageName')
Liste des tokens
@endsection
@section('body')

<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th style="width:40%;">Nom du token</th>
            <th style="width:25%">Symbole</th>
            <th class="d-none d-md-table-cell" style="width:25%">Prix</th>
            <th> id </th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tokens as $token)
      
            <tr>
                <td>  <a href="token/{{$token->slug}}" style = "color :#000">{{ $token->name }}</a></td>
                <td>{{ $token->slug }}</td>
                <td class="d-none d-md-table-cell">{{ $token->usdPrice }}</td>
                <td> {{ $token->id }}</td>
                <td class="table-action">
                     @if($token->favorite)
                    <a href="token/unfavorite/{{$token->slug}}"><svg viewBox="0 0 24 24" width="24" height="24" stroke="rgb(255, 255, 79)" stroke-width="2" fill="rgb(255, 255, 79)" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1" data-darkreader-inline-fill="" style="--darkreader-inline-fill:rgb(255, 255, 79); --darkreader-inline-stroke:rgb(255, 255, 79);" data-darkreader-inline-stroke=""><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg></a>
                    @else
                    <a href="token/favorite/{{$token->slug}}"><svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1" data-darkreader-inline-fill="" data-darkreader-inline-stroke="" style="--darkreader-inline-fill:none; --darkreader-inline-stroke:currentColor;"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg></a>
                    @endif
                    <a href="deleteToken/{{ $token->id }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash align-middle" data-darkreader-inline-fill="" data-darkreader-inline-stroke="" style="--darkreader-inline-fill:none; --darkreader-inline-stroke:currentColor;"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a>
                </td>
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
@section('js')
document.getElementById
@endsection