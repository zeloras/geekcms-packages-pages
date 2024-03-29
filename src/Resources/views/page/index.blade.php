@extends('admin.layouts.main')

@section('title',  Translate::get('module_pages::admin/main.list.page_title') )

@section('content')
    <section class="box-typical container pb-3">
        <header class="box-typical-header">
            <div class="tbl-row">
                <div class="tbl-cell tbl-cell-title">
                    <h3>{{ Translate::get('module_pages::admin/main.sidenav.sub_list') }}</h3>
                </div>
                <div class="tbl-cell tbl-cell-action-bordered">
                    <a href="{{ route('admin.pages.create') }}"
                       data-toggle="tooltip" data-placement="left"
                       data-original-title="{{ Translate::get('module_pages::admin/main.form.page_title_create') }}"
                       class="action-btn">
                        <i class="fa fa-plus"></i>
                    </a>
                </div>
                <div class="tbl-cell tbl-cell-action-bordered">
                    <button type="button" data-token="{!! csrf_token() !!}" data-inputs=".delete-item-check:checked"
                            data-toggle="tooltip" data-placement="left"
                            data-original-title="{{ Translate::get('module_pages::admin/main.form.page_delete_selected') }}"
                            data-text="{{ Translate::get('module_pages::admin/main.list.action_delete_confirm') }}"
                            data-action="{{ route('admin.pages.delete.all') }}" class="action-btn delete-all">
                        <i class="font-icon font-icon-trash"></i>
                    </button>
                </div>
            </div>
        </header>
        <div class="box-typical-body">
            <div class="table-responsive">
                @if(isset($pages))
                    @include('pages::page.components.table', [$pages, $default_slug])
                @endif
            </div>
        </div>
    </section>
@stop
