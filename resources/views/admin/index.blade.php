@extends('layouts.main')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="content">
    <h1>Edit panel</h1>
    
    <style>
        :root{
    --width: 55em;

}

body {
    overflow-x: visible;
}

.content-wrapper {
    width: calc(100vw - 244px);
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

.selection-dropdown {
    border: lightgray solid 0.1rem;
    border-radius: 0.4rem;
}

.selection-dropdown option {
    border: lightgray solid 0.1rem;
    border-radius: 0.4rem;
}

.dropdown {
    width: 100%;
}

</style>


    @foreach ($menutabs as $menutab)
<div class="input-group">
    <h2><a href="" class="update_record_menutab" data-name="title" data-type="text" data-pk="{{ $menutab->id }}" data-title="Enter Section Name">{{ $menutab->title}}</a>
    <a href="{{ $menutab->page ? route($menutab->page->route) : ''}}"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
    <select class = "selection-dropdown" data-lvl="menutab" data-pk="{{ $menutab->id }}" onchange="updatePage(this)">
        <option value=""> None </option>
        @foreach($pages->where('menutab', true) as $page)
        <option            
        {{ $page->id == $menutab->page_id ? 'selected' : ''}}             
        value="{{ $page->id }}">{{ $page->title }}
        </option>
        @endforeach
    </select>

    <span class="input-group-btn" style="display: inline-block;">
        <button class="btn btn-default btn-number" type="button" data-type="minus" data-field="position" data-level="menutab" data-pk="{{ $menutab->id }}">
            <i class='fas fa-angle-up'></i>
        </button>
    </span>
    <input class="form-control input-number" name="position" value="{{ $menutab->position }}" min="1" style="display: inline-block;">
    <span class="input-group-btn" style="display: inline-block;">
        <button class="btn btn-default btn-number" type="button" data-type="plus" data-field="position" data-level="menutab" data-pk="{{ $menutab->id }}">
            <i class='fas fa-angle-down'></i>
        </button>
    </span>
    <a href="" class="delete_record_menutab" data-type="text" data-pk="{{ $menutab->id }}"><i class="fa fa-trash"></i></a>
</div>

                      </h2> 
   
    <table class="table">
        <thead>
            <tr>
                <th width="240px">Title</th>
                <th>Description</th>
                <th width="200px">Page</th>
                <th width="40px"></th>
                <th width="40px"></th>
                <th width="50px"></th>
            </tr>
        </thead>       
        @if ($menutab->sections->count() == 0)
        </table>
            <div id="addSectionContainer" data-menutab-id="{{ $menutab->id }}">
                <button href="#" class="btn-submit btn-add-empty addSectionButton">Add section</button>
            </div>
            @else
        <tbody>           
            @foreach ($menutab->sections->sortBy('position') as $section)
                <tr class="section-row" data-section-id="{{ $section->id }}">
                    <td class="editable-parameter">
                      <a href="" class="update_record_section" data-name="title" data-type="text" data-pk="{{ $section->id }}" data-title="Enter Section Name">{{ $section->title }}</a>
                    </td>
                    <td class="editable-parameter">
                      <a href="" class="update_record_section" data-name="description" data-type="text" data-pk="{{ $section->id }}" data-title="Enter Section Description">{{ $section->description }}</a> 
                    </td>
                    <td>
                        <select class="form-control" data-lvl="section" data-pk="{{ $section->id }}" onchange="updatePage(this)">
                            <option value=""> None </option>
                            @foreach($pages->where('section', true) as $page)
                            <option            
                            {{ $page->id == $section->page_id ? 'selected' : ''}}             
                            value="{{ $page->id }}">{{ $page->title }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <div class="input-group">
                            <input class="form-control input-number" name="position" value="{{ $section->position }}" min="1">
                            <span class="input-group-btn">
                                <button class="btn btn-default btn-number" type="button" data-type="minus" data-field="position" data-level="section" data-pk="{{ $section->id }}">
                                <i class='fas fa-angle-up'></i>
                                </button>

                                <button class="btn btn-default btn-number" type="button" data-type="plus" data-field="position" data-level="section" data-pk="{{ $section->id }}">
                                <i class='fas fa-angle-down'></i>
                                </button>
                            </span>
                        </div>
                    </td>
                    <td>
                        <form method="POST" action="{{ route('section.duplicate', ['id' => $section->id]) }}">
                        @csrf
                        <button type="submit" class="copy-button"><i class="fa fa-copy"></i></button>
                    </form>
                    <a href="#" class="delete_record_section" data-type="text" data-pk="{{ $section->id }}"><i class="fa fa-trash"></i></a>
                    </td>
                    <td>
                    <a href="#" class="addSubsectionButton" data-type="text"><i class="fa fa-plus"></i></a>
                    </td>
                </tr>
                @foreach ($section->subsections->sortBy('position') as $subsection)
                    <tr class="subsection-row">
                        <td><a href="" class="update_record_subsection" data-name="title" data-type="text" data-pk="{{ $subsection->id }}" data-title="Subection Title"> {{ $subsection->title }} </a></td>
                        <td><a href="" class="update_record_subsection" data-name="description" data-type="text" data-pk="{{ $subsection->id }}" data-title="Subection Description">{{ $subsection->description }} </a></td>
                        <td>
                        <select class="form-control" data-lvl="subsection" data-pk="{{ $subsection->id }}" onchange="updatePage(this)">
                            <option value=""> None </option>
                        @foreach($pages->where('subsection', true) as $page)
                            <option            
                            {{ $page->id == $subsection->page_id ? 'selected' : ''}}             
                            value="{{ $page->id }}">{{ $page->title }}</option>
                            @endforeach
                        </select>
                        </td>
                        <td>  
                            <div class="input-group">
                                <input class="form-control input-number" name="position" value="{{ $subsection->position }}" min="1">
                                <span class="input-group-btn">
                                    <button class="btn-number" type="button" data-type="minus" data-field="position" data-level="subsection" data-pk="{{ $subsection->id }}">
                                        <i class='fas fa-angle-up'></i>
                                    </button>
                                    <button class="btn-number" type="button" data-type="plus" data-field="position" data-level="subsection" data-pk="{{ $subsection->id }}">
                                        <i class='fas fa-angle-down'></i>
                                    </button>
                                </span>
                            </div>
                        </td>
                        <td>
                            <a href="#" class="delete_record_subsection" data-type="text" data-pk="{{ $section->id }}"><i class="fa fa-trash"></i></a>
                        </td>
                        <td>
                            
                        </td>
                    </tr>
                @endforeach 
            @endforeach 
        </tbody>
    </table>
    @endif
@endforeach

    <div id="addMenuTabContainer">
        <a href="#" id="addMenuTabButton" class="btn-submit">Add menu tab</a>
    </div>

    <button class="open-modal">kjlkjlkjlklkj<i class="fa-solid fa-image"></i></button> 
    <dialog class="modal-window" id="modal">
        <button class="close-button"><i class="fa-solid fa-xmark"></i></button>
        <form action="#" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Image:</label>
                <input type="file" name="images[]" accept="image/*" class="form-control" multiple>
            </div>
            <button type="submit" class="btn-primary-wide">Save</button>
            
        </form>
    </dialog>
</div>
@endsection

@section('scripts')

<script type="text/javascript">
   
    const modal = document.querySelector('#modal');
    const openModal = document.querySelector('.open-modal');
    const closeModal = document.querySelector('.close-button');

    openModal.addEventListener('click', () => {
        modal.showModal();
    })
    closeModal.addEventListener('click', () => {
        modal.close();
    })

    $('#btnUploadCancel').click(function(){
	$('#upload-avatar').modal('toggle');
});





























   // AJAX
  $.fn.editable.defaults.mode = 'inline';
     
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': '{{csrf_token()}}'
        }
    });


    // ADDING
    
