@extends('layout')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <center>
                <h2>PRODUCT LIST</h2>
            </center>

            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Code</th>
                        <th scope="col">Name</th>
                        <th scope="col">Image</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Price</th>
                        <th scope="col">Description</th>
                        <th scope="col">Color</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $key => $product)
                        <tr>
                            <td>{{ ($key+1) }}</td>
                            <td>{{$product->item_number}}</td>
                            <td>{{$product->description}}</td>
                            <td><img src="{{url('/products').'/'.$product->product_image}}" alt="{{$product->product_image}}"></td>
                            <td>{{$product->gender}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->description2}}</td>
                            <td>{{$product->color}}</td>
                            <td>
                                <a href="{{ url('/products/'.$product->id.'/edit') }}">
                                    <i class="fa fa-edit" title="Click to Edit This Product"></i>
                                </a>
                                <a title="Click to Delete This Product" href="javascript:void(0)" class="btn-delete-submit" data-id="{{ 'delete-form-' . $product->id }}">
                                    <i class="fa fa-fw fa-trash"></i>
                                </a>
                                <form id="{{ 'delete-form-' . $product->id }}" action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: none;">
                                    <input type="hidden" name="_method" value="DELETE" />
                                    {{ csrf_field() }}
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
            <div class="col-md-4">
                {{ $products->links() }}
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(".btn-delete-submit").click(function(){
            let form_id = $(this).attr("data-id");
            $("#"+form_id).submit();
        });
    </script>
@endsection