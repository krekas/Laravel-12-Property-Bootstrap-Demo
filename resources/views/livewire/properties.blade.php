<div id="properties" class="row">
    @foreach($properties as $property)
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
            <x-property :property="$property" />
        </div>
    @endforeach

    {{ $properties->links(data: ['scrollTo' => '#properties']) }}
</div>
