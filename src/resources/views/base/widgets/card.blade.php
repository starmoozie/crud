@php
	// preserve backwards compatibility with Widgets in Starmoozie 4.0
	$widget['wrapper']['class'] = $widget['wrapper']['class'] ?? $widget['wrapperClass'] ?? 'col-sm-6 col-md-4';
@endphp

@includeWhen(!empty($widget['wrapper']), 'starmoozie::widgets.inc.wrapper_start')
	<div class="{{ $widget['class'] ?? 'card shadow-sm' }}">
		@if (isset($widget['content']))
			@if (isset($widget['content']['header']))
				<div class="card-header">{!! $widget['content']['header'] !!}</div>
			@endif
			<div class="card-body">{!! $widget['content']['body'] !!}</div>
	  	@endif
	</div>
@includeWhen(!empty($widget['wrapper']), 'starmoozie::widgets.inc.wrapper_end')