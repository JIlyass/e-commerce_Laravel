@extends('_layouts.layoutsDash')
@section('content')
 
 <h5> Styler votre site web !  </h5>
 <b>les Photos d'acceuil : </b>
 <div class="row">
    @foreach ($collection as $item)
        
    @endforeach
    <div class="card">
        <img src="" alt="ll" class="card-img-top">
        <div class="card body">
            <h5 class="card-title">Image 1</h5>
            <p>
                <button class="btn btn-primary">Modifier</button>
            </p>
        </div>
    </div>
 </div>
@endsection