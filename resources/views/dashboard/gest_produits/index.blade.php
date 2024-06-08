@extends('_layouts.layoutsDash')
@section('content')
 
    <h5>Listes des produits </h5>

    <form action="{{route('dashboard.produits.listesProduits') }}" method="post" name="f1">
        @csrf
       
        <select onchange="f1.submit()" name="categorie" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
        <option value="-1">Tous les catégories</option>
         @foreach ($db_categories as $item)
            <option {{$categorie==$item->id?"selected":""}} value="{{$item->id}}">{{$item->nomCat}}</option>
        @endforeach 
    </select>
    </form>
   
    <a href="{{route('dashboard.produits.create')}}"> <button class="btn btn-primary">Ajouter Nouveau produits</button> </a>
   <table class="table">
    <thead class="table-success">
        <tr>
            <th>Produit</th>
            {{-- <th>description</th> --}}
            <th>prix achat</th>
            <th>prix avant promotion</th>
            <th>prix Ventes</th>
            <th>quantité en stock</th>
            <th>image principale</th>
            <th>actions</th>
        </tr>
    </thead>
    <tbody class="table-striped ">
        @foreach ($db_produits as $produit)
            <tr>
                <td>{{$produit->nomPr}}</td>
                {{-- <td>{{$produit->description}}</td> --}}
                <td>{{$produit->prixA}}</td>
                <td>{{$produit->PrixOrigin}}</td>
                <td>{{$produit->prixV}}</td>
                <td>{{$produit->qteS}}</td>
                <td> 
                    @if($produit->path)
                    <img src="{{ url("storage/images/".$produit->path) }}" alt="produit_image"> 
                    @else 
                    No Pic 
                    @endif
                </td>
                <td>
                    <button class="btn btn-warning">Modifier</button>
                    <button class="btn btn-danger">Supprimer</button>
                    <a href="{{route('dashboard.produits.show',['id'=>$produit->id])}}">
                        <button class="btn btn-success">Details</button>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
   </table>
@endsection