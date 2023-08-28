@extends('layouts.main')
@section('content')

    <h1>Edit panel</h1>
    
    <style>
        :root{
    --width: 1080px;

}
.table
{
    table-layout: fixed;
    width: var(--width);
    text-align: left;
}
.editable-parameter {
    position: relative;
    overflow: hidden;
    text-overflow: ellipsis;
}

.input-number {
  pointer-events: none;
  position: inline-block;
  display: block;
  display: none;
  border: dashed lightgrey 0.1rem;
  width: 3.5rem;
  margin-top: 0.41rem;
}

.subsection-row .input-number {
    font-size: 14px;
    margin-top: 0;
    height: 2rem;
    max-width: 2.7rem;
}

.btn-number {
    margin-top: 0.41rem;
}

.subsection-row .btn-number{
    margin-top: 0;
}

.input-group-btn {
    display: flex;
    flex-direction: column;
}

.input-group-btn button {
    border:none;
    background: transparent;
    padding: 0;
    padding-top: 0px;
    font-size: 16px;
    line-height: 0;
}

.btn-add-empty {
    color: dodgerblue;
    border: dashed 0.15rem;
    background: transparent;
    border-radius: 0.5rem;
    padding: 0.2rem 1rem;
    margin-bottom: 1.5rem;
    width: var(--width);
}

.copy-button {
    display: inline-flex;
    color: #0d6efd;
    border: none;
}

.copy-button:hover{
        color: #0a58cc;
    }

    /* Styles for section rows */
.section-row {
  font-size: 18px;
  font-weight: bold;
  background-color: #f0f0f0;
  padding: 10px;
  margin-bottom: 5px;
}

/* Styles for subsection rows */
.subsection-row {
  font-size: 14px;
}

.addSubsectionButton {
    font-size: 32px;
}

.delete_record_subsection {
    display: block;
    padding-top: 0.4rem;
}

</style>
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Route</th>
                <th width="100px">Menutab</th>
                <th width="100px">Section</th>
                <th width="100px">Subsection</th>
                <th width="50px"></th>
            </tr>
        </thead>       
        <tbody>           
            @foreach ($pages as $page)
                <tr class="page-row" data-page-id="{{ $page->id }}">
                    <td class="editable-parameter">
                      <a href="" class="update_record_page" data-name="title" data-type="text" data-pk="{{ $page->id }}" data-title="Enter Page Name">{{ $page->title }}</a>
                    </td>
                    <td class="editable-parameter">
                      <a href="" class="update_record_page" data-name="route" data-type="text" data-pk="{{ $page->id }}" data-title="Enter Page Route">{{ $page->route }}</a> 
                    </td>
                    <td class="table-checkbox">
                        <input class="form-check-input" type="checkbox" data-pk="{{ $page->id }}" data-field="menutab" {{ $page->menutab ? 'checked' : '' }}>
                    </td>
                    <td class="table-checkbox">
                        <input class="form-check-input" type="checkbox" data-pk="{{ $page->id }}" data-field="section" {{ $page->section ? 'checked' : '' }}>
                    </td>
                    <td class="table-checkbox">
                        <input class="form-check-input" type="checkbox" data-pk="{{ $page->id }}" data-field="subsection" {{ $page->subsection ? 'checked' : '' }}>
                    </td>
                    <td>
                            <a href="#" class="delete_record_page" data-type="text" data-pk="{{ $page->id }}"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach 
        </tbody>
    </table>
    <div id="addPageContainer">
        <a href="#" id="addPageButton" class="btn-submit">Add page tab</a>
    </div>
@endsection

@section('scripts')

<script type="text/javascript">

   // AJAX
  $.fn.editable.defaults.mode = 'inline';
     
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': '{{csrf_token()}}'
        }
    });


    // ADDING
    
$('#addPageButton').on('click', function(e) {
        e.preventDefault();

        var inputField = $('<input type="text" id="newPageField"> <input type="text" id="newPageRouteField">');
        var saveButton = $('<button id="savePageButton" class="btn-submit">Save</button>');

        $(this).replaceWith(inputField);
        $('#addPageContainer').append(saveButton);

        $('#savePageButton').on('click', function() {
            var title = $('#newPageField').val();
            var route = $('#newPageRouteField').val();

            $.ajax({
                url: "{{ route('page.store') }}",
                type: 'POST',
                data: {
                    title: title,
                    route: route,
                },
                success: function(response) {
                    $('#savePageButton').remove();
                    location.reload();
                },
                error: function(error) {

                }
            });
        });
    });

    // EDITING
$('.update_record_page').editable({
    url: "{{ route('page.update') }}",
    type: 'text',
    name: 'title',
    pk: 1,
    title: 'Enter Field'
});
    
    // CHECKBOX
    $('.form-check-input').on('change', function() {
        var isChecked = $(this).prop('checked');
        var pk = $(this).data('pk');
        var field = $(this).attr('data-field');
        $.ajax({
            url: "{{ route('page.update') }}",
            type: 'POST',
            data: {
                pk: pk,
                name: field,
                value: isChecked ? 1 : 0,
            },
            success: function(response) {
                console.log('Checkbox state updated in the database successfully.');
            },
            error: function(error) {
                console.log('Error updating checkbox state in the database.');
            }
        });
    });
    // DELETING

    $('.delete_record_page').on('click', function(e) {
    e.preventDefault();
    var pageId = $(this).data('pk');
    var deleteButton = $(this);
    $.ajax({
        url: '{{ route('page.delete') }}',
        type: 'POST',
        data: {
            id: pageId
        },
        success: function(response) {
            console.log('Page deleted successfully');

             var pageRow = deleteButton.closest('tr');
            pageRow.remove();
            location.reload();
        },
        error: function(error) {
            console.log('Error deleting section');
        }
    });
});

</script>
@endsection