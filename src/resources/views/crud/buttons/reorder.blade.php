@if ($crud->get('reorder.enabled') && $crud->hasAccess('reorder'))
  <a href="{{ url($crud->route.'/reorder') }}" class="btn btn-sm btn-outline-primary shadow-sm" data-style="zoom-in"><span class="ladda-label"><i class="la la-arrows"></i> {{ trans('starmoozie::crud.reorder') }} {{ $crud->entity_name_plural }}</span></a>
@endif