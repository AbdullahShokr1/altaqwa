<x-front>
    <section class=" mx-auto py-5"></section>
    <!--#2 Start Breadcrumb-->

    <!--#2 End Breadcrumb-->
    <!--#4 Start Categories-->
    <section id="Categories" class="container marketing">
        <a href="{{route('home.e-profile',Auth::user('user')->name)}}">edit</a>
        <a href="{{route('home.product.create')}}">Add Product</a>
    </section>
    <section id="Categories" class="container marketing">
        <h2>Reviews</h2>
        @if($user->review)
            <table>
                <tr>
                    <th>comment</th>
                    <th>review</th>
                    <th>Product</th>
                </tr>
                @foreach($user->review as $key=>$myReview)
                    <tr>
                        <td>{{$myReview->comment}}</td>
                        <td>{{$myReview->review}}</td>
                        <td><a target="_blank" href="{{route('home.product',$myReview->product->slug)}}">Show Product</a></td>
                    </tr>
                @endforeach
            </table>
        @endif
    </section>
    <section id="Categories" class="container marketing">
        <h2>Products</h2>
        @if(isset($myProducts))
            <table>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Reviews</th>
                    <th>Product</th>
                </tr>
                @foreach($myProducts as $product)
                    <tr>
                        <td>{{$product->title}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->review->count()}}</td>
                        <td class="project-actions text-right">
                            <a class="btn btn-primary btn-sm" target="_blank" href="{{route('home.product',$product->slug)}}">
                                <i class="fas fa-folder">
                                </i>
                                View
                            </a>
                            <a class="btn btn-info btn-sm" href="{{ route('home.product.edit',$product->id)}}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </a>
                            <a class="btn btn-danger btn-sm" onclick="document.getElementById('user-del-{{$product->id}}').submit()">
                                <i class="fas fa-trash">
                                </i>
                                Delete
                                <form action="{{route('home.product.destroy',$product->id)}}" id='user-del-{{$product->id}}' method="post">
                                    @csrf
                                    @method('delete')
                                </form>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </table>
        @endif
    </section>
    <!--#4 End Categories-->
    <section class=" mx-auto py-5"></section>
</x-front>


