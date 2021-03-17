<!-- bootstrap datepicker input -->

<?php
    // if the column has been cast to Carbon or Date (using attribute casting)
    // get the value as a date string
    if (isset($field['value']) && ($field['value'] instanceof \Carbon\CarbonInterface)) {
        $field['value'] = $field['value']->format('Y-m-d');
    }

    $field['attributes']['style'] = $field['attributes']['style'] ?? 'background-color: white!important;';
    $field['attributes']['readonly'] = $field['attributes']['readonly'] ?? 'readonly';

    $field_language = isset($field['date_picker_options']['language']) ? $field['date_picker_options']['language'] : \App::getLocale();
    foreach (range(date('Y'), $field['start_date']) as $x) {
        $options[] = [
            'year' => $x
        ];
    }
?>

@include('crud::fields.inc.wrapper_start')

    <label>{!! $field['label'] !!}</label>
    @include('crud::fields.inc.translatable_icon')

    <select
        name="{{ $field['name'] }}"
        style="width: 100%"
        data-init-function="bpFieldInitSelect2Element"
        @include('crud::fields.inc.attributes', ['default_class' =>  'form-control select2_field'])
        >

        @if (count($options))
            @foreach ($options as $option)
                @if(isset($field['value']) && $field['value'] == $option['year'])
                    <option value="{{ $option['year'] }}" selected>{{ $field['value'] }}</option>
                @else
                    <option value="{{ $option['year'] }}">{{ $option['year'] }}</option>
                @endif
            @endforeach
        @endif
    </select>

    {{-- HINT --}}
    @if (isset($field['hint']))
        <p class="help-block">{!! $field['hint'] !!}</p>
    @endif
@include('crud::fields.inc.wrapper_end')

{{-- ########################################## --}}
{{-- Extra CSS and JS for this particular field --}}
{{-- If a field type is shown multiple times on a form, the CSS and JS will only be loaded once --}}
@if ($crud->fieldTypeNotLoaded($field))
    @php
        $crud->markFieldTypeAsLoaded($field);
    @endphp

    {{-- FIELD CSS - will be loaded in the after_styles section --}}
    @push('crud_fields_styles')
        <!-- include select2 css-->
        <link href="{{ asset('packages/select2/dist/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('packages/select2-bootstrap-theme/dist/select2-bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    @endpush

    {{-- FIELD JS - will be loaded in the after_scripts section --}}
    @push('crud_fields_scripts')
        <!-- include select2 js-->
        <script src="{{ asset('packages/select2/dist/js/select2.full.min.js') }}"></script>
        @if (app()->getLocale() !== 'en')
        <script src="{{ asset('packages/select2/dist/js/i18n/' . app()->getLocale() . '.js') }}"></script>
        @endif
        <script>
            function bpFieldInitSelect2Element(element) {
                // element will be a jQuery wrapped DOM node
                if (!element.hasClass("select2-hidden-accessible")) {
                    element.select2({
                        theme: "bootstrap"
                    });
                }
            }
        </script>
    @endpush

@endif
{{-- End of Extra CSS and JS --}}
{{-- ########################################## --}}