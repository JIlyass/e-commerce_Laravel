@extends('layouts.master')
@section('title','Modifier')
@section('main')

  <form method="post" action="{{route('Produit.save')}}" enctype="multipart/form-data" >


  @csrf
  <input type="hidden" name="codePr" value={{$produit_details[0]->codePr}}>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Nom du produit</label>
      <input value={{$produit_details[0]->nomPr}}  name="nomPr" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">N'entrez pas un nom déjà existe!.</div>
    </div>
     <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Prix de vente</label>
      <input name="pu" value={{$produit_details[0]->pu}} type="number" class="form-control" id="exampleInputPassword1">
      <div id="emailHelp" class="form-text">prix de vente doit etre supperieur au prix d'achat !</div>

    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Prix d'achat</label>
      <input  type="number" value={{$produit_details[0]->pa}}  name="pa" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">image</label>
      <input  type="file"  name="image" class="form-control" id="exampleInputPassword1">
    </div>
   
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Categorie</label>
      <select name="categories_id" >
        @foreach ($dbCat as $item)
            <option {{$item->id==$produit_details[0]->categories_id?"selected":""}} value="{{$item->id}}" >{{$item->nomCat}}</option>
        @endforeach
      </select>

    </div>
    {{-- <div class="mb-3 form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div> --}}
    <button type="submit" class="btn btn-primary" >save</button>
  </form>
      
@endsection 