$('#addMenuTabButton').on('click', function(e) {
        e.preventDefault();

        var inputField = $('<input type="text" id="newMenuTabField">');
        var saveButton = $('<button id="saveMenuTabButton" class="btn-submit">Save</button>');

        $(this).replaceWith(inputField);
        $('#addMenuTabContainer').append(saveButton);

        $('#saveMenuTabButton').on('click', function() {
            var title = $('#newMenuTabField').val();

            $.ajax({
                url: "{{ route('menutab.store') }}",
                type: 'POST',
                data: {
                    title: title
                },
                success: function(response) {
                    $('#newMenuTabField').replaceWith($(
'<h2><a href="" class="update_record_menutab" data-name="title" data-type="text" data-pk="' + response.id + '" data-title="Enter Section Name">' + response.title + '</a> <a href="" class="delete_record_menutab" data-type="text" data-pk="' + response.id +'"><i class="fa fa-trash"></i></a></h2><a href="#" id="addMenuTabButton" class="btn-submit">Add menu tab</a>'));
                    $('#saveMenuTabButton').remove();
                    console.log(response);
                    location.reload();
                },
                error: function(error) {

                }
            });
        });
    });

    $(document).on('click', '.addSectionButton', function(e) {
        e.preventDefault();

        var inputFieldTitle = $('<input type="text" id="newSectionField">');
        var inputFieldDescription = $('<input type="text" id="newSectionFieldDescription">');
        var saveButton = $('<a href="#" class="btn-submit saveSectionButton">Add section</a>');

        var tableRow = $('<table class="table"><tbody><tr>')
        .append($('<td width="200px">').append(inputFieldTitle))
        .append($('<td width="130px">').append(inputFieldDescription))
        .append($('<td>').append(saveButton));


        $(this).replaceWith(tableRow);
        tableRow.find('td:last').append(saveButton);

        $(document).on('click', '.saveSectionButton', function() {
            var title = $('#newSectionField').val();
            var description = $('#newSectionFieldDescription').val();
            var menutab_id = this.closest('#addSectionContainer').getAttribute('data-menutab-id');

            $.ajax({
                url: "{{ route('section.store') }}",
                type: 'POST',
                data: {
                    title: title,
                    description: description,
                    menutab_id: menutab_id
                },
                success: function(response) {
                    $('.saveSectionButton').remove();
                    console.log(response);
                    location.reload();
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
    });

    $(document).on('click', '.addSubsectionButton', function(e) {
        e.preventDefault();

        var inputFieldTitle = $('<input type="text" id="newSubsectionField">');
        var inputFieldDescription = $('<input type="text" id="newSubsectionFieldDescription">');
        var saveButton = $('<a href="#" class="btn-submit saveSubsectionButton">Add subsection</a>');

        var tableRow = $('<tr class="subsection-row">')
        .append($('<td width="200px">').append(inputFieldTitle))
        .append($('<td width="130px">').append(inputFieldDescription))
        .append($('<td>').append(saveButton));


        $(this).closest('tr').after(tableRow);
        tableRow.find('td:last').append(saveButton);

        $(document).on('click', '.saveSubsectionButton', function() {
            var title = $('#newSubsectionField').val();
            var description = $('#newSubsectionFieldDescription').val();
            var section_id = $(this).closest('tr').prev().data('section-id');


            $.ajax({
                url: "{{ route('subsection.store') }}",
                type: 'POST',
                data: {
                    title: title,
                    description: description,
                    section_id: section_id
                },
                success: function(response) {
                    $('.saveSubsectionButton').remove();
                    console.log(response);
                    location.reload();
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
    });

    // EDITING
$('.update_record_menutab').editable({
    url: "{{ route('menutab.update') }}",
    type: 'text',
    name: 'title',
    pk: 1,
    title: 'Enter Field'
});
 
    $('.update_record_section').editable({
        url: "{{ route('section.update') }}",
        type: 'text',
        name: 'title',
        pk: 1,
        title: 'Enter Field'
    });
    

    $('.update_record_subsection').editable({
        url: "{{ route('subsection.update') }}",
        type: 'text',
        name: 'title',
        pk: 1,
        title: 'Enter Field'
    });

    //REPOSITIONING
    $(document).ready(function() {
        $('.btn-number').click(function() {
            var type = $(this).attr('data-type');
            var field = $(this).attr('data-field');
            var pk = $(this).attr('data-pk');
            var lvl = $(this).attr('data-level');
            var input = $(this).closest('.input-group').find('input[name=' + field + ']');

            var oldValue = parseInt(input.val());
            var newValue;

            if (type === 'minus') {
                newValue = oldValue - 1;
            } else if (type === 'plus') {
                newValue = oldValue + 1;
            }

            input.val(newValue);


              var url;
              if (lvl === 'menutab') {
                url = '{{ route('menutab.update') }}';
              } else if (lvl === 'section') {
                url = '{{ route('section.update') }}';
              } else if (lvl === 'subsection') {
                url = '{{ route('subsection.update') }}';
              }
            $.ajax({
                url: url,
                method: 'POST',
                data: {
                    pk: pk,
                    name: field,
                    value: newValue
                },
                success: function(response) {
                  location.reload();
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });
        });
    });
    
    //PAGE DROPDOWNS
    function updatePage(selected) {
        var pk = $(selected).data('pk');
        var lvl = $(selected).data('lvl');
        var url;
        if (lvl === 'menutab') {
                url = '{{ route('menutab.update') }}';
              } else if (lvl === 'section') {
                url = '{{ route('section.update') }}';
              } else if (lvl === 'subsection') {
                url = '{{ route('subsection.update') }}';
              }
        
        var value = $(selected).val();
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                pk: pk,
                name: 'page_id',
                value: value,
            }
        })
    }

    

    // DELETING
    $('.delete_record_menutab').on('click', function(e) {
    e.preventDefault();
    var menutabId = $(this).data('pk');
    var deleteButton = $(this);
    $.ajax({
        url: '{{ route('menutab.delete') }}',
        type: 'POST',
        data: {
            id: menutabId
        },
        success: function(response) {
            console.log('Menu tab deleted successfully');
            
            deleteButton.closest('.input-group').next('table').remove();
            deleteButton.closest('h2').remove();
        },
        error: function(error) {
            console.log('Menu tab deleting section');
        }
    });
});
    $('.delete_record_section').on('click', function(e) {
    e.preventDefault();
    var sectionId = $(this).data('pk');
    var deleteButton = $(this);
    $.ajax({
        url: '{{ route('section.delete') }}',
        type: 'POST',
        data: {
            id: sectionId
        },
        success: function(response) {
            console.log('Section deleted successfully');

             var sectionRow = deleteButton.closest('tr');

            var subsectionRows = sectionRow.nextUntil('tr.section-row');
            subsectionRows.remove();

            sectionRow.remove();
            location.reload();
        },
        error: function(error) {
            console.log('Error deleting section');
        }
    });
});

$('.delete_record_subsection').on('click', function(e) {
    e.preventDefault();
    var subsectionId = $(this).data('pk');
    var deleteButton = $(this);
    $.ajax({
        url: '{{ route('subsection.delete') }}',
        type: 'POST',
        data: {
            id: subsectionId
        },
        success: function(response) {
            console.log('Section deleted successfully');

             var subsectionRow = deleteButton.closest('tr');

            var subsectionRows = subsectionRow.nextUntil('tr.subsection-row');
            subsectionRows.remove();

            subsectionRow.remove();
            location.reload();
        },
        error: function(error) {
            console.log('Error deleting section');
        }
    });
});

</script>
@endsection