

@extends('admin.main')

@section('title','| '.$category->name)

@section('content')
   <div class="main-content">
        
        <h2 class="text-center">{{ $category->name }}</h2>

        <table class="table table-striped tabe-condensed">
            <thead>
                <th>#</th>
                <th>Sub Category</th>
                <th>Brands Available</th>
            </thead>
            <tbody>

                @foreach($category->prodcategories as $subcategory)
                <tr>
                    <td>1</td>
                    <td>{{ $subcategory->name }}</td>
                    <td>
                        @foreach($subcategory->prodsubcategories as $brand)
                        <li>{{$brand->name}}</li>
                        @endforeach
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

   </div>
    
@endsection






