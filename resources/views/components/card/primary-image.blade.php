
@switch($card->layout)
    @case('transform')
    @case('modal_dfc')
        <script>
            function data() {
                return {
                    primaryImage: true,
                    primaryImageUri: '{{ $card->pngUri }}',
                    secondaryImageUri: '{{ $card->otherFaces->first()->png_uri  }}'
                }
            }
        </script>
        <img
            class="h-full"
            x-data="data()"
            :src="primaryImage ? primaryImageUri : secondaryImageUri"
            @click="primaryImage = ! primaryImage"
        />
        @break
    @case('flip')
        <img
            class="h-full"
        x-data="{rotate: false}"
        x-bind:class="{'rotate-180': rotate}"
        src="{{ $card->pngUri }}"
        @click="rotate = ! rotate"
        />
        @break
    @default

        <img
            class="h-full"
            src="{{ $card->pngUri }}"
        />
@endswitch


{{--<img--}}
{{--    src={{ $card->faces->first()->normal_image_uri }}--}}

{{--    id='primaryCardImage'--}}
{{--    />--}}
