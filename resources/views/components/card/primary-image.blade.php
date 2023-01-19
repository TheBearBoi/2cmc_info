<img
    class="h-full"
@switch($card->layout)
    @case('transform')
    @case('modal_dfc')
        <script>
            function data() {
                return {
                    primaryImage: true,
                    primaryImageUri: '{{ $card->faces->first()->png_uri }}',
                    secondaryImageUri: '{{ $card->faces->firstWhere('face_number', 1)->png_uri  }}'
                }
            }
        </script>
            x-data="data()"
            :src="primaryImage ? primaryImageUri : secondaryImageUri"
            @click="primaryImage = ! primaryImage"
        @break
    @case('flip')
        x-data="{rotate: false}"
        x-bind:class="{'rotate-180': rotate}"
        src="{{ $card->faces->first()->png_uri }}"
        @click="rotate = ! rotate"
        @break
    @default
        src="{{ $card->faces->first()->png_uri }}"
@endswitch
/>


{{--<img--}}
{{--    src={{ $card->faces->first()->normal_image_uri }}--}}

{{--    id='primaryCardImage'--}}
{{--    />--}}
