@extends('_layouts.layoutsDash')
@section('content')
<h3>
    {{$pr->nomPr}}
</h3>
         <table class="table table-strriped">
            <tr>
                <th>Nom : </th>
                <th>{{$pr->nomPr}}  </th>
            </tr>
            <tr>
                <th>description : </th>
                <th>{{$pr->description}}  </th>
            </tr>
            <tr>
                <th>Prix d'achat : </th>
                <th>{{$pr->prixA}}  dhs </th>
            </tr>
      
            <tr>
                <th>prix vente : </th>
                <th>{{$pr->prixV}}  dhs</th>
            </tr>
            <tr>
                <th>prix avant promotion : </th>
                <th>{{$pr->PrixOrigin}} dhs </th>
            </tr>
            <tr>
                <th>Categorie : </th>
                <th>{{$cat}} </th>
            </tr>
            <tr>
                <th>Photo principale : </th>
                <th>
                    <img src="{{url('storage/images/'.$imgs[0]->path) }}" alt="img_principale">
                </th>
            </tr>
            <tr>
                <th>Autres Photos </th>
                <th>
                    @foreach ($imgs as $img)
                       <img src="{{url('storage/images/'.$img->path) }}" alt="img" width="120px" height="120px">

                    @endforeach
                </th>
            </tr>
            {{-- <tr colspan=2>
                <td>
                    @if ($toDelete=="yes" )
                        <form action="{{route('Produit.supprimer',['Produit'=>$produit_details->codePr])}}" method="post">

                            @csrf
                            @method('delete')
                            <input type="hidden" name="codePrd" value="{{$produit_details->codePr}}">
                            <input type="submit" value="supprimer" class="btn btn-danger">
                        </form>
                    @endif
                </td>
            </tr> --}}
        </table>
     
@endsection