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
            <td>{{ $token->name }}</td>
            <td>{{ $token->slug }}</td>
            <td class="d-none d-md-table-cell">{{ $token->usdPrice }}</td>
            <td> {{ $token->id }}</td>
            <td class="table-action">
                <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 align-middle" data-darkreader-inline-fill="" data-darkreader-inline-stroke="" style="--darkreader-inline-fill:none; --darkreader-inline-stroke:currentColor;"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a>
                <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash align-middle" data-darkreader-inline-fill="" data-darkreader-inline-stroke="" style="--darkreader-inline-fill:none; --darkreader-inline-stroke:currentColor;"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a>
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