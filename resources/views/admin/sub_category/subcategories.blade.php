<?php $dash.='---';  ?>
@foreach($subcategories as $subcategory)
    <option value="{{$subcategory->id}}" @if($subcategory->id == $parent_id) selected @endif>{!!$dash!!}{{$subcategory->category_name}}</option>
    @if(count($subcategory->subcategory))
        @include('admin.sub_category.subcategories',['subcategories' => $subcategory->subcategory])
    @endif
@endforeach