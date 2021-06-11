@extends('layouts.master')

@section('content')
    @if(Cart::count() > 0)
        <table>
            <tbody>
            @foreach(Cart::content() as $product)
                <tr>
                    <td><img src="{{ $product->model->image }}" alt="{{ $product->model->title }}"/></td>
                    <td>{{ $product->model->title }}</td>
                    <td>{{ $product->model->getFormatedPrice() }}</td>
                    <td>1</td>
                    <td>
                        <form action="{{ route('cart.destroy', $product->rowId) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-dark">-</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div>Détails de la commande</div>
        <ul>
            <li><strong>Sous-total</strong><strong>{{ getPrice(Cart::subtotal()) }}</strong></li>
            <li><strong>Taxe</strong><strong>{{ getPrice(Cart::tax()) }}</strong></li>
            <li><strong>Total</strong><strong>{{ getPrice(Cart::total()) }}</strong></li>
        </ul>
        <a href="">Passer a la caisse</a>
    @else
        <p>Votre panier est vide.</p>
    @endif
@endsection