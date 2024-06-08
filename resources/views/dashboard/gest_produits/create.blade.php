@extends('_layouts.layoutsDash')
@section('content')

  <form method="post" action="{{route('dashboard.produits.store')}}" enctype="multipart/form-data"  >
  @csrf
    <div class="mb-3">
      <b><b> <label for="exampleInputEmail1" class="form-label">Nom du produit</label></b></b>
      <input value="{{old('nomPr')}}"  name="nomPr" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" @error('nomPr')
          is-invalid
      @enderror >
      @error('nomPr')
          <span class="text-danger"><i class='bx bxs-error-alt'></i>{{$message}}</span>
      @enderror
    </div>
    <div class="mb-3">
      <b> <label for="exampleInputEmail1" class="form-label">description du produit</label></b>
    <textarea name="description" class="form-control" cols="20" rows="10" placeholder="Donner une description sur le produit ..."></textarea>
    @error('description')
     <span class="text-danger"><i class='bx bxs-error-alt'></i>{{$message}}</span>
      @enderror
    
     <div class="mb-3">
      <b> <label for="exampleInputPassword1" class="form-label">Prix Achat</label></b>
      <input value="{{old('prixA')}}" name="prixA" type="number" class="form-control" id="exampleInputPassword1">
      @error('prixA')
     <span class="text-danger"><i class='bx bxs-error-alt'></i>{{$message}}</span>
      @enderror
    </div>

     <div class="mb-3">
      <b> <label for="exampleInputPassword1" class="form-label">Prix Origin</label></b>
      <input value="{{old('PrixOrigin')}}" name="PrixOrigin" type="number" class="form-control" id="exampleInputPassword1">
      <div id="emailHelp" class="form-text"> <i> Optionnel</i></div>

    </div>
    
    <div class="mb-3">
      <b> <label for="exampleInputPassword1" class="form-label">Prix de vente</label></b>
      <input value="{{old('prixV')}}" name="prixV" type="number" class="form-control" id="exampleInputPassword1">  
       @error('prixV')
     <span class="text-danger"><i class='bx bxs-error-alt'></i>{{$message}}</span>
      @enderror
      <div id="emailHelp" class="form-text">prix de vente doit etre supperieur au prix d'achat !</div>

    </div>
    <div class="mb-3">
      <b> <label for="exampleInputPassword1" class="form-label">qteS</label></b>
      <input value="{{old('qteS')}}"  type="number"  name="qteS" class="form-control" id="exampleInputPassword1">
      @error('qteS')
     <span class="text-danger"><i class='bx bxs-error-alt'></i>{{$message}}</span>
      @enderror
    </div>
    <div class="mb-3">
      <b> <label for="exampleInputPassword1" class="form-label">image Officielle</label></b>
      <input   type="file" id="images" name="imageO" multiple class="form-control" id="exampleInputPassword1" >
      @error('imageO')
      <span class="text-danger"><i class='bx bxs-error-alt'></i>{{$message}}</span>
      @enderror
    </div>
    <div class="mb-3">
      <b> <label for="exampleInputPassword1" class="form-label">Autres images</label></b>
      <input   type="file" id="images" name="images[]" multiple class="form-control" id="exampleInputPassword1" >
    </div>

    

   
    <div class="mb-3">
      <b> <label for="exampleInputPassword1" class="form-label">Categorie</label></b>
      <select name="categories_id" class="form-control" >
        <option value="all">Choisisez une Categorie</option>
        @foreach ($db_categories as $item)
            <option  value="{{$item->id}}" >{{$item->nomCat}}</option>
        @endforeach 
      </select>
      @error('categories_id')
      <span class="text-danger"><i class='bx bxs-error-alt'></i>{{$message}}</span>
  @enderror

    </div>
 
    <input type="submit" value="Créer Nouveau produit " class="btn btn-primary">



    
  </form>
      
@endsection 