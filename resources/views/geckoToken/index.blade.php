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
                <a href="addToken/{{ $token->id }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-folder-plus align-middle mr-2"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path><line x1="12" y1="11" x2="12" y2="17"></line><line x1="9" y1="14" x2="15" y2="14"></line></svg></a>
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