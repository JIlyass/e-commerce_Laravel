<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProduitRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "nomPr"=>"required",
            "description"=>"required ",
            "prixA"=>"required|integer",
            "PrixOrigin"=>"",
            "prixV"=>"required|integer|gt:prixA",
            "qteS"=>"required|integer|min:1",
            "imageO"=>"required"
        ];
    }
    public function messages()
    {
        return [
            "nomPr"=>"le nom du produit est obligatoire ! ",
            "description"=>"la description du produit est obligatoire ! ",
            "prixA"=>"le prix d'achat du produit est obligatoire !",
            "prixV.required"=>"le prix de vente du produit est obligatoire !",
            "prixV.gt"=>"le prix de vente doit être supérieure au prix d'achat",
            "qteS.min"=>"le minimum est 1 ",
            "qteS.required"=>"La quantité en stock du produit est obligatoire ! ",
            "imageO"=>"Choisisez une image officielle pour votre produits ! ",
        ];
    }
}
