@extends('admin.layout')

@section('admin-title') Page Categories @endsection

@if (!count($sections))
    <p>No sections found.</p>
@else
    <table class="table table-sm category-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Key</th>
                <th></th>
            </tr>
        </thead>
        <tbody id="sortable" class="sortable">
            @foreach ($sections as $section)
                <tr class="sort-item" data-id="{{ $section->id }}">
                    <td>
                        <a class="fas fa-arrows-alt-v handle mr-3" href="#"></a>
                        {{ $section->name }}
                    </td>
                    <td>{!! $section->key !!}</td>
                    <td class="text-right">
                        <a href="{{ url('admin/page-sections/edit/' . $section->id) }}" class="btn btn-primary">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mb-4">
        {!! Form::open(['url' => 'admin/page-sections/sort']) !!}
        {!! Form::hidden('sort', '', ['id' => 'sortableOrder']) !!}
        {!! Form::submit('Save Order', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
@endif

@endsection

@section('scripts')
@parent
<script>
    $(document).ready(function() {
        $('.handle').on('click', function(e) {
            e.preventDefault();
        });
        $("#sortable").sortable({
            items: '.sort-item',
            handle: ".handle",
            placeholder: "sortable-placeholder",
            stop: function(event, ui) {
                $('#sortableOrder').val($(this).sortable("toArray", {
                    attribute: "data-id"
                }));
            },
            create: function() {
                $('#sortableOrder').val($(this).sortable("toArray", {
                    attribute: "data-id"
                }));
            }
        });
        $("#sortable").disableSelection();
    });
</script>
@endsection
